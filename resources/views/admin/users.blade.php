@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">
        <button class="bg-yellow-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Add new user</button>
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Liste des utilisateurs</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Date de création</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button class="bg-teal-300 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-full">
                                Updat
                            </button>
                            <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                Delete
                            </button>
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