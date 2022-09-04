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
          <td>nom_biens</td>
          <td>adresse</td>
          <td>etat_biens</td>
          <td>images_biens</td>
          
          <td colspan="4">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($biens as $bien)
        <tr>
            <td>{{$bien->id}}</td>
            <td>{{$bien->nom_biens}}</td>
            <td>{{$bien->adresse}}</td>
            <td>{{$bien->etat_biens}}</td>
            <td>{{$bien->images_biens}}</td>
            <td><a href="{{ route('biens.edit', $bien->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('biens.show', $bien->id)}}" class="btn btn-primary">Details</a></td>
            <td><a href="{{ route('visiteagence.formview', $bien->id)}}" class="btn btn-primary">Rendez-Vous</a></td>
            <td>

                <form action="{{ route('biens.destroy', $bien->id)}}" method="post">
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

