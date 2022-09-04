@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier l'agence
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('agences.update', $agence->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom_complet">nom_complet :</label>
              <input type="text" class="form-control" name="nom_complet" value="{{ $agence->nom_complet }}"/>
          </div>

          <div class="form-group">
              <label for="nom_agence">nom_agence :</label>
              <input type="text" class="form-control" name="nom_agence" value="{{ $agence->nom_agence }}"/>
          </div>

          <div class="form-group">
              <label for="adresse_agence">adresse_agence :</label>
              <input type="text" class="form-control" name="adresse_agence" value="{{ $agence->adresse_agence }}"/>
          </div>

          <div class="form-group">
              <label for="telephone_agence">telephone_agence :</label>
              <input type="text" class="form-control" name="telephone_agence" value="{{ $agence->telephone_agence }}"/>
          </div>

          <div class="form-group">
              <label for="registre_agence">registre_agence :</label>
              <input type="text" class="form-control" name="registre_agence" value="{{ $agence->registre_agence }}"/>
          </div>

          <div class="form-group">
              <label for="description_agence">description_agence :</label>
              <input type="text" class="form-control" name="description_agence" value="{{ $agence->description_agence }}"/>
          </div>

          <div class="form-group">
              <label for="logo_agence">logo_agence :</label>
              <input type="text" class="form-control" name="logo_agence" value="{{ $agence->logo_agence }}"/>
          </div>

          <div class="form-group">
              <label for="site_web">site_web :</label>
              <input type="text" class="form-control" name="site_web" value="{{ $agence->site_web }}"/>
          </div>

          <div class="form-group">
              <label for="email">email :</label>
              <input type="text" class="form-control" name="email" value="{{ $agence->email }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection