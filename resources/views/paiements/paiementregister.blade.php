@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Paiement') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paiement.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="motif_paiement" class="col-md-4 col-form-label text-md-end">{{ __('motif_paiement') }}</label>

                            <div class="col-md-6">
                                <input id="motif_paiement" type="text" class="form-control @error('motif_paiement') is-invalid @enderror" name="motif_paiement" value="{{ old('motif_paiement') }}" required autocomplete="motif_paiement" autofocus>

                                @error('motif_paiement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_paiement" class="col-md-4 col-form-label text-md-end">{{ __('date_paiement') }}</label>

                            <div class="col-md-6">
                                <input id="date_paiement" type="date" class="form-control @error('date_paiement') is-invalid @enderror" name="date_paiement" value="{{ old('date_paiement') }}" required autocomplete="date_paiement" autofocus>

                                @error('date_paiement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="heure_paiement" class="col-md-4 col-form-label text-md-end">{{ __('heure_paiement') }}</label>

                            <div class="col-md-6">
                                <input id="heure_paiement" type="time" class="form-control @error('heure_paiement') is-invalid @enderror" name="heure_paiement" value="{{ old('heure_paiement') }}" required autocomplete="heure_paiement" autofocus>

                                @error('heure_paiement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="montant_paye" class="col-md-4 col-form-label text-md-end">{{ __('montant_paye') }}</label>

                            <div class="col-md-6">
                                <input id="montant_paye" type="text" class="form-control @error('montant_paye') is-invalid @enderror" name="montant_paye" value="{{ old('montant_paye') }}" required autocomplete="montant_paye" autofocus>

                                @error('montant_paye')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="montant_restant" class="col-md-4 col-form-label text-md-end">{{ __('montant_restant') }}</label>

                            <div class="col-md-6">
                                <input id="montant_restant" type="text" class="form-control @error('montant_restant') is-invalid @enderror" name="montant_restant" value="{{ old('montant_restant') }}" required autocomplete="montant_restant" autofocus>

                                @error('montant_restant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
