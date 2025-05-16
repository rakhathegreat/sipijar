<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'kerusakan';
    protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

}
