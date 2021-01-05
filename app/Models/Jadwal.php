<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = ['kode_mk', 'nip', 'hari', 'jam'];

    public function matakuliah() {

        return $this->belongsTo('App\Models\Matakuliah', 'kode_mk' );

    }

    public function dosen() {

        return $this->belongsTo('App\Models\Dosen', 'nip');
    }

}
