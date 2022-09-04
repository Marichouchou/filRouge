<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agences;
use App\Models\Proprietaires;
use Auth;


class ProprietaireController extends Controller
{



    public function viewForm()
    {
        $agences = Agences::all();
        return view ('proprietaires.proprioregister', compact('agences'));
    }

    public function registerProprio(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [

                'nom' => ['required', 'string', 'max:100'],
                'prenom' => ['required', 'string', 'max:150'],
                'adresse' => ['required', 'string', 'max:150'],
                'profession' => ['required', 'string', 'max:150'],
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
                    'statut' => 'proprietaire'
                ]
            );
            if($user)
            {
                $users=Auth::user();
                
                $agence = Agences::Where('userId', $users->id)->first();
                $proprio = Proprietaires::create(
                    [
                        'adminAgence' =>$agence->id, 
                        'adminUser' =>$user->id, 
                        'nom' => $request['nom'], 
                        'prenom' => $request['prenom'], 
                        'adresse' => $request['adresse'], 
                        'profession' => $request['profession'], 
                        'telephone' => $request['telephone'], 
                        'email' => $request['email'],  
                        'password' => bcrypt($request['password']),
                        
                        
                    ]
                    );

                    dd($proprio);
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
        $proprietaires = Proprietaires::all();
       
        return view('proprietaires.index', compact('proprietaires'));
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
        $proprietaires = Proprietaires::findOrFail($id);
        return view('proprietaires.show', compact('proprietaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proprietaire = Proprietaires::findOrFail($id);

        return view('proprietaires.edit', compact('proprietaire'));
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
            'profession' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'max:100']
            
        ]);
    
        Proprietaires::whereId($id)->update($validatedData);
    
        return redirect('/proprietaires')->with('success', 'Proprio mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proprietaire = Proprietaires::findOrFail($id);
        $proprietaire->delete();
    
        return redirect('/proprietaires')->with('success', 'Proprio supprimer avec succèss');
    }
}
