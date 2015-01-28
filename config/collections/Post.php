<?php

use Norm\Schema\Text;
use Norm\Schema\Reference;
use Norm\Schema\Date;

return array(
    // Observers
    'observers' => array(
        'Noise\\Observer\\Timestampable' => array()
    ),
    // Source structure
    'schema' => array(
        'content'     => Text::create('content')->filter('trim|required')->set('list-column', true),
        'created_by'  => Reference::create('created_by')->to('User', 'username')->filter('trim')->set('list-column', true),
        // 'forum_id' => Reference::create('forum_id')->to('Forum', 'name')->filter('trim')->set('list-column', true),
        'thread_id'   => Reference::create('thread_id')->to('Thread', 'name')->filter('trim')->set('list-column', true),
        'post_id'     => Reference::create('post_id')->to('Post', 'content')->filter('trim')->set('list-column', true),
    ),
);
