<?php

namespace App\Models;

use App\Models\Tahun;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kasus extends Model
{
    use HasFactory;

    protected $table = 'kasus';
    protected $guarded = ['id'];

    function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}