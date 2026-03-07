<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ažuriranje korisnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('admin.users.update',$user) }}" method="post">
                    @csrf
                    <!-- metoda put potvrđuje update -->
                    @method('PUT')
                    {{-- Ime --}}
                  
                    <div class="mb-4">
                        <x-input-label for="name" value="Ime"/>
                        <!-- old nam služi za validaciju koja -->
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name',$user->name)" required/>
                        <!-- za error kod validacije -->
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    {{-- Prezime --}}
                    <div class="mb-4">
                        <x-input-label for="lastname" value="Prezime"/>
                        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname',$user->lastname)" required/>
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2"/>
                    </div> 
                    {{-- Email adresa --}}
                    <div class="mb-4">
                        <x-input-label for="email" value="Email adresa"/>
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email',$user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    {{-- Datum rođenja --}}
                    <div class="mb-4">
                        <x-input-label for="dbirth" value="Datum rođenja"/>
                        <x-text-input id="dbirth" name="dbirth" type="date" class="mt-1 block w-full" :value="old('dbirth',optional($user->dbirth)->format('Y-m-d'))" required />
                        <x-input-error :messages="$errors->get('dbirth')" class="mt-2"/>    
                    </div> 
                    {{-- Spol --}}
                    <div class="mb-4">
                    <x-input-label for="sex" value="Spol"/>
                    <select name="sex" id="sex" class="mt-1 block w-full border-gray-300 rounded-md">>
                    @php   
                    $selected="";
                    if(old('sex','m')==='m' && $user->sex==='m') $selected="m";
                    else $selected="f";
                    @endphp {{-- treba staviti i opciju ako spol nije odabran --}}
                     <option value="m" {{ $selected==='m'?"selected":"" }}>Muški</option>
                     <option value="f"{{ $selected==='f'?"selected":"" }}>Ženski</option>
                    </select>
                     <x-input-error :messages="$errors->get('sex')" class="mt-2"/>
                    </div>
                    {{-- Tip korisnika --}}
                    <div class="mb-6">
                        <x-input-label for="utype" value="Tip korisnika"/>
                        <select name="utype" id="utype" class="mt-1 block w-full border-gray-300 rounded-md">
                            {{-- ako je jedinica korisnik je administrator ako je 0 običan korisnik 
                            to znači automatsko selektiranje ovisno kako ga je izabrao 29-01-2026 51:40--}}
                            
                            <option value="1" @selected(old('utype',$user->utype)==='1')>
                                Administrator
                            </option>
                            <option value="0" @selected(old('utype',$user->utype)==='0')>
                                Korisnik
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('utype')" class="mt-2"/>
                    </div>
                </form>
    </div>
    </div>
    </div>
</x-app-layout>
