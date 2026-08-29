<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cedera extends Model
{
    protected $table = 'cedera';
    protected $fillable = ['kode_cedera', 'nama_cedera', 'penanganan'];

    protected $casts = [
        'penanganan' => 'array',
    ];

    public function basispengetahuan()
    {
        return $this->hasMany(BasisPengetahuan::class, 'cedera_id');
    }
    
}
