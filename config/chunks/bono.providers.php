<?php

// BONO
return array(
    // The providers
    'bono.providers' => array(
        // The version provider
        'Noise\\Provider\\VersionProvider' => array(
            // Enter the team hostnames computer here
            'local' => array(
                'supernova.local',
            ),

            // Enter the remote hostnames computer here
            'remote' => array(
                'supernova.remote',
            ),
        ),

        // For logging purpose
        'Noise\\Provider\\LogProvider' => array(
            // Your log name
            'log.name' => 'NoiseLog',

            // Path where log will be written
            'log.path' => 'logs',

            // The file format of logfile
            'log.format' => 'Y-m-d',

            // The used timezone for your logfile timestamp
            'log.timezone' => 'Asia/Jakarta'
        ),

        // The Norm Provider
        'Norm\\Provider\\NormProvider',

        // Kraken Provider
        'KrisanAlfa\\Kraken\\Provider\\KrakenProvider',

        // Facade Provider, also good for bind some dependencies in Resource Sharer Container
        'KrisanAlfa\\Kraken\\Provider\\FacadesProvider' => array(
            // The dependencies that will be bind to Kraken Container
            'dependencies' => array(
                'Noise\\Helper\\Contract\\SecretHelperInterface' => 'Noise\\Helper\\SecretHelper',
                'Noise\\Helper\\Contract\\ArrayHelperInterface'  => 'Noise\\Helper\\ArrayHelper',
                // 'NoopInterface' => 'NoopClass'
            ),
        ),
    ),
);
