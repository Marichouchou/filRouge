<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biens;
use App\Models\TypeBiens;

use App\Models\Visites;
use Auth;

class VisiteController extends Controller
{

    public function viewForm($id)
    {
        $bien = Biens::findOrFail($id);

       
        return view ('visites.visitesregister', compact('bien'));
    }

    public function registerVisites(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [
                'nom_visiteur' => ['required', 'string', 'max:100'],
                'prenom_visiteur' => ['required', 'string', 'max:150'],
                'date_visite' => 'required',  
                'heure_visite' => 'required',
                'adresse_visite' => ['required', 'string', 'max:150'],
               
            ]
        );
        if($verification)
        {
            // $user=Auth::user();
            //  $bien = Biens::Where('typeId', $user->id)->first();
            
            $visites = Visites::create(
                [
                    'nom_visiteur' => $request['nom_visiteur'],
                    'prenom_visiteur' => $request['prenom_visiteur'],
                    'date_visite' => $request['date_visite'],
                    'heure_visite' => $request['heure_visite'],
                    'adresse_visite' => $request['adresse_visite'],
                    'bienId' => $request['bienId'],
                ]
                );
        };
        return redirect('visite-register');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
