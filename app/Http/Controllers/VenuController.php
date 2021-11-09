<?php

namespace App\Http\Controllers;

use App\Models\Venu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = 'Manila';
        $client_id = 'GE2YF1SCPEFSWBWI2WLQ51NFF0MPPSHVAH40TLU4T23S31JC';
        $client_secret = 'AKG01DOAOYDO4HL44405WFD0IZ15GZLNDEKWDMBZYU2KU3ZN';

        $venues = Http::get("https://api.foursquare.com/v2/venues/search", [
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                    'v'     => '20211111',
                    'limit'     => 100,
                    'near' => $city,
                    'locale' => 'en'
                ]);

                $arr_venue = [];
                foreach($venues['response']['venues'] as $venue)
                {
                    $arr_venue[]= [
                        'name' => $venue['name'],
                        'location' => $venue['location']['formattedAddress']
                    ];
                }

                $data['venue'] = $arr_venue;

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
     * @param  \App\Models\Venu  $venu
     * @return \Illuminate\Http\Response
     */
    public function show(Venu $venu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venu  $venu
     * @return \Illuminate\Http\Response
     */
    public function edit(Venu $venu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venu  $venu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venu $venu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venu  $venu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venu $venu)
    {
        //
    }
}
