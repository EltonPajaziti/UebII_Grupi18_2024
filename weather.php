<!DOCTYPE html>
<html>
<head>
    <title>Weather Information</title>
    <style>
        .weather-info {
            text-align: center;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 10px;
            font-family: Arial, sans-serif;
        }
        .weather-info h2 {
            margin-top: 0;
        }
        .weather-info img {
            vertical-align: middle;
        }
        .weather-info p {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Përmbajtja tjetër e faqes -->
        <div class="top-section">
            <!-- Your top section content -->
        </div>

        <div class="weather-info">
            <?php
            $apiKey = "35b099a3976b8465cefbfb11be43b19e";  // Këtu përdorni çelësin tuaj API.
            $city = "Pristina";
            $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($response, true);

            // Funksioni për të marrë mesazhin motivues bazuar në përshkrimin e motit
            function getMotivationalMessage($description) {
                $description = strtolower($description); // Për të siguruar që përshkrimi është në formë të ulët
                $messages = [
                    'clear sky' => 'Enjoy the sunny day and feel energized!',
                    'few clouds' => 'A few clouds can\'t dim your bright smile!',
                    'scattered clouds' => 'Even on cloudy days, your health shines through!',
                    'broken clouds' => 'Broken clouds can\'t break your spirit!',
                    'shower rain' => 'Take your umbrella and come visit your doctor!',
                    'rain' => 'Rainy days are perfect for a doctor\'s visit. Don\'t forget your umbrella!',
                    'thunderstorm' => 'Stay safe during the storm, and remember we\'re here for you!',
                    'snow' => 'Let the snow remind you of the importance of keeping warm and healthy!',
                    'mist' => 'Misty days are great for cozying up with a good book and a doctor\'s check-up!',
                ];

                return $messages[$description] ?? 'Stay positive and take care of your health!';
            }

            // Përdorimi i referencave në funksione për të modifikuar vlerat
            function modifyWeatherData(&$weatherDescription, &$temperature) {
                $weatherDescription = strtoupper($weatherDescription);
                $temperature = round($temperature);
            }

            if ($data && isset($data['weather']) && isset($data['main'])) {
                $weatherDescription = $data['weather'][0]['description'];
                $temperature = $data['main']['temp'];
                $icon = $data['weather'][0]['icon'];
                $iconUrl = "http://openweathermap.org/img/wn/{$icon}.png";
                $message = getMotivationalMessage($weatherDescription);

                // Përdorimi i funksionit për të modifikuar të dhënat e motit përmes referencave
                modifyWeatherData($weatherDescription, $temperature);

                echo "<h2>Weather in {$city}</h2>";
                echo "<img src='{$iconUrl}' alt='Weather icon'>";
                echo "<p>{$weatherDescription}, Temperature: {$temperature}&deg;C</p>";
                echo "<p>{$message}</p>";
            } else {
                echo "<p>Nuk mund të marr të dhënat e motit për {$city}. Kontrolloni API-në dhe çelësin API.</p>";
            }

            // Kthimi i një vlere përmes referencës
            function &getTemperatureReference(&$temperature) {
                return $temperature;
            }

            // Përdorimi i funksionit unset për të larguar një referencë
            $tempReference = &getTemperatureReference($temperature);
            unset($tempReference); // Kjo largon referencën, por jo vlerën origjinale

            // echo "<p>Temperature after unset reference: {$temperature}&deg;C</p>";
            ?>
        </div>

        <div class="bottom-section">
            <!-- Your bottom section content -->
        </div>
    </div>
</body>
</html>