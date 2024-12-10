<?php

// namespace App\Services;

// use Simps\MQTT\Client;
// use Simps\MQTT\Config\ClientConfig;

// class MqttService
// {
//     protected $client;

//     public function __construct()
//     {
//         $config = new ClientConfig();
//         $config->setHost(config('mqtt.host'));
//         $config->setPort(config('mqtt.port'));
//         $config->setUsername(config('mqtt.username'));
//         $config->setPassword(config('mqtt.password'));
//         $config->setClientId(config('mqtt.client_id'));

//         $this->client = new Client($config);
//     }

//     public function subscribe(string $topic, callable $callback)
//     {
//         $this->client->connect();
//         $this->client->subscribe([$topic => 0]);
        
//         while (true) {
//             $message = $this->client->recv();
//             if ($message) {
//                 $callback($message);
//             }
//         }
//     }

//     public function publish(string $topic, string $message)
//     {
//         $this->client->connect();
//         $this->client->publish($topic, $message, 0);
//     }
// }
