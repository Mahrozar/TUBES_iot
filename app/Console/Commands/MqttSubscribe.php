<?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use App\Services\MqttService;

// class MqttSubscribe extends Command
// {
//     protected $signature = 'mqtt:subscribe';
//     protected $description = 'Subscribe to MQTT topics';

//     protected $mqttService;

//     public function __construct(MqttService $mqttService)
//     {
//         parent::__construct();
//         $this->mqttService = $mqttService;
//     }

//     public function handle()
//     {
//         $this->mqttService->subscribe('sensor/data', function ($message) {
//             // Proses data MQTT
//             $this->info("Received message: " . $message['message']);
//             // Misalnya, simpan ke database
//         });
//     }
// }
