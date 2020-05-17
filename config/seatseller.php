<?php

return [


    /**
     * Seatseller environment
     *
     * Supported: "dev", "production"
     */
    'environment' => 'dev',


    /**
     * Seatseller credentials
     */
    'credentials' => [

        'production' => [
            'consumer_key' => env('SEATSELLER_CONSUMER_KEY', ''),
            'consumer_secret' => env('SEATSELLER_CONSUMER_SECRET', ''),
        ],

        'dev' => [
            'consumer_key' => env('SEATSELLER_CONSUMER_KEY_DEV', ''),
            'consumer_secret' => env('SEATSELLER_CONSUMER_SECRET_DEV', ''),
        ]

    ]

];
