@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier un comptable
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

      <form method="post" action="{{ route('comptables.update', $comptable->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">nom :</label>
              <input type="text" class="form-control" name="nom" value="{{ $comptable->nom }}"/>
          </div>

          <div class="form-group">
              <label for="prenom">prenom :</label>
              <input type="text" class="form-control" name="prenom" value="{{ $comptable->prenom }}"/>
          </div>

          <div class="form-group">
              <label for="adresse">adresse :</label>
              <input type="text" class="form-control" name="adresse" value="{{ $comptable->adresse }}"/>
          </div>

          

          <div class="form-group">
              <label for="telephone">telephone :</label>
              <input type="text" class="form-control" name="telephone" value="{{ $comptable->telephone }}"/>
          </div>

          <div class="form-group">
              <label for="email">email :</label>
              <input type="text" class="form-control" name="email" value="{{ $comptable->email }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection