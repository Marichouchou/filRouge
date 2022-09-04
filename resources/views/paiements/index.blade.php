@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>motif_paiement</td>
          <td>date_paiement</td>
          <td>heure_paiement</td>
          
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($paiements as $paiement)
        <tr>
            <td>{{$paiement->id}}</td>
            <td>{{$paiement->motif_paiement}}</td>
            <td>{{$paiement->date_paiement}}</td>
            <td>{{$paiement->heure_paiement}}</td>
           
            <td><a href="{{ route('paiements.edit', $paiement->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('paiements.show', $paiement->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('paiements.destroy', $paiement->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

