<?php

namespace App\Http\Controllers;

use App\Models\reim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReimController extends Controller
{
    function reimData()
    {
        $user = Auth::user();
        $reimbursement = reim::paginate(2);

        return view('reim', compact('user', 'reimbursement'));
    }

    function addReim(Request $req)
    {
        if ($req->hasFile('file')) {
            $file = $req->file("file");
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("fileReim/"), $fileName);
            $reim = reim::create([
                'tanggal' => $req->tanggal,
                'nama_reim' => $req->nama_reim,
                'deskripsi' => $req->deskripsi,
                'file' => $fileName
            ]);
        }

        $reim->reimstatuses()->create([
            'status' => 'Belum Dinilai'
        ]);
        if ($reim) {
            Session::flash('berhasil', 'Berhasil Menambahkan Pengajuan Baru');
            return back();
        } else {
            Session::flash('gagal', 'Gagal Menambahkan Pengajuan Baru');
            return back();
        }
    }

    function detailReim($id)
    {
        $user = Auth::user();
        $reim = reim::findOrFail($id);
        $fileUrl = $reim->file ? url("fileReim/" . $reim->file) : null;
        return view('detailReim', compact('user', 'reim', 'fileUrl'));
    }

    public function updateReim(Request $req, $id)
    {
        $req->validate([
            'nama_reim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', 
        ]);

        $reim = reim::findOrFail($id);

        if ($req->hasFile('file')) {
            if ($reim->file) {
                $oldFilePath = public_path('fileReim/' . $reim->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $req->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("fileReim/"), $fileName);
            // $reim->file = $fileName;
            $reim->update([
                'tanggal' => $req->tanggal,
                'nama_reim' => $req->nama_reim,
                'deskripsi' => $req->deskripsi,
                'file' => $fileName,
            ]);
            $reim->save();
        }


        if ($reim) {
            Session::flash('berhasil', 'Berhasil Memperbarui Pengajuan');
            return back();
        } else {
            Session::flash('gagal', 'Gagal Memperbarui Pengajuan');
            return back();
        }
    }

    public function deleteReim($id)
    {
        $reim = reim::findOrFail($id);
        if ($reim->file) {
            $filePath = public_path('fileReim/' . $reim->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $reim->delete();
        Session::flash('berhasil', 'Reimbursement berhasil dihapus!');
        return redirect()->route('reimData');
    }

    public function disetujuiReim($id)
    {
        $reim = reim::findOrFail($id);
        $user = Auth::user();
        // dd($user->roles->jabatan);
        $reim->reimstatuses->update([
            'status' => 'Disetujui',
            'nama_penilai' => $user->nama,
            'jabatan_penilai' => $user->roles->jabatan,
        ]);
        
        return back();
    }
    
    public function ditolakReim($id)
    {
        $reim = reim::findOrFail($id);
        $user = Auth::user();
        
        $reim->reimstatuses->update([
            'status' => 'Ditolak',
            'nama_penilai' => $user->nama,
            'jabatan_penilai' => $user->roles->jabatan,
        ]);
        
        return back();
    }


}
