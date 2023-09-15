<?php

$lat = -8.2401084;
$lon = 115.3671947;
$api_key = 'b2699365d619f304c163216bb7b2b8eb';

$api_url = 'https://api.openweathermap.org/data/2.5/air_pollution?lat='.$lat.'&lon='.$lon.'&appid='.$api_key;

$weather_data = json_decode (file_get_contents($api_url), true);

echo "<pre>";
print_r($weather_data);

echo "<br>";

$pm2_5 = $weather_data['list'][0]['components']['pm2_5'];
echo "Nilai PM 2.5: " . $pm2_5 . " µg/m³";

echo "<br>";

$pm25_value = 27.67; // Nilai PM2.5 yang Anda terima dari API

if ($pm25_value >= 0 && $pm25_value <= 12) {
    $aqi_category = "Baik (Good)";
} elseif ($pm25_value >= 12.1 && $pm25_value <= 35.4) {
    $aqi_category = "Sedang (Moderate)";
} elseif ($pm25_value >= 35.5 && $pm25_value <= 55.4) {
    $aqi_category = "Tidak Sehat untuk Kelompok Sensitif (Unhealthy for Sensitive Groups)";
} elseif ($pm25_value >= 55.5 && $pm25_value <= 150.4) {
    $aqi_category = "Tidak Sehat (Unhealthy)";
} elseif ($pm25_value >= 150.5 && $pm25_value <= 250.4) {
    $aqi_category = "Sangat Tidak Sehat (Very Unhealthy)";
} else {
    $aqi_category = "Berbahaya (Hazardous)";
}

echo "Kategori AQI: " . $aqi_category;



?>