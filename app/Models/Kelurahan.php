<?php

namespace App\Models;

use App\Models\Kasus;
use App\Models\Kecamatan;
use App\Models\Mahasiswa;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $guarded = ['id'];

    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class);
    // }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelurahan_id', 'id');
    }
}