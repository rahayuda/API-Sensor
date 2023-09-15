<?php
$minlatitude = 3; // Lintang minimum (perkiraan)
$maxlatitude = 5; // Lintang maksimum (perkiraan)
$minlongitude = 94; // Bujur minimum (perkiraan)
$maxlongitude = 98; // Bujur maksimum (perkiraan)

$starttime = "2021-09-01T00:00:00"; // Contoh: Waktu mulai (format ISO 8601)
$endtime = "2023-09-14T00:00:00"; // Contoh: Waktu berakhir (format ISO 8601)

// URL API USGS Earthquake dengan parameter lokasi, starttime, dan endtime
$url = "https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&minlatitude=$minlatitude&maxlatitude=$maxlatitude&minlongitude=$minlongitude&maxlongitude=$maxlongitude&starttime=$starttime&endtime=$endtime";

// Mengambil data dari API
$response = file_get_contents($url);

// Mengecek apakah pengambilan data berhasil
if ($response === false) {
    die('Gagal mengambil data dari API USGS Earthquake.');
}

// Mengubah data JSON menjadi array asosiatif
$data = json_decode($response, true);

// Menampilkan data gempa bumi
foreach ($data['features'] as $earthquake) {
    $properties = $earthquake['properties'];
    $magnitude = $properties['mag'];
    $place = $properties['place'];
    $time = date('Y-m-d H:i:s', $properties['time'] / 1000); // Konversi waktu ke format yang lebih mudah dibaca

    echo "Magnitude: $magnitude<br>";
    echo "Tempat: $place<br>";
    echo "Waktu: $time<br>";
    echo "----------------------------------<br>";
}
?>
