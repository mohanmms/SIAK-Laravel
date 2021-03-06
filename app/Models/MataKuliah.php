<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $fillable = ['kode_mk', 'nama_mk', 'sks'];

    public function jadwal() {

        return $this->hasOne('App\Models\Jadwal', 'kode_mk', 'kode_mk');
    }


}
