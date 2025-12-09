<?php
exec('mosquitto_pub -h localhost -t esp32/oled -m "Bonjour ESP32 !"');
echo "Message envoyé\n";
?>