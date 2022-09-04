@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscription_agence') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agence.create') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_complet" class="col-md-4 col-form-label text-md-end">{{ __('Nom_complet') }}</label>

                            <div class="col-md-6">
                                <input id="nom_complet" type="text" class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet" value="{{ old('nom_complet') }}" required autocomplete="nom_complet" autofocus>

                                @error('nom_complet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom_agence" class="col-md-4 col-form-label text-md-end">{{ __('Nom_agence') }}</label>

                            <div class="col-md-6">
                                <input id="nom_agence" type="text" class="form-control @error('nom_agence') is-invalid @enderror" name="nom_agence" value="{{ old('nom_agence') }}" required autocomplete="nom_agence" autofocus>

                                @error('nom_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="adresse_agence" class="col-md-4 col-form-label text-md-end">{{ __('Adresse_agence') }}</label>

                            <div class="col-md-6">
                                <input id="adresse_agence" type="text" class="form-control @error('adresse_agence') is-invalid @enderror" name="adresse_agence" value="{{ old('adresse_agence') }}" required autocomplete="adresse_agence" autofocus>

                                @error('adresse_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="telephone_agence" class="col-md-4 col-form-label text-md-end">{{ __('Tel_agence') }}</label>

                            <div class="col-md-6">
                                <input id="telephone_agence" type="text" class="form-control @error('telephone_agence') is-invalid @enderror" name="telephone_agence" value="{{ old('telephone_agence') }}" required autocomplete="telephone_agence" autofocus>

                                @error('telephone_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="registre_agence" class="col-md-4 col-form-label text-md-end">{{ __('Registre_agence') }}</label>

                            <div class="col-md-6">
                                <input id="registre_agence" type="text" class="form-control @error('registre_agence') is-invalid @enderror" name="registre_agence" value="{{ old('registre_agence') }}" required autocomplete="registre_agence" autofocus>

                                @error('registre_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="description_agence" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description_agence" type="text" class="form-control @error('description_agence') is-invalid @enderror" name="description_agence" value="{{ old('description_agence') }}" required autocomplete="registre_agence" autofocus>

                                @error('description_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="logo_agence" class="col-md-4 col-form-label text-md-end">{{ __('Logo_agence') }}</label>

                            <div class="col-md-6">
                                <input id="logo_agence" type="file" class="form-control @error('logo_agence') is-invalid @enderror" name="logo_agence" value="{{ old('logo_agence') }}" required autocomplete="logo_agence" autofocus>

                                @error('logo_agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="site_web" class="col-md-4 col-form-label text-md-end">{{ __('Site_web') }}</label>

                            <div class="col-md-6">
                                <input id="site_web" type="text" class="form-control @error('site_web') is-invalid @enderror" name="site_web" value="{{ old('site_web') }}" required autocomplete="site_web" autofocus>

                                @error('site_web')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

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
