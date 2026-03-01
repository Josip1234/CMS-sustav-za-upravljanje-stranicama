<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //datum mora biti prije danas
            'dbirth'=>['required','date','before:today'],
            'sex'=>['required','string','in:m,f'],
            'utype'=> ['required','in:0,1'],
            'status'=>['required','in:aktivan,neaktivan,zabranjen'],
            'lastname'=>['required','string','max:60'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname'=>$request->lastname,
            'email' => $request->email,
            'dbirth'=> $request->dbirth,
            'sex'=>$request->sex,
            'utype'=>$request->utype,
            'status'=>$request->status,
            'password' => Hash::make($request->password),
        ]);
        //event javlja da je registriran novi user
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
