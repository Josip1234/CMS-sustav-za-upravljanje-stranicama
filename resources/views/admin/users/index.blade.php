<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Popis korisnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-50 ">
                            <th class="border px-3 py-2 text-left">ID</th>
                            <th class="border px-3 py-2 text-left">Ime</th>
                            <th class="border px-3 py-2 text-left">Prezime</th>
                            <th class="border px-3 py-2 text-left">Email</th>
                            <th class="border px-3 py-2 text-left">Datum rođenja</th>
                            <th class="border px-3 py-2 text-left">Spol</th>
                            <th class="border px-3 py-2 text-left">Tip korisnika</th>
                            <th class="border px-3 py-2 text-left">Status računa</th>
                            <th class="border px-3 py-2 text-left">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td class="border px-3 py-2">{{ $u->id }}</td>
                                <td class="border px-3 py-2">{{ $u->name }}</td>
                                <td class="border px-3 py-2">{{ $u->lastname }}</td>
                                <td class="border px-3 py-2">{{ $u->email }}</td>
                                <td class="border px-3 py-2">{{ $u->dbirth }}</td>
                                <td class="border px-3 py-2">{{ $u->sex }}</td>
                                <td class="border px-3 py-2">{{ $u->utype ==="1"?"Administrator":"Korisnik" }}</td>
                                <td class="border px-3 py-2">{{ $u->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
