<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    
    
}
