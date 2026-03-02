<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                         {{ __("Prijavljeni ste!") }}
                    </div>
                    <!-- ispiši tip korisnika ako je korisnik prijavljen -->
                    <div class="mt-1 text-sm text-gray-600">
                        <span class="font-semibold">
                       Tip korisnika: {{ auth()->user()->utype==="1" ?'Admin':'Korisnik' }}
                       </span>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
