@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajout de visite') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visite.create', $bien->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_visiteur" class="col-md-4 col-form-label text-md-end">{{ __('nom_visiteur') }}</label>

                            <div class="col-md-6">
                                <input id="nom_visiteur" type="text" class="form-control @error('nom_visiteur') is-invalid @enderror" name="nom_visiteur" value="{{ old('nom_visiteur') }}" required autocomplete="nom_visiteur" autofocus>

                                @error('nom_visiteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom_visiteur" class="col-md-4 col-form-label text-md-end">{{ __('prenom_visiteur') }}</label>

                            <div class="col-md-6">
                                <input id="prenom_visiteur" type="text" class="form-control @error('prenom_visiteur') is-invalid @enderror" name="prenom_visiteur" value="{{ old('prenom_visiteur') }}" required autocomplete="prenom_visiteur" autofocus>

                                @error('prenom_visiteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="date_visite" class="col-md-4 col-form-label text-md-end">{{ __('date_visite') }}</label>

                            <div class="col-md-6">
                                <input id="date_visite" type="date" class="form-control @error('date_visite') is-invalid @enderror" name="date_visite" value="{{ old('date_visite') }}" required autocomplete="date_visite" autofocus>

                                @error('date_visite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="heure_visite" class="col-md-4 col-form-label text-md-end">{{ __('heure_visite') }}</label>

                            <div class="col-md-6">
                                <input id="heure_visite" type="time" class="form-control @error('heure_visite') is-invalid @enderror" name="heure_visite" value="{{ old('heure_visite') }}" required autocomplete="heure_visite" autofocus>

                                @error('heure_visite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="adresse_visite" class="col-md-4 col-form-label text-md-end">{{ __('adresse_visite') }}</label>

                            <div class="col-md-6">
                                <input id="adresse_visite" type="text" class="form-control @error('adresse_visite') is-invalid @enderror" name="adresse_visite" value="{{ old('adresse_visite') }}" required autocomplete="adresse_visite" autofocus>

                                @error('adresse_visite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        

                        <div class="row mb-3" hidden>
                             <label for="bienId" class="col-md-4 col-form-label text-md-end">{{ __('Biens') }}</label>
                             <div class="col-md-6">
                                <input id="bienId" type="number" class="form-control @error('bienId') is-invalid @enderror" name="bienId" value="{{$bien->id}}" required autocomplete="bienId" autofocus>

                            </div>   
                        </div>>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
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
