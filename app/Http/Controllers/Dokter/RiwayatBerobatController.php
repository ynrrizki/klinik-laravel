<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Berobat;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RiwayatBerobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berobat = Berobat::with(['pasien', 'dokter'])->get();
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $data = [
            'title' => 'Clinic | Pasien',
            'berobat' => $berobat,
            'pasien' => $pasien,
            'dokter' => $dokter,
        ];
        return view('pages.dokter.berobat.index', $data);
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
        $riwayatBerobat = $request->all();
        Berobat::create($riwayatBerobat);
        return redirect()->to(route('riwayat-berobat.index'))->with('berobatCreate', 'Data yang berobat berhasil ditambahkan');
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
        $riwayatObat    = Berobat::findOrFail($id);
        $pasien         = Pasien::all();
        $dokter         = Dokter::all();
        $data = [
            'title'     => 'Clinic | Edit Riwayat Obat',
            'edit'      => $riwayatObat,
            'pasien'    => $pasien,
            'dokter'    => $dokter
        ];
        return view('pages.dokter.berobat.edit', $data);
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
        $data           = $request->all();
        $riwayatBerobat = Berobat::findOrFail($id);
        $riwayatBerobat->update($data);
        return redirect()->to(route('riwayat-berobat.index'))->with('berobatUpdate', 'Data yang berobat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayatBerobat = Berobat::findOrFail($id);
        $riwayatBerobat->delete();
        return redirect()->to(route('riwayat-berobat.index'))->with('berobatDelete', 'Data yang berobat berhasil dihapus');
    }
}
