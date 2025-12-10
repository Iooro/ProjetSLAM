<?php
require("vendor/autoload.php");

use Bluerhinos\phpMQTT;

$server = "172.16.117.129";  
$port   = 1883;
$clientId = "phpPublisher";

$mqtt = new phpMQTT($server, $port, $clientId);

if ($mqtt->connect()) {
    $topic = "esp32/oled";
    $message = "Bonjour depuis PHP sur VS Code !";

    $mqtt->publish($topic, $message, 0);
    $mqtt->close();
    echo "Message envoyé ! pour lakhbvqkdhv,\n";
} else {
    echo "Impossible de se connecter au broker Mosquitto...\n";
}
