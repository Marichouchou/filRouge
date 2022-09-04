@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier un paiement
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

      <form method="post" action="{{ route('paiements.update', $paiement->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="motif_paiement">motif_paiement :</label>
              <input type="text" class="form-control" name="motif_paiement" value="{{ $paiement->motif_paiement }}"/>
          </div>

          <div class="form-group">
              <label for="date_paiement">date_paiement :</label>
              <input type="date" class="form-control" name="date_paiement" value="{{ $paiement->date_paiement }}"/>
          </div>

          <div class="form-group">
              <label for="heure_paiement">adresse :</label>
              <input type="time" class="form-control" name="heure_paiement" value="{{ $paiement->heure_paiement }}"/>
          </div>

          
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection