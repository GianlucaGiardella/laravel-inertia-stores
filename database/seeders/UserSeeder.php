<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        User::create([
            'name'         => 'Gianluca Giardella',
            'birth_date'   => '2000/01/01',
            'email'        => 'admin@gmail.com',
            'password'     => Hash::make('password'),
        ]);

        for ($i = 0; $i < 4; $i++) {
            User::create([
                'name'          => $faker->name,
                'birth_date'    => $faker->date('Y-m-d'),
                'email'         => $faker->unique()->safeEmail,
                'password'      => Hash::make('password'),
            ]);
        }
    }
}