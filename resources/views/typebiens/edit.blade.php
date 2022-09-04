@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier un type de biens
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

      <form method="post" action="{{ route('typebiens.update', $type_bien->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="libelle">Libelle :</label>
              <input type="text" class="form-control" name="libelle" value="{{ $type_bien->libelle }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection