<?php

use Norm\Schema\Reference;
use Norm\Schema\Integer;

return array(
    // Observers
    'observers' => array(
        'Noise\\Observer\\Timestampable' => array()
    ),
    // Source structure
    'schema' => array(
        // 1 => Upvote
        // 2 => Downvote
        'type'       => Integer::create('type')->filter('trim|required')->set('list-column', true),
        'created_by' => Reference::create('created_by')->to('User', 'username')->filter('trim')->set('list-column', true),
        'thread_id'  => Reference::create('thread_id')->to('Thread', 'name')->filter('trim')->set('list-column', true),
        'post_id'    => Reference::create('post_id')->to('Post', 'content')->filter('trim')->set('list-column', true),
    ),
);
