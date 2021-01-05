<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['nip', 'nama', 'status', 'tempat_lahir', 'tanggal_lahir'];

    public function jadwal() {

        return $this->hashOne('App\Models\Jadwal', 'nip', 'nip');
    }
}
