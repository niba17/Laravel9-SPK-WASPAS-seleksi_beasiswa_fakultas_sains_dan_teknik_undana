<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\BobotMahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function bobot_mahasiswa()
    {
        return $this->hasMany(BobotMahasiswa::class, 'sub_kriteria_id', 'id');
    }
}