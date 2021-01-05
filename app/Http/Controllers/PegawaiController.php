<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //

    function index() {
        $pegawai = Pegawai::all();

        return view('pegawai', ['pegawai'=>$pegawai]);
    }

    function add() {

        return view('tambah_pegawai');
    }

    function store(Request $request) {
        
        $this->validate($request, [
            'nip'=>'required',
            'nama'=>'required',
            'status'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        Pegawai::create([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'status'=>$request->status,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir
        ]);

        return redirect('/pegawai');
    }

    function edit($id) {
        $pegawai = Pegawai::find($id);

        return view('edit_pegawai', ['pegawai'=>$pegawai]);
    }

    function update(Request $request) {
        $pegawai = Pegawai::find($request->id);
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->status = $request->status;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->save();

        return redirect('/pegawai');
    }

    function delete($id) {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return redirect('/pegawai');
    }

    function search(Request $request) {
        $pegawai = Pegawai::where('nama', 'like', '%'.$request->cari.'%')->get();

        return view('pegawai', ['pegawai'=>$pegawai]);
    }
}
