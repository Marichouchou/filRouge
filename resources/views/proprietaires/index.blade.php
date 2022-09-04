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
          <td>nom</td>
          <td>prenom</td>
          <td>adresse</td>
          <td>profession</td>
          <td>telephone</td>
          <td>email</td>
          
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($proprietaires as $proprietaire)
        <tr>
            <td>{{$proprietaire->id}}</td>
            <td>{{$proprietaire->nom}}</td>
            <td>{{$proprietaire->prenom}}</td>
            <td>{{$proprietaire->adresse}}</td>
            <td>{{$proprietaire->profession}}</td>
            <td>{{$proprietaire->telephone}}</td>
            <td>{{$proprietaire->email}}</td>
            <td><a href="{{ route('proprietaires.edit', $proprietaire->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('proprietaires.show', $proprietaire->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('proprietaires.destroy', $proprietaire->id)}}" method="post">
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

