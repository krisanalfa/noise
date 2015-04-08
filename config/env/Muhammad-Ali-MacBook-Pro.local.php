<?php

return array(
    'user' => '55251cf68ead0efd180041a8',
    
    'norm.datasources' => array(
        // Use mongodb
        'mongo' => array(
            // Driver for MongoDB
            'driver' => 'Norm\\Connection\\MongoConnection',
            'hostname' => 'localhost', // IP Alfa

            // Database in MongoDB to store your datas
            'database' => 'noise',
        ),
    ),
);
