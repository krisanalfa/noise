<?php namespace Noise\Reflection;

use Norm\Norm;
use ArrayHelper;

trait RepliesReflection
{
    private function getRepliesForThread($threadId)
    {
        $posts = array();

        foreach (Norm::factory('Post')->find(array('thread_id' => $threadId)) as $post) {
            Norm::options('include', true);

            $postId = $post->getId();
            $post   = ArrayHelper::sanitize($post->jsonSerialize(), array('thread_id', 'post_id', 'thread'));

            $post['id']                  = $postId;
            $post['upvotes']             = $this->getUpvotesForPost($postId);
            $post['downvotes']           = $this->getDownvotesForPost($postId);
            $post['replies']             = $this->getRepliesForPost($postId);
            $post['reply_for_post_id']   = null;
            $post['reply_for_thread_id'] = $postId;

            $posts[] = $post;
        }

        return $posts;
    }

    private function getRepliesForPost($postId)
    {
        $posts = array();

        foreach (Norm::factory('Post')->find(array('post_id' => $postId)) as $post) {
            Norm::options('include', true);

            $idPost = $post->getId();
            $post   = $post->jsonSerialize();
            $post   = ArrayHelper::sanitize($post, array('thread_id', 'post_id', 'thread'));

            $post['id']                  = $idPost;
            $post['upvotes']             = $this->getUpvotesForPost($idPost);
            $post['downvotes']           = $this->getDownvotesForPost($idPost);
            $post['replies']             = $this->getRepliesForPost($idPost);
            $post['reply_for_post_id']   = $postId;
            $post['reply_for_thread_id'] = null;

            $posts[] = $post;
        }

        return $posts;
    }

    private function getReply($postId)
    {
        $post = Norm::factory('Post')->findOne($postId);

        if (! is_null($post)) {
            Norm::options('include', true);

            $idPost = $post->getId();
            $post   = $post->jsonSerialize();
            $post   = ArrayHelper::sanitize($post, array('thread_id', 'post_id', 'thread'));

            $post['id']                  = $idPost;
            $post['upvotes']             = $this->getUpvotesForPost($idPost);
            $post['downvotes']           = $this->getDownvotesForPost($idPost);
            $post['replies']             = $this->getRepliesForPost($idPost);
            $post['reply_for_post_id']   = $postId;
            $post['reply_for_thread_id'] = null;
        }

        return $post;
    }

    private function newReply(array $data)
    {
        $post = Norm::factory('Post')->newInstance();

        $post->set($data)->save();

        return $this->getReply($post->getId());
    }
}
