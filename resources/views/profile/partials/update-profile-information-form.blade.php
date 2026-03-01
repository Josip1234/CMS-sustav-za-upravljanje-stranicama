<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informacije o profilu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ažuriranje informacija profila") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Ime')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <!-- prezime -->
           <div>
            <x-input-label for="lastname" :value="__('Prezime')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname',$user->lastname)" required  autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>
                  <!-- Datum rođenja -->
        <div class="mt-4">
            <x-input-label for="dbirth" :value="__('Datum rođenja')" />                                <!-- ukoliko format nije prazan to znači upitnik -->
            <x-text-input id="dbirth" class="block mt-1 w-full" type="date" name="dbirth" :value="old('dbirth',$user->dbirth?->format('Y-m-d'))"  />
            <x-input-error :messages="$errors->get('dbirth')" class="mt-2" />
        </div>

              <div class="mt-4">
            <x-input-label for="sex" :value="__('Spol')" />
            @if( $user->sex ==='m') <!-- 27.01.2026 1:52:24 -->
           
             <x-text-input id="m" type="radio" name="sex" :value="old('sex','m',$user->sex)" checked/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f',$user->sex)"  /> Ženski spol
            @elseif( $user->sex ==='f')
             <x-text-input id="m" type="radio" name="sex" :value="old('sex','m',$user->sex)"/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f',$user->sex)" checked /> Ženski spol
            @else
            <x-text-input id="m" type="radio" name="sex" :value="old('sex','m',$user->sex)" checked/>Muški spol
            <x-text-input id="f" type="radio" name="sex" :value="old('sex','f',$user->sex)"  /> Ženski spol
            @endif 
               
           
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email adresa')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
