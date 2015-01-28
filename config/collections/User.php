<?php

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    // User using hashing for password, so we need an observer
    'observers' => array(
        'Norm\\Observer\\Hashed' => array()
    ),
    // Source structure
    'schema' => array(
        'username'    => String::create('username')->filter('trim|required|unique:User,username')->set('list-column', true),
        'email'       => String::create('email')->filter('trim|required|unique:User,email')->set('list-column', true),
        'first_name'  => String::create('first_name')->filter('trim|required')->set('list-column', true),
        'middle_name' => String::create('middle_name')->filter('trim')->set('list-column', true),
        'last_name'   => String::create('last_name')->filter('trim|required')->set('list-column', true),
        'avatar'      => String::create('avatar')->filter('trim|required'),
        'password'    => Password::create('password')->filter('trim|required|confirmed'),
    ),
);
