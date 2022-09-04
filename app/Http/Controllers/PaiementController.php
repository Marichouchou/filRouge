<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\Paiements;
use Auth;

class PaiementController extends Controller
{
    public function viewForm()
    {
        $location = Locations::findOrFail($id);

       
        return view ('paiements.paiementregister', compact('location'));
    }

    public function registerPaiement(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [
                'motif_paiement' => ['required', 'string', 'max:100'],
                'date_paiement' => ['required'],
                'heure_paiement' => 'required', 
                'montant_restant' => ['required', 'string', 'max:100'],
                'motif_paiement' => ['required', 'string', 'max:100'], 
                
               
            ]
        );
        if($verification)
        {
            // $user=Auth::user();
            //  $bien = Biens::Where('typeId', $user->id)->first();
            
            $locations = Locations::create(
                [
                    'motif_paiement' => $request['motif_paiement'],
                    'date_paiement' => $request['date_paiement'],
                    'heure_paiement' => $request['heure_paiement'],
                    'montant_paye' => $request['montant_paye'],
                    'montant_restant' => $request['montant_restant'],
                    'locationId' => $request['locationId'],
                ]
                );
        };
        return redirect('paiement-register');
        
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiements = Paiements::all();
       
        return view('paiements.index', compact('paiements'));
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
        $paiements = Paiements::findOrFail($id);
        return view('paiements.show', compact('paiements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paiement = Paiements::findOrFail($id);

        return view('paiement.edit', compact('paiement'));
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
            'motif_paiement' => ['required', 'string', 'max:100'],
            'date_paiement' => ['required'],
            'heure_paiement' => ['required'],
            'montant_paye' => ['required', 'string', 'max:100'],
            'montant_restant' => ['required', 'string', 'max:100'],
        ]);
    
        Paiements::whereId($id)->update($validatedData);
    
        return redirect('/paiements')->with('success', 'Paiement mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paiement = Paiements::findOrFail($id);
        $paiement->delete();
    
        return redirect('/paiements')->with('success', 'Paiement supprimer avec succèss');
    }
}
