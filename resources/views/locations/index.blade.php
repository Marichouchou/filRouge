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
          <td>date_location</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($locations as $location)
        <tr>
            <td>{{$location->id}}</td>
            <td>{{$location->date_location}}</td>
           
            <td><a href="{{ route('locations.edit', $location->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('locations.show', $location->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('locations.destroy', $location->id)}}" method="post">
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

