<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function loadWeather(Weather $weather, $city = "Tokyo")
    {
        $data = [];

        
        $key = $weather->getKey();
        $result = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q'     => $city,
            'units' => 'metric',
            'appid' => $key

        ]);
        if ($result['cod'] !== '404') 
        {
            $data = [
                'code'          => $result['cod'],
                'city'          => $result['name'],
                'country'       => $result['sys']['country'],
                'temp'          => $result['main']['temp'],
                'description'   => $result['weather'][0]['description'],
                'icon'          => $result['weather'][0]['icon'],
                'icon_link'     => "http://openweathermap.org/img/w/{$result['weather'][0]['icon']}.png"
            ];
            $data['code'] = $data['country'] == 'JP' ? '200':'404';
            return $data;
        }
        else{
            $data['code'] = '404';
        }
        
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('weather.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function show(Weather $weather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function edit(Weather $weather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weather $weather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $weather)
    {
        //
    }
}
