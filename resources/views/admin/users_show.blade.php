@extends('layouts.admin')

@section('content')
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Détails de l'utilisateur</h1>
                <div class="divide-y divide-gray-300">
                    <!-- Section Informations Générales -->
                    <div class="py-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Informations générales</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p><strong>Nom :</strong> {{ $user->name }}</p>
                                <p><strong>Prénom :</strong> {{ $user->lastname }}</p>
                            </div>
                            <div>
                                <p><strong>Email :</strong> {{ $user->email }}</p>
                                <p><strong>Téléphone :</strong> {{ $user->phone }}</p>
                                <p><strong>Role :</strong> {{ $user->role }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section Adresses -->
                    <div class="py-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Adresses</h2>
                        @forelse ($user->address as $adrs)
                            <div class="p-4 bg-gray-50 rounded-lg shadow-md mb-4">
                                <p><strong>Adresse N°1 :</strong> {{ $adrs->address_line_1 }}</p>
                                <p><strong>Adresse N°2 :</strong> {{ $adrs->address_line_2 }}</p>
                                <p><strong>Ville :</strong> {{ $adrs->city }}</p>
                                <p><strong>Region :</strong> {{ $adrs->state }}</p>
                                <p><strong>Code postale :</strong> {{ $adrs->postal_code }}</p>
                                <p><strong>Pays :</strong> {{ $adrs->country }}</p>
                            </div>
                        @empty
                            <p class="text-gray-600">Aucune adresse enregistrée.</p>
                        @endforelse
                    </div>

                    <p><strong>Créer du :</strong> {{ $user->created_at->format('d/m/Y') }}</p>

                    <!-- Bouton Retour -->
                    <div class="pt-4">
                        <a href="{{ route('users_boards') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600">
                            Back to the users listes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection