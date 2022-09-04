@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier un client
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

      <form method="post" action="{{ route('clients.update', $client->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">nom :</label>
              <input type="text" class="form-control" name="nom" value="{{ $client->nom }}"/>
          </div>

          <div class="form-group">
              <label for="prenom">prenom :</label>
              <input type="text" class="form-control" name="prenom" value="{{ $client->prenom }}"/>
          </div>

          <div class="form-group">
              <label for="adresse">adresse :</label>
              <input type="text" class="form-control" name="adresse" value="{{ $client->adresse }}"/>
          </div>

          <div class="form-group">
              <label for="profession">profession :</label>
              <input type="text" class="form-control" name="profession" value="{{ $client->profession }}"/>
          </div>

          <div class="form-group">
              <label for="telephone">telephone :</label>
              <input type="text" class="form-control" name="telephone" value="{{ $client->telephone }}"/>
          </div>

          <div class="form-group">
              <label for="email">email :</label>
              <input type="text" class="form-control" name="email" value="{{ $client->email }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection