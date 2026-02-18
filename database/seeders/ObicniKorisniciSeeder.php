<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class ObicniKorisniciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //faker koristim za kreiranje testnih emailova i usernameova
        $faker=Faker::create("hr_HR");
        User::updateOrCreate(
            //primarni unique user name key prvo 
            [
                'email'=>$faker->email
            ],
            //zatim ide zasebni element niza
            [
                'name'=>$faker->userName,
                'password'=>Hash::make('obicnikorisnik1'),
            ]
        );

           User::updateOrCreate(
            //primarni unique user name key prvo 
            [
                'email'=>$faker->email
            ],
            //zatim ide zasebni element niza
            [
                'name'=>$faker->userName,
                'password'=>Hash::make('obicnikorisnik2'),
            ]
        );

           User::updateOrCreate(
            //primarni unique user name key prvo 
            [
                'email'=>$faker->email
            ],
            //zatim ide zasebni element niza
            [
                'name'=>$faker->userName,
                'password'=>Hash::make('obicnikorisnik3'),
            ]
        );

           User::updateOrCreate(
            //primarni unique user name key prvo 
            [
                'email'=>$faker->email
            ],
            //zatim ide zasebni element niza
            [
                'name'=>$faker->userName,
                'password'=>Hash::make('obicnikorisnik4'),
            ]
        );
           User::updateOrCreate(
            //primarni unique user name key prvo 
            [
                'email'=>$faker->email
            ],
            //zatim ide zasebni element niza
            [
                'name'=>$faker->userName,
                'password'=>Hash::make('obicnikorisnik5'),
            ]
        );
    } //27.01.2026 1:05:12
}
