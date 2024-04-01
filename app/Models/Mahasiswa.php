<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function bobot_mahasiswa()
    {
        return $this->hasMany(BobotMahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}