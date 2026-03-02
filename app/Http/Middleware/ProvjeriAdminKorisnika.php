<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

//middleware koji će provjeravati dali je korisnik koji je prijavljen administrator
//preko njega kontroliramo da samo admin može pristupiti nekoj stranici
class ProvjeriAdminKorisnika
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //trebamo povući prvo podatke o korisniku
        //ovo znači želimo trenutnog usera ako je logiran
        $user=$request->user();
        //ako ne postoji user, ako nije inicijaliziran ili nije prijavljen 
        //ili ako korisnik nije tipa admina (1 znači da je admin)
        if(!$user || $user->utype !=="1"){
            abort("403","Samo admin može pristupiti ovoj stranici");
        }
        return $next($request);
    }
}
