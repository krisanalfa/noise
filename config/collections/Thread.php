<?php

use Norm\Schema\String;
use Norm\Schema\Text;
use Norm\Schema\Reference;
use Norm\Schema\Date;
use Norm\Schema\ReferenceArray;

return array(
    // Observers
    'observers' => array(
        'Noise\\Observer\\Timestampable' => array()
    ),
    // Source structure
    'schema' => array(
        'name'       => String::create('name')->filter('trim|required')->set('list-column', true),
        'content'    => Text::create('content')->filter('trim')->set('list-column', true),
        'uniqid'     => String::create('uniqid')->filter('trim')->set('list-column', true)->set('generated', true),
        'token_id'   => Reference::create('token_id')->to('Token', 'name')->filter('trim')->set('list-column', true),
        'created_by' => Reference::create('created_by')->to('User', 'username')->filter('trim')->set('list-column', true),
    ),
);
