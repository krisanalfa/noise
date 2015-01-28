<?php

// BONO
return array(
    // The Middlewares
    'bono.middlewares' => array(
        // Handle some resource based request
        'KrisanAlfa\\Kraken\\Middleware\\ControllerMiddleware',

        // For session notification, like a flash session
        'Bono\\Middleware\\NotificationMiddleware',

        // Content negotiator for specific mime-type request
        'Bono\\Middleware\\ContentNegotiatorMiddleware',

        // A static page that doesn't need registered handling route
        'Bono\\Middleware\\StaticPageMiddleware',

        // Start the session for notification
        'Bono\\Middleware\\SessionMiddleware',
    ),
);
