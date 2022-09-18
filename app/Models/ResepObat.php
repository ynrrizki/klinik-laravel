<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
    protected $guarded = [];

    public function berobat()
    {
        return $this->belongsTo(Berobat::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
