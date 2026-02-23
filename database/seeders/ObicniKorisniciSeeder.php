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
                'password'=>Hash::make('korisnik3'),
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
                'password'=>Hash::make('korisnik4'),
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
                'password'=>Hash::make('korisnik5'),
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
                'password'=>Hash::make('korisnik6'),
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
                'password'=>Hash::make('korisnik7'),
            ]
        );
    } 
}
