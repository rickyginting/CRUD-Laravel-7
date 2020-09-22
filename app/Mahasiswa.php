<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim', 'nama_mahasiswa', 'img_mahasiswa', 'dosen_id'];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function scopeCoba($query)
    {
        return $query->get();
    }
}
