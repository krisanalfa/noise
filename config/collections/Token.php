<?php

use Norm\Schema\String;
use Norm\Schema\Reference;

return array(
    // Source structure
    'schema' => array(
        'user_id'     => Reference::create('user_id')->to('User', 'username')->filter('trim|required')->set('list-column', true),
        'name'        => String::create('name')->filter('trim|required')->set('list-column', true),
        'shortname'   => String::create('shortname')->filter('trim|required')->set('list-column', true),
        'web_address' => String::create('web_address')->filter('trim|required')->set('list-column', true),
        'secret_key'  => String::create('secret_key')->filter('trim|required')->set('list-column', false)->set('generated', true),
        'shared_key'  => String::create('shared_key')->filter('trim|required')->set('list-column', false)->set('generated', true),
    ),
);
