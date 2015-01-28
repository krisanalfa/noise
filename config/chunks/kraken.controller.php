<?php

// BONO
return array(
    // Application Controller using Kraken Container
    'kraken.controller' => array(
        // Default all controller if the controller mapper set to null
        'default' => 'KrisanAlfa\\Kraken\\Controller\\NormController',

        // Resource mapping to it's controller, if mapper set to null, it'll use the 'default' one
        'mapping' => array(
            '/user'   => null,
            '/token'  => 'Noise\\Controller\\TokenController',
            // '/forum'  => null,
            '/thread' => null,
            '/post'   => null,
            '/vote'   => null,
            '/api'   => 'Noise\\Controller\\ApiController',
        ),
    ),
);
