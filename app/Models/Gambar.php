<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambar_jalan';
    protected $guarded = [];

    public function data_jalan()
    {
        return $this->belongsTo(DataJalan::class);
    }

}
