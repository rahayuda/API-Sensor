<?php

$lat = 51.5287398;
$lon = -0.266403;
$api_key = 'b2699365d619f304c163216bb7b2b8eb';

$api_url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid='.$api_key;

$weather_data = json_decode (file_get_contents($api_url), true);

echo "<pre>";
print_r($weather_data);

echo "<br>";

$suhu_kelvin = $weather_data['main']['temp']; // Nilai suhu dalam kelvin
echo "Suhu: " . $suhu_kelvin . " Kelvin";

echo "<br>";

if ($suhu_kelvin >= 283 && $suhu_kelvin <= 303) {
    $kategori_suhu = "Baik (Good)";
} elseif (($suhu_kelvin >= 273 && $suhu_kelvin < 283) || ($suhu_kelvin > 303 && $suhu_kelvin <= 313)) {
    $kategori_suhu = "Sedang (Moderate)";
} elseif (($suhu_kelvin < 273) || ($suhu_kelvin > 313 && $suhu_kelvin <= 323)) {
    $kategori_suhu = "Tidak Sehat (Unhealthy)";
} else {
    $kategori_suhu = "Berbahaya (Hazardous)";
}

echo "Kategori Suhu: " . $kategori_suhu;

echo "<br><br>";

if ($lon >= -7.5 && $lon < 7.5) {
    $utc = "0";
} elseif ($lon >= 7.5 && $lon < 22.5) {
    $utc = "1";
} elseif ($lon >= 22.5 && $lon < 37.5) {
    $utc = "2";
} elseif ($lon >= 37.5 && $lon < 52.5) {
    $utc = "3";
} elseif ($lon >= 52.5 && $lon < 67.5) {
    $utc = "4";
} elseif ($lon >= 67.5 && $lon < 82.5) {
    $utc = "5";
} elseif ($lon >= 82.5 && $lon < 97.5) {
    $utc = "6";
} elseif ($lon >= 97.5 && $lon < 112.5) {
    $utc = "7";
} elseif ($lon >= 112.5 && $lon < 127.5) {
    $utc = "8";
} elseif ($lon >= 127.5 && $lon < 142.5) {
    $utc = "9";
} elseif ($lon >= 142.5 && $lon < 157.5) {
    $utc = "10";
} elseif ($lon >= 157.5 && $lon < 172.5) {
    $utc = "11";
} elseif ($lon >= 172.5 && $lon <= 180) {
    $utc = "12";
} else {
    $utc = "Tidak Valid";
}

echo "Zona Waktu (UTC) berdasarkan Longitude: UTC+" . $utc;

echo "<br>";

$sunrise_timestamp = $weather_data['sys']['sunrise']; // Contoh timestamp untuk sunrise
$sunset_timestamp = $weather_data['sys']['sunset'];  // Contoh timestamp untuk sunset

$sunrise_timestamp += $utc * 3600;
$sunset_timestamp += $utc * 3600;

$sunrise_waktu = gmdate("H:i:s", $sunrise_timestamp);
$sunset_waktu = gmdate("H:i:s", $sunset_timestamp);

echo "Waktu Matahari Terbit (UTC): " . $sunrise_waktu . "<br>";
echo "Waktu Matahari Terbenam (UTC): " . $sunset_waktu;

?>