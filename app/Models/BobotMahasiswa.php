<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BobotMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_sub_kriteria';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'sub_kriteria_id', 'id');
    }
}