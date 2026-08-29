<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    protected $table ='notifikasi';
    protected $fillable =['tipe', 'pesan', 'dibaca', 'dibuat_oleh', 'target_role'];
}
