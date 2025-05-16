<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    
    
}
