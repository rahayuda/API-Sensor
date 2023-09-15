<?php

// Set URL permintaan API
$api_url = "https://gateway.api.globalfishingwatch.org/v2/events/c2f0967e061f99a01793edac065de003?datasets=public-global-port-visits-c2-events:latest";

// Set header Authorization dengan TOKEN
$headers = [
    "Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6ImtpZEtleSJ9.eyJkYXRhIjp7Im5hbWUiOiJGaXJzdCBSZXNlYXJjaCIsInVzZXJJZCI6MjY2NzMsImFwcGxpY2F0aW9uTmFtZSI6IkZpcnN0IFJlc2VhcmNoIiwiaWQiOjcyOCwidHlwZSI6InVzZXItYXBwbGljYXRpb24ifSwiaWF0IjoxNjg4OTU1MzYyLCJleHAiOjIwMDQzMTUzNjIsImF1ZCI6ImdmdyIsImlzcyI6ImdmdyJ9.PPS9uEJdNnHQbYbszO0QL0QqFxZBpIhR6hiI3lONW6NcfYXXEFYVEmbTpkduGi9w5lb6qZlJc2-vWaCuQfGdBDSdYhLjTKToOYXezWMSoERbUOz3J6MsqzXM4ozNRlsbh-an8qO3tRRtVrcvOehOv4mZ3AbZnPHv9hBpW2tcafbmNysgU9qXUT_EkIDOP6PJ5BNQPBZwzKKbqmg5uMDUU7idjIRhNZvmwdrZvB_rKHwnMr8S2LkA7TBNDB0ezEkle7dNSrRgokuDw6E1a49WlcFLr--oPEtKRbfh9h_DZwKbCKmi6VrWLkL29OcUCyPNkTyX_OYRR3HMKj3C4JxGYmZwADTcMDC5uIIuD28hBMY7KAAnRCtBVyjAolebi61hFJz47iX3oFBvR3gmAdtXJyApIfxYeKq7XNMn0eEpqH75rQTIP4xLyeKK6a0HKt3g1NoHeoMZki-vN8_LOjVe-dNTXtfdZ3daIL3GuIWkjfa0-3t5GR86TCQwxbCwdXU4",  // Ganti [TOKEN] dengan token Anda
];

// Inisialisasi CURL
$ch = curl_init();

// Set URL dan opsi CURL
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Eksekusi permintaan API
$response = curl_exec($ch);

// Periksa kode status permintaan
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Tutup CURL
curl_close($ch);

// Memeriksa respons dan memproses data
if ($status_code == 200) {
    // Lakukan pengolahan data sesuai kebutuhan Anda
	echo "<pre>";
	$formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
    echo $formatted_response;
} else {
    echo "Permintaan API gagal dengan kode status: " . $status_code;
}

?>
