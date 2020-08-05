<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weahetApi extends Controller
{
    public function index()
    {
        $city = $_GET["city"];
        $key = env('WEATHER_API');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "api.openweathermap.org/data/2.5/weather?appid=$key&q=$city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                ": df3ed40eb5d4972da4e58728fcf29e34"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        // Country
        $name = $response["name"];
        $country = $response["sys"]["country"];

        // Temperature in location
        $kelvin = 273.15;

        // Celsius
        $celsius = $response["main"]["temp"] - $kelvin;
        $celsius = number_format($celsius) . '°C';

        // Weather in the Country
        $weather = ucfirst($response["weather"][0]["description"]);
        $weather_id = $response["weather"][0]["icon"];
        $image = "http://openweathermap.org/img/wn/$weather_id.png";
        $dt = $response["dt"];
        $dt = date("D H:i A", date($dt));

        // Clouds
        $clouds = $response["clouds"]["all"] . "%";

        // Wind
        $wind = $response["wind"]["speed"];

        // Sunrise
        $sunrise = $response["sys"]["sunrise"];
        $sunrise = date("H:i A", date($sunrise));

        // Sunset
        $sunset = $response["sys"]["sunset"];
        $sunset = date("H:i A", date($sunset));

        return view('weather.weather-overview', ['response' => $response]);
    }
}
