@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Declaration_bien') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('typebiens.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="libelle" class="col-md-4 col-form-label text-md-end">{{ __('Libelle') }}</label>

                            <div class="col-md-6">
                                <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus>

                                @error('libelle')
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
