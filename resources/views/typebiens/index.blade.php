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
          <td>libelle</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($type_biens as $type_bien)
        <tr>
            <td>{{$type_bien->id}}</td>
            <td>{{$type_bien->libelle}}</td>
           
            <td><a href="{{ route('typebiens.edit', $type_bien->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('typebiens.show', $type_bien->id)}}" class="btn btn-primary">Details</a></td>
            <td>

                <form action="{{ route('typebiens.destroy', $type_bien->id)}}" method="post">
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

