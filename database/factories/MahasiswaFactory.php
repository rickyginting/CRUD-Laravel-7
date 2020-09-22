<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mahasiswa;
use Faker\Generator as Faker;

$factory->define(Mahasiswa::class, function (Faker $faker) {
    return [
        'nim' => '180121001',
        'nama_mahasiswa' => 'Ricky Martin Ginting',
        'img_mahasiswa' => 'default.jpg',
        'dosen_id' => '1',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
