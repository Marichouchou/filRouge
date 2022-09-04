<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biens;
use App\Models\Proprietaires;
use App\Models\TypeBiens;
use App\Models\Agences;
use Auth;

class BienController extends Controller
{



    public function viewForm()
    {
        $proprietaire = Proprietaires::all();
        $type_biens = TypeBiens::all();
        return view ('biens.biensregister', compact('proprietaire', 'type_biens'));
    }

    public function registerBiens(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [
                'nom_biens' => ['required', 'string', 'max:100'],
                'adresse' => ['required', 'string', 'max:150'],
                'etat_biens' => ['required', 'string', 'max:150'],  
                'images_biens' => 'required|mimes:jpeg,png,jpg,gif,JPG |max:1000',
            ]
        );
        if($verification)
        {
            $user=Auth::user();
             $proprietaire = Proprietaires::Where('adminUser', $user->id)->first();
            //  dd($proprietaire);
             $agence = Proprietaires::Where('adminAgence', $proprietaire->id)->first();
            //  dd($agence);
             $type_biens = TypeBiens::Where('adminAgence', $agence->id)->first();
             $fileName = time().'.'.$request->images_biens->extension();  
                $request->images_biens->move(public_path('img/biens'), $fileName);
            $bien = Biens::create(
                [
                    'nom_biens' => $request['nom_biens'],
                    'adresse' => $request['adresse'],
                    'etat_biens' => $request['etat_biens'],
                    'images_biens' => $request['images_biens'],
                    'proprioId' => $proprietaire->id,
                    'typeId' => $type_biens->id
                ]
                );
        };
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biens = Biens::all();
       
        return view('biens.index', compact('biens'));
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
        $biens = Biens::findOrFail($id);
        return view('biens.show', compact('biens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bien = Biens::findOrFail($id);

        return view('biens.edit', compact('bien'));
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
            'nom_biens' => ['required', 'string', 'max:100'],
            'adresse' => ['required', 'string', 'max:150'],
            'etat_biens' => ['required', 'string', 'max:150'],
            'images_biens' => ['required', 'string', 'max:150'],
        ]);
    
        Biens::whereId($id)->update($validatedData);
    
        return redirect('/biens')->with('success', 'biens mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bien = Biens::findOrFail($id);
        $bien->delete();
    
        return redirect('/biens')->with('success', 'Biens supprimer avec succèss');
    }
}
