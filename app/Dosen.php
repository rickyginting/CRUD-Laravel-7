<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nip', 'nama_dosen', 'img_dosen'];
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }
}
