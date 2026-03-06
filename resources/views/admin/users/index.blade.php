<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Popis korisnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        @if(session('status'))
                            <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                                    {{ session('status') }}
                            </div>
                        @endif
                
            
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
                                <td class="border px-3 py-2">{{ $u->lastname===""?"-":$u->lastname }}</td>
                                <td class="border px-3 py-2">{{ $u->email }}</td>
                                <td class="border px-3 py-2">{{ $u->dbirth===null?"-":$u->dbirth->format("d.m.Y") }}</td>
                                <td class="border px-3 py-2">{{ $u->sex==="m"?"Muški":"Ženski" }}</td>
                                <td class="border px-3 py-2">{{ $u->utype ==="1"?"Administrator":"Korisnik" }}</td>
                                <td class="border px-3 py-2">{{ $u->status ===null?"-": $u->status}}</td>
                                <td class="border px-3 py-2">
                                    <!-- prva akcija je za editiranje korisnika -->
                                <a href="{{ route("admin.users.edit",$u) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3" title="Uredi">
                                    <i class="bi bi-pencil icon-edit"></i>
                                </a>
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
