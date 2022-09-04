<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\User;
use App\Models\Agences;
use Auth;

class ClientsController extends Controller
{

    public function viewForm()
    {
        $agences = Agences::all();
        return view ('clients.clientregister');
    }

    public function registerClient(Request $request)
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
                    'statut' => 'client'
                ]
            );
            if($user)
            {
                $user=Auth::User();
                $agence = Agences::Where('userId', $user->id)->first();
              
                $client = Clients::create(
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

                    dd($client);
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
        $clients = Clients::all();
       
        return view('clients.index', compact('clients'));
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
        $clients = Clients::findOrFail($id);
        return view('clients.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::findOrFail($id);

        return view('clients.edit', compact('client'));
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
    
        Clients::whereId($id)->update($validatedData);
    
        return redirect('/clients')->with('success', 'client mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        $client->delete();
    
        return redirect('/clients')->with('success', 'client supprimer avec succèss');
    }
}
