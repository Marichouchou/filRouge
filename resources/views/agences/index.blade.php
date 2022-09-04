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
          <td>nom_complet</td>
          <td>nom_agence</td>
          <td>adresse_agence</td>
          <td>telephone_agence</td>
          <td>registre_agence</td>
          <td>description_agence</td>
          <td>logo_agence</td>
          <td>site_web</td>
          <td>email</td>
          
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($agences as $agence)
        <tr>
            <td>{{$agence->id}}</td>
            <td>{{$agence->nom_complet}}</td>
            <td>{{$agence->nom_agence}}</td>
            <td>{{$agence->adresse_agence}}</td>
            <td>{{$agence->telephone_agence}}</td>
            <td>{{$agence->registre_agence}}</td>
            <td>{{$agence->description_agence}}</td>
            <td>{{$agence->logo_agence}}</td>
            <td>{{$agence->site_web}}</td>
            <td>{{$agence->email}}</td>
            <td><a href="{{ route('agences.edit', $agence->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('agences.show', $agence->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('agences.destroy', $agence->id)}}" method="post">
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

