@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                <form 
        id="formAccountSettings" 
        method="POST" 
        action="{{ route('profile.update',auth()->id()) }}" 
        enctype="multipart/form-data"
        class="needs-validation" 
        role="form"
        novalidate
    >
                        @csrf
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ auth()->user()->nom }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ auth()->user()->prenom  }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_naissance" class="col-md-4 col-form-label text-md-end">{{ __('date de naissance') }}</label>

                            <div class="col-md-6">
                                <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ auth()->user()->date_naissance  }}" required autocomplete="date_naissance" autofocus>

                                @error('date_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" id="sex" value="1{{auth()->user()->sex}}">
                    <label class="form-check-label" for="sex">
                        Homme
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" id="sex2" value="0">
                    <label class="form-check-label" for="sex2">
                        Femme
                    </label>
                </div>
            </div>

            <div class="row mb-3">
                            <label for="poids" class="col-md-4 col-form-label text-md-end">{{ __('poids') }}</label>

                            <div class="col-md-6">
                                <input id="poids" type="number" class="form-control @error('poids') is-invalid @enderror" name="poids" value="{{ auth()->user()->poids  }}" required autocomplete="poids" autofocus>

                                @error('poids')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="taille" class="col-md-4 col-form-label text-md-end">{{ __('taille') }}</label>

                            <div class="col-md-6">
                                <input id="taille" type="number" class="form-control @error('taille') is-invalid @enderror" name="taille" value="{{ auth()->user()->taille  }}" required autocomplete="taille" autofocus>

                                @error('taille')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ auth()->user()->telephone  }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ auth()->user()->adresse  }}" required autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                <label for="programme_id" class="form-label">Programme</label>
                <input class="form-control @error('programme_id') is-invalid @enderror" list="programme_list" id="programme_id" name="programme_name" placeholder="Rechercher un Programme">
                <datalist id="programme_list">
                    @foreach ($programme as $programmes )
                        <option value="{{$programmes->id}}">
                @endforeach
            </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 