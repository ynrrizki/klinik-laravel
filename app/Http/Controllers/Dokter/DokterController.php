<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Clinic | Dokter'
        ];

        return view('pages.dokter.index', $data);
    }
}
