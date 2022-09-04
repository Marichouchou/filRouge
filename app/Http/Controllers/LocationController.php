<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biens;
use App\Models\Clients;
use App\Models\Agences;
use App\Models\Locations;
use App\Models\Proprietaires;

use Auth;

class LocationController extends Controller
{
    public function viewForm()
    {
        $agences = Agences::all();
        $clients = Clients::all();
        $biens = Biens::all();
      
        return view ('locations.locationregister', compact('agences', 'biens', 'clients'));
    }

    public function registerLocation(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [
                'date_location' => ['required', 'string', 'max:100'],
               
            ]
        );
        if($verification)
        {
             $user=Auth::user();

             $agence = Agences::Where('userId', $user->id)->first();

             $proprietaire = Agences::Where('userId', $agence->id)->first();

             $clients = Clients::Where('adminAgence', $agence->id)->first();

             $biens = Biens::Where('proprioId', $proprietaire->id)->first();

            $locations = Locations::create(
                [
                    'date_location' => $request['date_location'],
                    'adminAgence' => $request['adminAgence'],
                    'clientId' => $request['clientId'],
                    'bienId' => $request['bienId'],
                ]
                );
        };
        return redirect('location-register');
        
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Locations::all();
       
        return view('locations.index', compact('locations'));
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
        
        $locations = Locations::findOrFail($id);
        return view('locations.show', compact('locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Locations::findOrFail($id);

        return view('locations.edit', compact('location'));
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
            'date_location' => ['required'],
           
            
        ]);
    
        Locations::whereId($id)->update($validatedData);
    
        return redirect('/locations')->with('success', 'Location mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Locations::findOrFail($id);
        $location ->delete();
    
        return redirect('/locations')->with('success', 'location  supprimer avec succèss');
    }
}
