<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Utilities\Slug;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $users = User::all();

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->company;
            $slug = Slug::unique($name, Store::class);

            Store::create([
                'user_id'    => $faker->randomElement($users)->id,
                'name'       => Str::ucfirst($name),
                'slug'       => $slug,
                'phone'      => $faker->phoneNumber('IT'),
                'hours'      => '08:00-22:00',
                'active'     => $faker->boolean,
                'services'   => Str::ucfirst($faker->word(rand(3, 7))),
            ]);
        }
    }
}