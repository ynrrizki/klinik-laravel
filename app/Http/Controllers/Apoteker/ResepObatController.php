<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Models\Berobat;
use App\Models\Obat;
use App\Models\ResepObat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep      = ResepObat::all();
        $berobat    = Berobat::all();
        $obat       = Obat::all();
        $data = [
            'title'     => 'Clinic | Resep Obat',
            'resep'     => $resep,
            'berobat'   => $berobat,
            'obat'      => $obat,
        ];
        return view('pages.apoteker.resep.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        ResepObat::create($data);
        return redirect()->to(route('resep-obat.index'))->with('resepCreate', 'Resep obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resepObat  = ResepObat::findOrFail($id);
        $berobat    = Berobat::all();
        $obat       = Obat::all();
        $data = [
            'title'     =>  'Clinic | Edit Resep Obat',
            'edit'      =>  $resepObat,
            'berobat'   =>  $berobat,
            'obat'      =>  $obat,
        ];
        return view('pages.apoteker.resep.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data       = $request->all();
        $resepObat  = ResepObat::findOrFail($id);
        $resepObat->update($data);
        return redirect()->to(route('resep-obat.index'))->with('resepUpdate', 'Resep obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
