<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $data = [
            'user'  => $user,
            'title' => 'Clinic | Admin'
        ];
        return view('pages.admin.users.index', $data);
    }

    public function store(Request $request)
    {
        $validateData = $request->all();

        $validateData['password'] = Hash::make($validateData['password']);

        if ($validateData['level'] == 'DOKTER') {
            $validateDataDokter['nama_dokter'] = $validateData['nama_lengkap'];
            Dokter::create($validateDataDokter);
        }
        User::create($validateData);
        return redirect()->to(route('user.index'))->with('userCreate', 'Berhasil menambahkan ' . $validateData['nama_lengkap']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'title' => 'Clinic | Admin',
            'edit'  => $user,
        ];
        return view('pages.admin.users.edit', $data);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        /*
        **  ?? 
        **  Hemmmm kurang efektif
        **  membuat UpdateUserRequest nya seperti sia-sia
        **  dikarenakan password masih saja perlu diisi dan tidak bisa nullable
        **  ??
        */

        $user = [
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => $request->password,
            'level'        => $request->level
        ];


        $data = User::findOrFail($id);
        $dataDokter = Dokter::all();

        if ($request->input('password') == null) {
            $user['password'] = $data['password'];
        }

        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->level == 'DOKTER') {
            $dokter['nama_dokter'] = $request->nama_lengkap;
            if ($request->nama_lengkap) {
                Dokter::where('nama_dokter', $data['nama_lengkap'])->update($dokter);
            }
            Dokter::create($dokter);
        }

        if (isset($data['nama_lengkap']) == $dataDokter) {
            if ($request->level != 'DOKTER') {
                Dokter::where('nama_dokter', $data['nama_lengkap'])->delete();
            }
        }




        $data->update($user);

        return redirect()->to(route('user.index'))->with('userUpdate', 'Data user berhasil diupdate');
    }

    public function show()
    {
        //
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->to(route('user.index'))->with('userDelete', 'Berhasil menghapus ' . $data->nama_lengkap);
    }
}
