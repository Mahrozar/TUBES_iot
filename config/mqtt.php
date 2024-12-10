<?php

return [
    'host' => env('MQTT_HOST', 'http://broker.hivemq.com/'), // Alamat broker MQTT
    'port' => env('MQTT_PORT', 1883),              // Port broker MQTT
    'username' => env('MQTT_USERNAME', ''),        // Username (jika ada)
    'password' => env('MQTT_PASSWORD', ''),        // Password (jika ada)
    'client_id' => env('MQTT_CLIENT_ID', 'laravel_client_' . uniqid()), // ID unik untuk client
];
