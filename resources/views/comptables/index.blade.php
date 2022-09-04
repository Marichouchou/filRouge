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
         
          <td>telephone</td>
          <td>email</td>
          
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($comptables as $comptable)
        <tr>
            <td>{{$comptable->id}}</td>
            <td>{{$comptable->nom}}</td>
            <td>{{$comptable->prenom}}</td>
            <td>{{$comptable->adresse}}</td>
            
            <td>{{$comptable->telephone}}</td>
            <td>{{$comptable->email}}</td>
            <td><a href="{{ route('comptables.edit', $comptable->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('comptables.show', $comptable->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('comptables.destroy', $comptable->id)}}" method="post">
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

