<?php
$json_data = file_get_contents("http://localhost:8080/microlinsIpatinga/app.php?key=MQY1159");

echo "<pre>";
print_r(json_decode($json_data,true));
echo "</pre>";
