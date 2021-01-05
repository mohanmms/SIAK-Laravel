<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JadwalController extends Controller
{
    //

    function index() {
        $jadwal = Jadwal::all();

        return view('jadwal', ['jadwal'=>$jadwal]);
    }

    function add() {
        $dosen = Dosen::all();
        $matakuliah = MataKuliah::all();
        return view('tambah_jadwal', ['dosen'=>$dosen, 'matakuliah'=>$matakuliah]);
    }

    function store(Request $request) {

        $this->validate($request, [
            'kode_mk'=>'required',
            'nip'=>'required',
            'hari'=>'required',
            'jam'=>'required'
        ]);

        Jadwal::create([
            'kode_mk'=>$request->kode_mk,
            'nip'=>$request->nip,
            'hari'=>$request->hari,
            'jam'=>$request->jam
        ]);

        return redirect('/jadwal');
    }

    function edit($id) {
        $jadwal = Jadwal::find($id);

        return view('edit_jadwal', ['jadwal'=>$jadwal]);
    }

    function update(Request $request) {
        $this->validate($request, [
            'kode_mk'=>$request->kode_mk,
            'nip'=>$request->nip,
            'hari'=>$request->hari,
            'jam'=>$request->jam
        ]);

        $jadwal = Jadwal::find($request->id);
        $jadwal->kode_mk = $request->kode_mk;
        $jadwal->nama_mk = $request->nama_mk;
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->save();

        return redirect('/jadwal');
    }

    function delete($id) {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return redirect('/jadwal');
    }
}
