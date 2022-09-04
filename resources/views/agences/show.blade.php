@extends('layout')

@section('content')

<div class="container py-3">
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Id: {{$agences->id}}</h4>
                    </div>
                    <div class="card-body" style="list-style: none;">
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>nom_complet: {{$agences->nom_complet}}</li>
                        <li>nom_agence: {{$agences->nom_agence}}</li>
                        <li>adresse_agence: {{$agences->adresse_agence}}</li>
                        <li>telephone_agence: {{$agences->telephone_agence}}</li>
                        <li>registre_agence: {{$agences->registre_agence}}</li>
                        <li>description_agence: {{$agences->description_agence}}</li>
                        <li>logo_agence: {{$agences->logo_agence}}</li>
                        <li>site_web: {{$agences->site_web}}</li>
                        <li>email: {{$agences->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection