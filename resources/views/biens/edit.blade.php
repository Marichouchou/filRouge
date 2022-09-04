@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier un biens
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

      <form method="post" action="{{ route('biens.update', $bien->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom_biens">nom_biens :</label>
              <input type="text" class="form-control" name="nom_biens" value="{{ $bien->nom_biens }}"/>
          </div>

          <div class="form-group">
              <label for="adresse">adresse :</label>
              <input type="text" class="form-control" name="adresse" value="{{ $bien->adresse }}"/>
          </div>

          <div class="form-group">
              <label for="etat_biens">etat_biens :</label>
              <input type="text" class="form-control" name="etat_biens" value="{{ $bien->etat_biens }}"/>
          </div>

          <div class="form-group">
              <label for="images_biens">images_biens :</label>
              <input type="text" class="form-control" name="images_biens" value="{{ $bien->images_biens }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection