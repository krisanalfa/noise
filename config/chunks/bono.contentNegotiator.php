<?php

// BONO
return array(
    // Content Negotiatior
    'bono.contentNegotiator' => array(
        // Store any available extension in your app
        'extensions' => array(
            // If you append your URL with '.json', your application thinks that you perform a request for json response
            'json' => 'application/json',
        ),

        // The views that handle the '.json' request
        'views' => array(
            'application/json' => 'Bono\\View\\JsonView',
        ),
    ),
);
