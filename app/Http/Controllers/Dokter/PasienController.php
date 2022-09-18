<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pasien\StorePasienRequest;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        $data = [
            'title'       => 'Clinic | Pasien',
            'pasien' => $pasien,
        ];
        return view('pages.dokter.pasien.index', $data);
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
    public function store(StorePasienRequest $request)
    {
        Pasien::create($request->all());
        return redirect()->to(route('pasien.index'))->with('pasienCreate', 'Berhasil menambahkan pasien ' . $request->nama_pasien);
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
        $pasien = Pasien::findOrFail($id);
        $data   = [
            'title' => 'Clinic | Edit Pasien',
            'edit'  => $pasien,
        ];
        return view('pages.dokter.pasien.edit', $data);
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
        $pasien     = Pasien::findOrFail($id);
        $pasien->update($data);

        return redirect()->to(route('pasien.index'))->with('pasienUpdate', 'Data pasien berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->to(route('pasien.index'))->with('pasienDelete', 'Data pasien berhasil dihapus');
    }
}
