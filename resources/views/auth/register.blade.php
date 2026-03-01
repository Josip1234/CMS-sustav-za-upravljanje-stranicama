<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name  trebamo dodati fname i lname ažurirati i seedere i migracije
        promijeniti name u fname-->
        <div>
            <x-input-label for="name" :value="__('Ime')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
          <!-- prezime -->
           <div>
            <x-input-label for="lastname" :value="__('Prezime')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"  autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email adresa')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

          <!-- Datum rođenja -->
        <div class="mt-4">
            <x-input-label for="dbirth" :value="__('Datum rođenja')" />
            <x-text-input id="dbirth" class="block mt-1 w-full" type="date" name="dbirth" :value="old('dbirth')"  />
            <x-input-error :messages="$errors->get('dbirth')" class="mt-2" />
        </div>

             <!-- Odabir spola -->
        <div class="mt-4">
            <x-input-label for="sex" :value="__('Spol')" />
            @if(old('sex','m')==='m')
             <x-text-input id="m" type="radio" name="sex" :value="old('sex','m')" checked/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f')"  /> Ženski spol
            @elseif(old('sex','m')==='f')
             <x-text-input id="m" type="radio" name="sex" :value="old('sex','m')"/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f')" checked /> Ženski spol
            @else
            <x-text-input id="m" type="radio" name="sex" :value="old('sex','m')" checked/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f')"  /> Ženski spol
            @endif 
               
           
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Šifra')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                             autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
         <!-- hidden field za običnog korisnika tijekom registracije -->
          <x-text-input id="hidden" class="block mt-1 w-full"
                            type="hidden"
                            name="utype"
                             value="0" />
            <!-- hidden field za aktivan račun prilikom registracije -->
           <x-text-input id="hidden" class="block mt-1 w-full"
                            type="hidden"
                            name="status"
                             value="aktivan" />

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Potvrda šifre')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Već ste registrirani?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registriraj se') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
