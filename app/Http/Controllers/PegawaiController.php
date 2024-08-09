<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    function pegawai()
    {
        $user = Auth::user();
        $pegawai = User::paginate(2);
        $roles = Role::all();
        $last_pegawai = User::orderBy('NIP', 'desc')->first();
        $last_NIP = $last_pegawai ? $last_pegawai->NIP : 1234;
        $new_NIP = $last_NIP + 1;

        return view('pegawai', compact('user', 'pegawai', 'roles', 'new_NIP'));
    }

    function addPegawai(Request $req)
    {
        // dd($req);
        $pegawai = User::create([
            'NIP' => $req->NIP,
            'nama' => $req->nama,
            'password' => Hash::make($req->password)
        ]);
        $pegawai->roles()->create([
            'jabatan' => $req->jabatan
        ]);
        if ($pegawai) {
            Session::flash('berhasil', 'Berhasil Menambahkan Pegawai Baru');
            return back();
        } else {
            Session::flash('gagal', 'Gagal Menambahkan Pegawai Baru');
            return back();
        }
    }

    public function updatePegawai(Request $request, $id)
    {
        $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
        ]);

        $pegawai = User::findOrFail($id);

        $pegawai->update([
            'NIP' => $request->NIP,
            'nama' => $request->nama,
        ]);

        $pegawai->roles()->update([
            'jabatan' => $request->jabatan
        ]);

        return back()->with('berhasil', 'Berhasil Merubah Data Pegawai');
    }

    function deletePegawai($id)
    {

        $pegawai = User::destroy($id);
        if ($pegawai) {
            Session::flash('berhasil', 'Berhasil Menghapus Data Pegawai');
        } else {
            Session::flash('gagal', 'Gagal Menghapus Data Pegawai');
        }
        return back();
    }
}
