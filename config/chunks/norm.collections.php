<?php

// Collection or the schema of your database configuration
return array(
    'norm.collections' => array(
        // Default configuration for all schemas
        'default' => array(
            // Limit the entries that shown, then paginate them
            'limit' => 10,
        ),

        // Resolver to find where the schemas config stored see in /config/collections folder
        'resolvers' => array(
            'Norm\\Resolver\\CollectionResolver',
        ),
    ),
);
