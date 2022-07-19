<!DOCTYPE html>
<html lang="en">
<head>
    <title>Агрегация погодных данных</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="gradient-all1">Погода</div>

<form method="POST">
    <div class="container">
        <div class="textStylization">Город</div>
        <input type="text" class="field" name="city" placeholder="Minsk" required>
    </div>
    <button class="sliding-button" name="submit">Получить данные о погоде</button>
</form>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
    header('Content-Type: text/html;charset=UTF-8');

    // OpenweatherMap
    $city = $_POST['city'];

    $mode = "json"; // в каком виде мы получим данные json или xml
    $units = "metric"; // Единицы измерения. metric или imperial
    $lang = "ru"; // язык
    $countDay = 2; // количество дней. Максимум 14 дней
    $appID = "4f6c11e02571b5fdd1aa5d9a4e954e2f"; // Ваш APPID
    $url = "https://api.openweathermap.org/data/2.5/forecast?id=524901&q=$city&cnt=$countDay&lang=$lang&units=$units&appid=$appID";
    $data = @file_get_contents($url);
    if ($data) {
        $dataJson = json_decode($data);
        $arrayDays = $dataJson->list;
        $arrayLatLon = $dataJson->city;
        $oneDay1 = $arrayDays[1];
        $id = $arrayLatLon->id;
        echo "<div class='gradient-all2'>OpenWeatherMapApi</div>";
        echo "<p class='textStylizationData'>Макс. Темп: " . $oneDay1->main->temp_max . "</p>";
        echo "<p class='textStylizationData'>Влажность: " . $oneDay1->main->humidity . "</p>";
        echo "<p class='textStylizationData'>Ветер: " . $oneDay1->wind->speed . "</p>";
    } else {
        echo "Сервер не доступен!";
    }

    //==================================================================================================================

    // WeatherApi

    // инициализирует новый сеанс с URL и возвращает дескриптор, который исп след функцией
    $curl = curl_init();

    // установка параметров для сеанса с URL
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/forecast.json?q=$city&days=3",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: weatherapi-com.p.rapidapi.com",
            "x-rapidapi-key: 30ac675d71msh959175cc77fc049p10ac85jsn11d2b96a63c9"
        ],
    ]);

    // выполняет URL запрос и возвращает результат
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $dataJson = json_decode($response);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $arrayDays = $dataJson->forecast->forecastday;
        $oneDay3 = $arrayDays[1];
        echo "<div class='gradient-all2'>WeatherApi</div>";
        echo "<p class='textStylizationData'>Макс. Темп: " . $oneDay3->day->maxtemp_c . "</p>";
        echo "<p class='textStylizationData'>Влажность: " . $oneDay3->day->avghumidity . "</p>";
        echo "<p class='textStylizationData'>Ветер: " . $oneDay3->day->maxwind_kph / 3.6 . "</p>";
    }


    $avg = ['temp' => 0.00, 'hum' => 0, 'speed' => 0.00];
    $avg['temp'] = ($oneDay1->main->temp_max + $oneDay3->day->maxtemp_c) / 2;
    $avg['hum'] = ($oneDay3->day->avghumidity + $oneDay1->main->humidity) / 2;
    $avg['speed'] = ($oneDay3->day->maxwind_kph / 3.6 + $oneDay1->wind->speed) / 2;

    echo "<br>";
    echo "<div class='gradient-all3'>Средние значения</div>";
    echo "<p class='textStylizationDataAverage'>Макс. Темп: " . $avg['temp'] . "</p>";
    echo "<p class='textStylizationDataAverage'>Влажность: " . $avg['hum'] . "</p>";
    echo "<p class='textStylizationDataAverage'>Ветер: " . $avg['speed'] . "</p>";
}

?>