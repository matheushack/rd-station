<?php
return [
    'enabled' => env('RD_STATION_ENABLED', false),
    'sandbox' => env('RD_STATION_SANDBOX', true),
    'auth' => [
        'client_id' => env('RD_STATION_CLIENT_ID'),
        'client_secret' => env('RD_STATION_CLIENT_SECRET'),
        'refresh_token' => env('RD_STATION_REFRESH_TOKEN')
    ]
];
