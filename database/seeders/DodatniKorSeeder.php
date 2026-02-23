<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DodatniKorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker=Faker::create("hr_HR");
        User::updateOrCreate(
            //generiranje random emaila
            ['email'=>$faker->email],
            [
                //generiranje random user name-a
                'name'=>$faker->userName,
                //generiranje random datuma
                'dbirth'=>$faker->date,
                //generiranje random spola m ili f m muško f žensko
                'sex'=>$faker->randomElement(['m','f']),
                //generiranje random tipa korisničkog računa 0 korisnik 1 admin
                'utype'=>$faker->randomElement(['0','1']),
                //generiranje random statusa računa aktivan nekativan zabranjen
                'status'=>$faker->randomElement(['aktivan','neaktivan','zabranjen']),
                //šifru ne bi trebali generirati random da se možemo prijaviti
                'password'=>Hash::make('korisnik2'),
            ]
            //27-01-2026 1:26:33
        );
    }
}
