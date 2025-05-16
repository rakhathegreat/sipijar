<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
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
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function laporan()
    {
        $data = DB::table('laporan')
            ->select('id', 'latitude', 'longitude')
            ->get();

        $features = $data->map(function ($item) {
            return [
                'type' => 'Feature',
                    'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        floatval($item->longitude),
                        floatval($item->latitude),
                    ],
                ],
                'properties' => [
                    'id' => $item->id,
                    'nama_jalan' => $item->nama_jalan ?? 'Tidak diketahui',
                ],
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features
        ]);
    }
}
