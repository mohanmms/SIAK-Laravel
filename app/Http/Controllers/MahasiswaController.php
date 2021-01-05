<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    //
    function index() {

        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa', ['mahasiswa'=>$mahasiswa]);

    }

    function add() {

        return view('tambah_mahasiswa');
    }

    function store(Request $request) {

        $this->validate($request, [
            'nim'=>'required',
            'nama'=>'required',
            'jurusan'=>'required'

        ]);

        Mahasiswa::create([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir
        ]);

        return redirect('/mahasiswa');

    }

    function edit($id) {
        $mahasiswa = Mahasiswa::find($id);

        return view('edit_mahasiswa', ['mahasiswa'=>$mahasiswa]);

    }

    function update(Request $request) {
        $this->validate($request, [
            'nim'=>'required',
            'nama'=>'required',
            'jurusan'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->save();

        return redirect('/mahasiswa');

    }

    function delete($id) {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa');

    }

    function search(Request $request) {

        $mahasiswa = Mahasiswa::where('nama', 'like', '%'.$request->cari.'%')->get();


        return view('mahasiswa', ['mahasiswa'=>$mahasiswa]);

    }
}
