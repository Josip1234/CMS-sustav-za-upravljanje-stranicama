<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

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
        //paginator za prikazivanje 5 po stranici
        $users=User::orderBy('id')->paginate(5);
        return view('admin.users.index',[
            'users'=>$users,
        ]);
    }
    public function edit(Request $request,User $user):View{
        return view('admin.users.edit',[
            'user'=>$user,
        ]);
    }
    public function update(Request $request,User $user):RedirectResponse{
        $validated=$request->validate([
            'name'=>['required','string','max:255'],
            'lastname'=>['required','string','max:60'],
            'email'=>['required','email','max:255'],
            'dbirth'=>['required','date','before:today'],
            'sex'=>['required','in:m,f'],
            'utype'=>['required','in:0,1'],
            'status'=>['required','in:aktivan,neaktivan,zabranjen'],
        ]);
        //gotova metoda za ažuriranje usera koja postoji u profile controlleru
        //ona se zove i update-a se cijeli user 
        $user->update($validated);
        return redirect()->route('admin.users.index')->with('status','Korisnik je uspješno ažuriran.');

    }
    //funkcija za brisanje korisnika
    //29.01.2026 1:20:16
    public function destroy(User $user):RedirectResponse{
        if($user->id === auth()->id()){
            abort(403,'Ne možete obrisati samog sebe.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('status','Korisnik je uspješno obrisan.');
    }
}
