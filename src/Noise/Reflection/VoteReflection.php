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

    private function getVote($voteId)
    {
        $vote = Norm::factory('Vote')->findOne($voteId);

        if (! is_null($vote)) {
            Norm::options('include', true);

            $vote = ArrayHelper::sanitize($vote->jsonSerialize(), array('thread_id', 'post_id', 'type'));
        }

        return $vote;
    }

    private function newVote(array $data)
    {
        $connection = Norm::factory('Vote');
        $criteria = $data;
        $postId = $criteria['post_id'];

        unset($criteria['type']);

        $check = $connection->findOne($data);

        if (! is_null($check)) {
            $codeType = $check->get('type');
            $type = ($codeType === Vote::UP_VOTE) ? 'up' : 'down';

            return array(
                'error' => true,
                'message' => 'Cannot vote, because you have already voted ' . $type,
            );
        }

        $before = $connection->findOne($criteria);
        $neutral = false;

        // Because user has vote up and he wants to vote down, let's remove all votes and don't create any data
        if (! is_null($before)) {
            $before->remove();

            $neutral = true;
        } else {
            $vote = $connection->newInstance();

            $vote->set($data)->save();
        }

        return array(
            'neutral'   => $neutral,
            'upvotes'   => $this->getUpvotesForPost($postId),
            'downvotes' => $this->getDownvotesForPost($postId),
        );
    }
}
