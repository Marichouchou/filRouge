<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeBiens;
use App\Models\Agences;
use App\Models\User;
use Auth;

class TypeBienController extends Controller
{


    
    public function viewForm()
    {
       
        return view ('typebiens.typebiensregister');
    }

    public function registerTypebiens(Request $request)
    {
        //il se chargera de lenvoie et de la recuperation dans la base de donnée
        // la variable $verification verifier si toutes les conditions sont remplies
        $verification = $request->validate(
            [

                'libelle' => ['required', 'string', 'max:100'],      
            ]
        );
        //definir les actions a faire si la verification est bonne 
        if($verification)
        {
                $user=Auth::User();
                $agence = Agences::Where('userId', $user->id)->first();
                $type_biens = TypeBiens::create(
                    [
                        'adminAgence' =>$agence->id, 
                        'libelle' => $request['libelle'],
                    ]
                    );

            
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_biens = TypeBiens::all();
       
        return view('typebiens.index', compact('type_biens'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_biens = TypeBiens::findOrFail($id);
        return view('typebiens.show', compact('type_biens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_bien = TypeBiens::findOrFail($id);

        return view('typebiens.edit', compact('type_bien'));
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
            'libelle' => ['required', 'string', 'max:100'],
        ]);
    
        TypeBiens::whereId($id)->update($validatedData);
    
        return redirect('/typebiens')->with('success', 'Type de biens mis à jour avec succèss');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_bien = TypeBiens::findOrFail($id);
        $type_bien->delete();
    
        return redirect('/typebiens')->with('success', 'type de biens supprimer avec succèss');
    }
}
