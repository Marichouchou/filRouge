@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajout de Biens') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('biens.create') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_biens" class="col-md-4 col-form-label text-md-end">{{ __('Nom_Biens') }}</label>

                            <div class="col-md-6">
                                <input id="nom_biens" type="text" class="form-control @error('nom_biens') is-invalid @enderror" name="nom_biens" value="{{ old('nom_biens') }}" required autocomplete="nom_biens" autofocus>

                                @error('nom_biens')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="etat_biens" class="col-md-4 col-form-label text-md-end">{{ __('etat_biens') }}</label>

                            <div class="col-md-6">
                                <input id="etat_biens" type="text" class="form-control @error('etat_biens') is-invalid @enderror" name="etat_biens" value="{{ old('etat_biens') }}" required autocomplete="etat_biens" autofocus>

                                @error('etat_biens')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="images_biens" class="col-md-4 col-form-label text-md-end">{{ __('images_biens') }}</label>

                            <div class="col-md-6">
                                <input id="images_biens" type="file" class="form-control @error('images_biens') is-invalid @enderror" name="images_biens" value="{{ old('images_biens') }}" required autocomplete="images_biens" autofocus>

                                @error('images_biens')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                             <label for="typeId" class="col-md-4 col-form-label text-md-end">{{ __('Type_biens') }}</label>
                             <div class="col-md-6">
                                <select class="form-select" style="color: #41A7A5" aria-label="Default select example" name="typeId">
                                @foreach ($type_biens as $type_bien)
                                <option value="{{$type_bien->id}}">{{$type_bien->libelle}}</option>
                                @endforeach
                                </select>
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
