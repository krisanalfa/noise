<?php namespace Noise\Reflection;

use Noise\Vote;
use Norm\Norm;
use ArrayHelper;

trait VoteReflection
{
    private function getUpvotesForThread($threadId)
    {
        return $this->getVotes(array('thread_id' => $threadId, 'type' => Vote::UP_VOTE));
    }

    private function getDownvotesForThread($threadId)
    {
        return $this->getVotes(array('thread_id' => $threadId, 'type' => Vote::DOWN_VOTE));
    }

    private function getUpvotesForPost($postId)
    {
        return $this->getVotes(array('post_id' => $postId, 'type' => Vote::UP_VOTE));
    }

    private function getDownvotesForPost($postId)
    {
        return $this->getVotes(array('post_id' => $postId, 'type' => Vote::DOWN_VOTE));
    }

    private function getVotes(array $criteria)
    {
        $upvotes = array();

        foreach (Norm::factory('Vote')->find($criteria) as $vote) {
            if (! is_null($vote)) {
                Norm::options('include', true);

                $vote = $vote->jsonSerialize();
                $upvotes[] = ArrayHelper::sanitize($vote, array('thread_id', 'post_id', 'type'));
            }
        }

        return $upvotes;
    }
}
