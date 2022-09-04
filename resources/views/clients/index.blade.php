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
        @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->nom}}</td>
            <td>{{$client->prenom}}</td>
            <td>{{$client->adresse}}</td>
            <td>{{$client->profession}}</td>
            <td>{{$client->telephone}}</td>
            <td>{{$client->email}}</td>
            <td><a href="{{ route('clients.edit', $client->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('clients.show', $client->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('clients.destroy', $client->id)}}" method="post">
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

