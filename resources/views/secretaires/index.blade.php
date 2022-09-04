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
        @foreach($secretaires as $secretaire)
        <tr>
            <td>{{$secretaire->id}}</td>
            <td>{{$secretaire->nom}}</td>
            <td>{{$secretaire->prenom}}</td>
            <td>{{$secretaire->adresse}}</td>
            
            <td>{{$secretaire->telephone}}</td>
            <td>{{$secretaire->email}}</td>
            <td><a href="{{ route('secretaires.edit', $secretaire->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('secretaires.show', $secretaire->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('secretaires.destroy', $secretaire->id)}}" method="post">
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

