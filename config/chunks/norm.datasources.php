<?php

// Database connection configuration
return array(
    'norm.datasources' => array(
        // Use mongodb
        'mongo' => array(
            // Driver for MongoDB
            'driver' => 'Norm\\Connection\\MongoConnection',

            // Database in MongoDB to store your datas
            'database' => 'noise',
        ),
    ),
);
