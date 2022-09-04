<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agences;
use App\Models\Comptables;
use Auth;

class ComptableController extends Controller
{

    public function viewForm()
    {
        $agences = Agences::all();
        return view ('comptables.comptableregister', compact('agences'));
    }

    public function registerComptable(Request $request)
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
                    'statut' => 'comptable'
                ]
            );
            if($user)
            {
                $users=Auth::user();
                
                $agence = Agences::Where('userId', $users->id)->first();
                $comptable = Comptables::create(
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

                    dd($comptable);
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
        $comptables = Comptables::all();
       
        return view('comptables.index', compact('comptables'));
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
        $comptables = Comptables::findOrFail($id);
        return view('comptables.show', compact('comptables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comptable = Comptables::findOrFail($id);

        return view('comptables.edit', compact('comptable'));
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
    
        Comptables::whereId($id)->update($validatedData);
    
        return redirect('/comptables')->with('success', 'Comptable mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comptable = Comptables::findOrFail($id);
        $comptable->delete();
    
        return redirect('/comptables')->with('success', 'Comptable supprimer avec succèss');
    }
}
