@extends('layout.app')

@section('title', 'Weather')

@section('content')

    @php

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

    @endphp

    <section style="padding-top: 100px;">
        <div class="card mx-auto weather-card rounded" style="max-width: 22rem;">
            <div class="card-body pb-3">
                <h4 class="card-title font-weight-bold">{{ $response['name'] }} ({{ $response['sys']['country'] }})</h4>
                <p class="card-text">{{ $dt }}, {{ $weather }} <img src="{{ $dt }}" alt=""></p>
                <div class="d-flex justify-content-between">
                    <p class="display-1 degree">{{ $celsius }}</p>
                    <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <p><i class="fas fa-cloud"></i> {{ $clouds }} Clouds</p>
                    <p><i class="fas fa-leaf fa-lg grey-text pr-2"></i>{{ $wind }} km/h Winds</p>
                </div>
                <hr class="">
                <div class="d-flex justify-content-between">
                    <p><i><img class="pr-1 pb-3" src="{{ asset('./img/rise.png') }}" alt="Sunrise"></i>{{ $sunrise }}</p>
                    <p style="padding-right: 60px;"><i><img class="pt-2 pr-1" src="{{ asset('./img/sunset.png') }}" alt="Sunset"></i>{{ $sunset }}</p>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection

