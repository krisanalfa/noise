<?php namespace Noise\Controller;

use KrisanAlfa\Kraken\Controller\Controller;
use Norm\Norm;
use Norm\Model;
use Norm\Type\Object;
use JsonKit\JsonKit;
use Noise\Vote;
use Noise\Reflection\VoteReflection;
use Noise\Reflection\RepliesReflection;
use Noise\Reflection\UserReflection;
use ArrayHelper;
use SecretHelper;

class ApiController extends Controller
{
    use VoteReflection, RepliesReflection, UserReflection;

    public function mapRoute()
    {
        $this->map('/', 'api')->via('GET');
        $this->map('/js', 'js')->via('GET');
        $this->map('/widget', 'widget')->via('POST');
        $this->map('/html/:id', 'html')->via('GET');
        $this->map('/thread', 'createNewThread')->via('POST');
        $this->map('/thread/:id', 'getThread')->via('GET');
        $this->map('/reply', 'reply')->via('POST');
        $this->map('/vote', 'vote')->via('POST');
        $this->map('/user/:id', 'getUser')->via('GET');
    }

    public function js()
    {
        $this->data['minify'] = $this->request->get('minify') ?: false;

        $this->app->response->headers['Content-Type'] = 'text/javascript';
    }

    public function html($id)
    {
        Norm::options('include', true);
        $this->data['thread_id'] = $id;
        $this->data['thread'] = ArrayHelper::sanitize(Norm::factory('Thread')->findOne($id)->jsonSerialize());
    }

    public function widget()
    {
        $token = Norm::factory('Token')->findOne(array(
            'shared_key' => $this->request->post('shared_key'),
            'shortname' => $this->request->post('shortname'),
        ));

        if (! is_null($token) and $this->request->post('uri')) {
            // Web request = match
            if (count(explode($token->get('web_address'), $this->request->post('uri'))) > 1) {
                Norm::options('include', true);

                $uniqId = (string) SecretHelper::generateSharedKey($this->request->post('uri'));

                $thread = Norm::factory('Thread')->findOne(array('uniqid' => $uniqId));

                if (is_null($thread)) {
                    // Create new thread
                    $newData = array(
                        'name' => $this->request->post('name'),
                        'content' => $this->request->post('content'),
                        'uniqid' => $uniqId,
                        'token_id' => $token->getId(),
                        'created_by' => $token->get('user_id'),
                    );

                    Norm::factory('Thread')->newInstance()->set($newData)->save();

                    $thread = Norm::factory('Thread')->findOne(array('uniqid' => $uniqId));
                }

                $this->data['data'] = JsonKit::encode(array(
                    'thread_id' => $thread->getId(),
                ));
            } else {
                $this->response->setStatus(400);

                $this->data['data'] = JsonKit::encode(array(
                    'error'   => '405',
                    'message' => 'Web address not allowed to use this token',
                ));
            }
        } else {
            $this->response->setStatus(400);
            $this->data['data'] = JsonKit::encode(array(
                'error' => '404',
                'message' => 'Shared key not found',
            ));
        }

        $this->prepareResponse();
    }

    public function vote()
    {
        $data = array_merge(array('thread_id' => null,'post_id' => null), $this->request->post());
        $vote = $this->newVote($data);

        Norm::options('include', true);
        $this->data['data'] = JsonKit::encode($vote);

        $this->prepareResponse();
    }

    public function reply()
    {
        $data = array_merge(array('thread_id' => null,'post_id' => null), $this->request->post());
        $post = $this->newReply($data);

        Norm::options('include', true);
        $this->data['data'] = JsonKit::encode($post);

        $this->prepareResponse();
    }

    public function api()
    {
        $this->data['data']            = array();
        $this->data['data']['name']    = 'Noise';
        $this->data['data']['version'] = '1.0.0';

        $this->data['data'] = JsonKit::encode($this->data['data']);

        $this->prepareResponse();
    }

    public function createNewThread()
    {
        var_dump($this->request->post());
        exit();
    }

    public function getThread($id)
    {
        $thread = Norm::factory('Thread')->findOne($id);

        $this->data['data'] = array();

        if (is_null($thread)) {
            $basePath = realpath($this->app->config('bono.base.path'));
            $json     = file_get_contents($basePath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'data.json');
            $data     = json_decode($json, true);

            $this->data['data'] = $data;

            // $this->data['data']['error']   = '404';
            // $this->data['data']['message'] = 'Thread for id '.$id.' not found';
        } else {
            $threadId = $thread->getId();

            Norm::options('include', true);

            $thread = ArrayHelper::sanitize($thread->jsonSerialize());

            foreach ($thread as $field => $data) {
                $this->data['data'][$field] = $data;
            }

            $this->data['data']['upvotes']    = $this->getUpvotesForThread($threadId);
            $this->data['data']['downvotes']  = $this->getDownvotesForThread($threadId);
            $this->data['data']['replies']    = $this->getRepliesForThread($threadId);
        }


        $this->data['data'] = JsonKit::encode($this->data['data']);

        $this->prepareResponse();
    }

    public function getUser($id)
    {
        $this->data['data'] = JsonKit::encode($this->findUser($id));
    }

    private function prepareResponse()
    {
        $this->app->response->headers['Content-Type']                 = 'application/json';
        $this->app->response->headers['Access-Control-Allow-Origin']  = '*';
        $this->app->response->headers['Access-Control-Allow-Methods'] = '*';
        $this->app->response->headers['Access-Control-Max-Age']       = '3600';
    }
}
