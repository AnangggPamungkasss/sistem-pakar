<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    protected $table = 'riwayat_diagnosa';

    protected $fillable = [
        'user_id',
        'cedera_id',
        'gejala_dipilih'
    ];

    protected $casts = [
        'gejala_dipilih' => 'array',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cedera() {
        return $this->belongsTo(Cedera::class);
    }
}
