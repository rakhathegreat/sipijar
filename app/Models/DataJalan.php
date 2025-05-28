<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\KondisiJalan;
use App\Models\Kelurahan;
use App\Models\Gambar;
use App\Models\GeoData;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DataJalan extends Model
{
    use HasUuids, HasFactory;
    protected $table = 'data_jalan';

    protected $guarded = [];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kondisi_jalan()
    {
        return $this->belongsTo(KondisiJalan::class);
    }

    public function gambar()
    {
        return $this->hasMany(Gambar::class);
    }

    public function geodata()
    {
        return $this->hasMany(GeoData::class);
    }


}
