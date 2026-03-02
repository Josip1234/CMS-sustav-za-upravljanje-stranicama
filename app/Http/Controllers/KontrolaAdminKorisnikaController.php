<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

//kontroler za admin korisnika
//pravimo prvo listu korisnika koju može vidjeti samo admin
//pravimo middleware koji će provjeravati dali je korisnik koji je prijavljen administrator
//preko njega ćemo kontrolirati da samo admin može pristupiti nekoj stranici
class KontrolaAdminKorisnikaController extends Controller
{
    public function index():View{
        //eager loading - slično kao što radimo u sql-u, 
        //to je jezik koji se koristi u laravelu za dohvat rezultata
        //sortiranje, uređivanje i tako dalje
        $users=User::orderBy('id')->get();
        return view('admin.users.index',[
            'users'=>$users,
        ]);
    }
}
