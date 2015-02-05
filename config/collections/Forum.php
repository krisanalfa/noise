<?php

use Norm\Schema\String;
use Norm\Schema\Text;
use Norm\Schema\Reference;
use Norm\Schema\ReferenceArray;

return array(
    // Observers
    'observers' => array(
        'Noise\\Observer\\Timestampable' => array()
    ),
    // Source structure
    'schema' => array(
        'name'       => String::create('name')->filter('trim|required')->set('list-column', true),
        'content'    => Text::create('content')->filter('trim|required')->set('list-column', true),
        'created_by' => Reference::create('created_by')->to('User', 'username')->filter('trim|required')->set('list-column', true)->set('generated', true),
    ),
);
