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
                    {{-- 29-01-2026 31:11 napomena napraviti sva polja za ostalo --}}
                    <div class="mb-4">
                        <x-input-label for="name" value="Ime"/>
                        <!-- old nam služi za validaciju koja -->
                        <x-text-input id="name" name="name" class="mt-1 block w-full" :value="old('name',$user->name)" required/>
                        <!-- za error kod validacije -->
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                </form>
    </div>
    </div>
    </div>
</x-app-layout>
