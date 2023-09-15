<?php

$city_name = 'Jakarta';
$api_key = 'b2699365d619f304c163216bb7b2b8eb';

$api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

$weather_data = json_decode (file_get_contents($api_url), true);

echo "<pre>";
print_r($weather_data);

?>