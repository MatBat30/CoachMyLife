@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Section pour afficher les informations de l'utilisateur -->
                    <div class="mt-4">
                        <h2>{{ __('Informations de l\'utilisateur') }}</h2>
                        <p>{{ __("Pseudo: ") }} {{ Auth::user()->name }}</p>
                        <p>{{ __("Âge: ") }} {{ Auth::user()->age }}</p>
                        <p>{{ __("Sexe: ") }} {{ Auth::user()->sex }}</p>
                        <p>{{ __("Poids: ") }} {{ Auth::user()->poids }}</p>
                        <p>{{ __("Taille: ") }} {{ Auth::user()->taille }}</p>
                    </div>

                    <!-- Section pour afficher les tâches quotidiennes de l'utilisateur -->
                    <div class="mt-4">
                        <h2>{{ __('Tâches quotidiennes') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
