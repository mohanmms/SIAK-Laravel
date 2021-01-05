<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //

    function index() {
        $dosen = Dosen::all();

        return view('dosen', ['dosen'=>$dosen]);
    }

    function add() {
        return view('tambah_dosen');
    }

    function store(Request $request) {
        $this->validate($request, [
            'nip'=>'required',
            'nama'=>'required',
            'status'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        Dosen::create([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'status'=>$request->status,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir
        ]);

        return redirect('/dosen');
    }

    function edit($id) {
        $dosen = Dosen::find($id);

        return view('edit_dosen', ['dosen'=>$dosen]);
    }

    function update(Request $request) {
        $dosen = Dosen::find($request->id);
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->status = $request->status;
        $dosen->tempat_lahir = $request->tempat_lahir;
        $dosen->save();

        return redirect('/dosen');
    }

    function delete($id) {
        $dosen = Dosen::find($id);
        $dosen->delete();

        return redirect('/dosen');
    }

    function search(Request $request) {
        $dosen = Dosen::where('nama', 'like', '%'.$request->cari.'%')->get();

        return view('dosen', ['dosen'=>$dosen]);
    }
}
