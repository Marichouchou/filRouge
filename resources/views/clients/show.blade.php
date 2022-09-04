@extends('layout')

@section('content')

<div class="container py-3">
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Id: {{$clients->id}}</h4>
                    </div>
                    <div class="card-body" style="list-style: none;">
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>nom: {{$clients->nom}}</li>
                        <li>prenom: {{$clients->prenom}}</li>
                        <li>adresse: {{$clients->adresse}}</li>
                        
                        <li>profession: {{$clients->profession}}</li>
                        <li>telephone: {{$clients->telephone}}</li>
                        <li>email: {{$clients->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection