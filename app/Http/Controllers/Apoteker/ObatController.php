<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = Obat::all();
        $data = [
            'title'     => 'Clinic | Obat',
            'obat'     => $obat
        ];
        return view('pages.apoteker.obat.index', $data);
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
        Obat::create($data);
        return redirect()->to(route('obat.index'))->with('obatCreate', 'Berhasil menambahkan obat');
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
        $obat = Obat::findOrFail($id);
        $data = [
            'title'     => 'Clinic | Edit Obat',
            'edit'      => $obat
        ];
        return view('pages.apoteker.obat.edit', $data);
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
        $data = $request->all();
        $obat = Obat::findOrFail($id);
        $obat->update($data);
        return redirect()->to(route('obat.index'))->with('obatUpdate', 'Obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->to(route('obat.index'))->with('obatDelete', 'Obat berhasil dihapus');
    }
}
