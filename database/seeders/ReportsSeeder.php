<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laporan;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laporan::create([
            'id' => fake()->uuid(),
            'title' => 'Jalan Rusak di Jalan Cibeunteur',
            'description' => 'Terdapat lubang besar di tengah jalan yang membahayakan pengendara.',
            'latitude' => -7.3703242748736955,
            'longitude' => 108.52176526185661,
            'image_path' => 'storage/jalan_rusak.jpg',
            'status' => 'pending',
            'user_id' => 3,
            'kelurahan_id' => 1,
            'rt' => 1,
            'rw' => 10,
            'kerusakan_id' => 1,
        ]);
    }
}
