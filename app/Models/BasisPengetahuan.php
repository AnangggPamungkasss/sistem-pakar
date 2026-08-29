<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasisPengetahuan extends Model
{
    protected $table = 'basis_pengetahuan';
    protected $fillable = ['kode_rule', 'gejala_id', 'cedera_id'];

    public function cedera()
    {
        return $this->belongsTo(Cedera::class, 'cedera_id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
