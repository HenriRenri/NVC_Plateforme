@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">
        <button class="bg-yellow-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Add new user</button>
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Liste des utilisateurs</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Prénom</th>
                    <th class="border border-gray-300 px-4 py-2">Téléphone</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Adresse 1</th>
                    <th class="border border-gray-300 px-4 py-2">Adresse 2</th>
                    <th class="border border-gray-300 px-4 py-2">Ville</th>
                    <th class="border border-gray-300 px-4 py-2">Region</th>
                    <th class="border border-gray-300 px-4 py-2">Code postal</th>
                    <th class="border border-gray-300 px-4 py-2">Pays</th>
                    <th class="border border-gray-300 px-4 py-2">Date de création</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 ">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->name, 0, 2)}}...</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->lastname, 0, 1)}}... {{ substr($user->lastname, -2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->phone, 0, 3)}}... {{ substr($user->phone, -2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->email, 0, 3)}}... {{ substr($user->email, -4) }}</td>                            
                        @foreach ($user->address as $adrs)
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->address_line_1, 0, 5) }}...{{ substr($adrs->address_line_1, -5) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->address_line_2, 0, 5) }}...{{ substr($adrs->address_line_2, -5) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->city, 0, 2) }}...{{ substr($adrs->city, -2) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->state, 0, 2) }}...{{ substr($adrs->state, -3) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $adrs->postal_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $adrs->country }}</td>
                        @endforeach 
                        <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2 ">
                            <i class="fas fa-eye hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('users_boards_show', $user->id) }}'"></i>
                            <i class="fas fa-user-pen text-green-400 text-xl"></i>
                            <i class="fas fa-trash text-red-400 text-xl"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $users->links() }} {{-- Affiche la pagination --}}
        </div>
    </div>
@endsection