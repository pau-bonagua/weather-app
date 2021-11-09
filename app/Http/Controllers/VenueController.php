<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VenueController extends Controller
{
    public function loadVenues(Venue $venue, $city, $limit)
    {
        $id = $venue->getClientId();
        $secret = $venue->getClientSecret();

        $venues = Http::get("https://api.foursquare.com/v2/venues/search", [
            'client_id' => $id,
            'client_secret' => $secret,
            'v'     => '20211111',
            'limit'     => $limit,
            'near' => $city,
            'locale' => 'en',
        ]);
        
        $arr_venue = [];
        foreach ($venues['response']['venues'] as $venue) {
            $arr_venue[] = [
                'id'            => $venue['id'],
                'name'          => $venue['name'],
                'address'      => $venue['location']['formattedAddress'],
                'latitude'      => $venue['location']['lat'],
                'longitude'     => $venue['location']['lng'],
                'type'          => $venue['categories'][0]['name']
            ];
        }

        $data['venue'] = $arr_venue;
        return $data['venue'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
