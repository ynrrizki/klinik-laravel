<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Clinic | Apoteker'
        ];

        return view('pages.apoteker.index', $data);
    }
}
