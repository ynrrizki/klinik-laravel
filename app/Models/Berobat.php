<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berobat extends Model
{
    use HasFactory;

    protected $table = 'berobat';
    protected $guarded = [];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function resepObat()
    {
        return $this->hasMany(ResepObat::class);
    }
}
