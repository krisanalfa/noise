<?php

return array(
    'norm.datasources' => array(
        // Use mongodb
        'mongo' => array(
            // Driver for MongoDB
            'driver' => 'Norm\\Connection\\MongoConnection',
            'hostname' => '192.168.1.133', // IP Alfa

            // Database in MongoDB to store your datas
            'database' => 'noise',
        ),
    ),
);
