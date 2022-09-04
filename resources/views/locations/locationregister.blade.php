@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajout de Locations') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('locations.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="date_location" class="col-md-4 col-form-label text-md-end">{{ __('date_location') }}</label>

                            <div class="col-md-6">
                                <input id="date_location" type="date" class="form-control @error('date_location') is-invalid @enderror" name="date_location" value="{{ old('date_location') }}" required autocomplete="date_location" autofocus>

                                @error('date_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        
                     


                        <div class="row mb-3">
                             <label for="bienId" class="col-md-4 col-form-label text-md-end">{{ __('biens') }}</label>
                             <div class="col-md-6">
                                <select class="form-select" style="color: #41A7A5" aria-label="Default select example" name="bienId">
                                @foreach ($biens as $bien)
                                <option value="{{$bien->id}}">{{$bien->nom_biens}}</option>
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
