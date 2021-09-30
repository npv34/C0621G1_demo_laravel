<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller implements BaseInterface
{
    function index() {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            "q" => "HaNoi",
            "appid" => config('app.key_open_weather')
        ] );
        $data = json_decode($response->body());
        $oC = $data->main->temp - 273.15;
        $cityName = $data->name;
        $weather = $data->weather[0]->main;
        $winSpeed = $data->wind->speed;
        return view('layouts.dashboard', compact('oC','cityName','weather','winSpeed'));
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
