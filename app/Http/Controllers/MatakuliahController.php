<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;


class MatakuliahController extends Controller
{
    //
    function index() {
        $matakuliah = MataKuliah::all();

        return view('matakuliah', ['mata_kuliah'=>$matakuliah]);
    }

    function add() {

        return view('tambah_matakuliah');
    }

    function store(Request $request) {
        $this->validate($request, [
            'kode_mk'=>'required',
            'nama_mk'=>'required',
            'sks'=>'required'
        ]);

        MataKuliah::create([
            'kode_mk'=>$request->kode_mk,
            'nama_mk'=>$request->nama_mk,
            'sks'=>$request->sks

        ]);

        return redirect('/matakuliah');
    }

    function edit($id) {

        $matakuliah = MataKuliah::find($id);
        return view('edit_matakuliah', ['mata_kuliah'=>$matakuliah]);
    }

    function update(Request $request) {

        $this->validate($request, [
            'kode_mk'=>'required',
            'nama_mk'=>'required',
            'sks'=>'required'
        ]);

        $matakuliah = MataKuliah::find($request->id);

        $matakuliah->kode_mk = $request->kode_mk;
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();

        return redirect('/matakuliah');

    }

    function delete($id) {

        $matakuliah = MataKuliah::find($id);
        $matakuliah->delete;

        return redirect('/matakuliah');
    }

    function search($cari) {
        $matakuliah = MataKuliah::where('nama_mk', 'like', '%'.$cari.'%')->get();
        return view('matakuliah', ['mata_kuliah'=>$matakuliah]);
    }
}
