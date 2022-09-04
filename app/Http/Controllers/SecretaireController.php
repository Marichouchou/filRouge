<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agences;
use App\Models\Secretaires;
use Auth;

class SecretaireController extends Controller
{

    public function viewForm()
    {
        $agences = Agences::all();
        return view ('secretaires.secretaireregister', compact('agences'));
    }

    public function registerSecretaire(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [

                'nom' => ['required', 'string', 'max:100'],
                'prenom' => ['required', 'string', 'max:150'],
                'adresse' => ['required', 'string', 'max:150'],
                
                'telephone' => ['required', 'string', 'max:150'],
                'email' => ['required', 'string', 'max:100'],
                'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
                
            ]
        );
        

        
        //definir les actions a faire si la verification est bonne 
        if($verification)
        {
            $user = User::create(
                [
                    'name' => $request['nom'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'secretaire'
                ]
            );
            if($user)
            {
                $users=Auth::user();
                
                $agence = Agences::Where('userId', $users->id)->first();
                $secretaire = Secretaires::create(
                    [
                        'adminAgence' =>$agence->id, 
                        'adminUser' =>$user->id, 
                        'nom' => $request['nom'], 
                        'prenom' => $request['prenom'], 
                        'adresse' => $request['adresse'], 
                        
                        'telephone' => $request['telephone'], 
                        'email' => $request['email'],  
                        'password' => bcrypt($request['password']),
                        
                        
                    ]
                    );

                    dd($secretaire);
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
        $secretaires = Secretaires::all();
       
        return view('secretaires.index', compact('secretaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secretaires = Secretaires::findOrFail($id);
        return view('secretaires.show', compact('secretaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretaire = Secretaires::findOrFail($id);

        return view('secretaires.edit', compact('secretaire'));
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
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:150'],
            'adresse' => ['required', 'string', 'max:150'],
            'telephone' => ['required', 'string', 'max:150'],
           
            'email' => ['required', 'string', 'max:100']
            
        ]);
    
        Secretaires::whereId($id)->update($validatedData);
    
        return redirect('/secretaires')->with('success', 'Secretaire mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secretaire = Secretaires::findOrFail($id);
        $secretaire->delete();
    
        return redirect('/secretaires')->with('success', 'Secretaire supprimer avec succèss');
    }
}
