<?php namespace Noise\Controller;

use KrisanAlfa\Kraken\Controller\Controller;
use Norm\Norm;
use Norm\Model;
use Norm\Type\Object;
use JsonKit\JsonKit;
use Noise\Vote;
use Noise\Reflection\VoteReflection;
use Noise\Reflection\RepliesReflection;
use ArrayHelper;

class ApiController extends Controller
{
    use VoteReflection, RepliesReflection;

    public function mapRoute()
    {
        $this->map('/', 'api')->via('GET');
        $this->map('/thread', 'createNewThread')->via('POST');
        $this->map('/thread/:id', 'getThread')->via('GET');
    }

    public function api()
    {
        $this->data['data']            = array();
        $this->data['data']['name']    = 'Noise';
        $this->data['data']['version'] = '1.0.0';
        $this->data['data']            = JsonKit::encode($this->data['data']);

        $this->app->response->headers['Content-Type']                 = 'application/json';
        $this->app->response->headers['Access-Control-Allow-Origin']  = '*';
        $this->app->response->headers['Access-Control-Allow-Methods'] = '*';
        $this->app->response->headers['Access-Control-Max-Age']       = '3600';
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

        $this->app->response->headers['Content-Type']                 = 'application/json';
        $this->app->response->headers['Access-Control-Allow-Origin']  = '*';
        $this->app->response->headers['Access-Control-Allow-Methods'] = '*';
        $this->app->response->headers['Access-Control-Max-Age']       = '3600';
    }
}
