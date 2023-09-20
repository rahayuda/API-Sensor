<!DOCTYPE html>
<html>
<head>
    <title>Qualitative Name and AQI</title>
    <!-- Tambahkan tautan ke Bootstrap CSS di bawah ini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php
        $lat = -8.2401084;
        $lon = 115.3671947;
        $api_key = 'b2699365d619f304c163216bb7b2b8eb';

        $api_url = 'https://api.openweathermap.org/data/2.5/air_pollution?lat='.$lat.'&lon='.$lon.'&appid='.$api_key;

        $weather_data = json_decode(file_get_contents($api_url), true);

        $aqi    = $weather_data['list'][0]['main']['aqi'];

        $pm10   = $weather_data['list'][0]['components']['pm10'];
        $co     = $weather_data['list'][0]['components']['co'];
        $no     = $weather_data['list'][0]['components']['no'];
        $no2    = $weather_data['list'][0]['components']['no2'];
        $o3     = $weather_data['list'][0]['components']['o3'];
        $so2    = $weather_data['list'][0]['components']['so2'];
        $nh3    = $weather_data['list'][0]['components']['nh3'];
        $pm2_5  = $weather_data['list'][0]['components']['pm2_5'];

        $dt     = $weather_data['list'][0]['dt'];


        $timestamp = $weather_data['list'][0]['dt'];
        date_default_timezone_set('Asia/Makassar');
        $waktu_terbaca = date('Y-m-d H:i:s', $timestamp);

        if ($aqi == 1) {
            $kategori_aqi = "Good";
        } elseif ($aqi == 2) {
            $kategori_aqi = "Fair";
        } elseif ($aqi == 3) {
            $kategori_aqi = "Moderate";
        } elseif ($aqi == 4) {
            $kategori_aqi = "Poor";
        } elseif ($aqi == 5) {
            $kategori_aqi = "Very Poor";
        } else {
            $kategori_aqi = "Tidak Diketahui";
        }
        ?>

        <h2>Qualitative Name and AQI</h2>
        <br>
        <?php
        echo "Longitude: " . $lon . " <br>";
        echo "Latitude: " . $lat . " <br>";
        echo "Time (GMT+8): " . $waktu_terbaca;
        ?>
        <br><br>

        <h5><b>Pollutant Concentration in μg/m³</b></h5>

        <br>

        <table class="table table-bordered table-sm">
            <tr>
                <th>Qualitative Name</th>
                <th>AQI</th>
                <th>SO2</th>
                <th>NO2</th>
                <th>PM10</th>
                <th>PM2.5</th>
                <th>O3</th>
                <th>CO</th>
            </tr>
            <tr>
                <td><?php echo $kategori_aqi; ?></td>
                <td><?php echo $aqi; ?></td>
                <td><?php echo $so2; ?></td>
                <td><?php echo $no2; ?></td>
                <td><?php echo $pm10; ?></td>
                <td><?php echo $pm2_5; ?></td>
                <td><?php echo $o3; ?></td>
                <td><?php echo $co; ?></td>
            </tr>

        </table>

        <br>
        <p>Other parameters that do not affect the AQI calculation:</p>
        <ul>
            <li>NH3: <?php echo $nh3; ?> µg/m³</li>
            <li>NO: <?php echo $no; ?> µg/m³</li>
        </ul>
    </div>

    <!-- Tambahkan tautan ke Bootstrap JavaScript (Opsional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
