<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dosen;
use Faker\Generator as Faker;

$factory->define(Dosen::class, function (Faker $faker) {
    return [
        'nip' => '123456789',
        'nama_dosen' => 'Hengki Tamando Sihotang, S.Kom, M.Kom',
        'img_dosen' => 'default.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
