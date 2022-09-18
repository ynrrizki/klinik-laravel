<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $guarded = [];

    public function berobat()
    {
        return $this->hasMany(Berobat::class);
    }
}
