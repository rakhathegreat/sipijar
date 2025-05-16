<?php

namespace App\Http\Controllers;

use App\Models\GeoData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GeoData $geoData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeoData $geoData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeoData $geoData)
    {
        //
    }


    public function geojson()
    {
        $data = DB::table('geodata')
            ->select('id', 'name', DB::raw('ST_AsGeoJSON(geom) as geometry'))
            ->get();

        $features = $data->map(function ($item) {
            return [
                'type' => 'Feature',
                'geometry' => json_decode($item->geometry),
                'properties' => [
                    'id' => $item->id,
                    'name' => $item->name
                ]
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features
        ]);
    }
}
