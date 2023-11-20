<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function absensi()
    {
        return $this->hasMany(Absensi::class,'pegawai_id');
    }
}
