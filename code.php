<?php
$vm_ip = '172.16.117.129';
$topic = 'esp32/oled';
$message = 'Bonjour ESP32 depuis PC !';

exec("mosquitto_pub -h $vm_ip -t $topic -m \"$message\"");
echo "Message envoyé\n";
?>