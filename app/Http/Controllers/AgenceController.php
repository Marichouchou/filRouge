<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agences;

class AgenceController extends Controller
{

    //methode crée pour afficher la page d'inscription d'un admin

    public function viewForm()
    {
        return view ('agences.agencregister');
    }

    public function registerAgenc(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [
                'nom_complet' => ['required', 'string', 'max:100'],
                'nom_agence' => ['required', 'string', 'max:150'],
                'adresse_agence' => ['required', 'string', 'max:150'],
                'telephone_agence' => ['required', 'string', 'max:150'],
                'registre_agence' => ['required', 'string', 'max:150'],
                'description_agence' => ['required', 'string', 'max:150'],
                'logo_agence' => 'required|mimes:jpeg,png,jpg,gif,JPG |max:1000',
                'site_web' => ['required', 'string', 'max:150'],
                'email' => ['required', 'string', 'max:100'],
                'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
                
            ]
        );
        //definir les actions a faire si la verification est bonne 
        if($verification)
        {
            $user = User::create(
                [
                    'name' => $request['nom_complet'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'agence'
                ]
            );
            if($user)
            {
                $fileName = time().'.'.$request->logo_agence->extension();  
                $request->logo_agence->move(public_path('img/logoAgences'), $fileName);
                $agence = Agences::create(
                    [
                        'nom_complet' => $request['nom_complet'], 
                        'nom_agence' => $request['nom_agence'], 
                        'adresse_agence' => $request['adresse_agence'], 
                        'telephone_agence' => $request['telephone_agence'], 
                        'registre_agence' => $request['registre_agence'], 
                        'description_agence' => $request['description_agence'], 
                        'logo_agence' => $request['logo_agence'], 
                        'site_web' => $request['site_web'], 
                        'email' => $request['email'],  
                        'password' => bcrypt($request['password']),
                        'userId' =>$user->id, 
                        
                    ]
                    );
                    return redirect('/login');
            }
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = Agences::all();
    
        return view('agences.index', compact('agences'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agences = Agences::findOrFail($id);
        return view('agences.show', compact('agences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agence = Agences::findOrFail($id);

        return view('agences.edit', compact('agence'));
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
        $validatedData = $request->validate([
            'nom_complet' => ['required', 'string', 'max:100'],
            'nom_agence' => ['required', 'string', 'max:150'],
            'adresse_agence' => ['required', 'string', 'max:150'],
            'telephone_agence' => ['required', 'string', 'max:150'],
            'registre_agence' => ['required', 'string', 'max:150'],
            'description_agence' => ['required', 'string', 'max:150'],
            'logo_agence' => ['required', 'string', 'max:150'],
            'site_web' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'max:100']
            
        ]);
    
        Agences::whereId($id)->update($validatedData);
    
        return redirect('/agences')->with('success', 'Agences mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agence = Agences::findOrFail($id);
        $agence->delete();
    
        return redirect('/agences')->with('success', 'Agence supprimer avec succèss');
    }
}
