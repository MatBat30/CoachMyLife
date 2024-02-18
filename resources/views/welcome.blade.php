@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <div class="mt-4">
                            <h2>{{ __('Projet CoachMyLife') }}</h2>
                            <p>{{ __("CoachMyLife est un système de coaching sportif qui fonctionne comme un jeu. Vous gagnez des points si vous accomplissez ce que le système vous demande avant minuit.") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
