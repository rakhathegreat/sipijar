<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KondisiJalan extends Model
{
    protected $table = 'kondisi_jalan';
    protected $guarded = [];

    public function data_jalan()
    {
        return $this->hasMany(DataJalan::class);
    }
}
