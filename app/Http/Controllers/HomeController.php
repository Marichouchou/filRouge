<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\ClientsController;


use App\Models\Agences;
use App\Models\Proprietaires;
use App\Models\Clients;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
    
            
            if($user->statut == 'agence')
            {
                $agence = Agences::where ('userId', $user->id)->first();
                return view ('agences.dashagence',compact('agence'));
            }
    
            elseif($user->statut == 'proprietaire')
            {
                $proprietaire = Proprietaires::where ('adminUser', $user->id)->first();
    
                return view ('proprietaires.dashproprietaire',compact('proprietaire'));
    
            }
    
            elseif($user->statut == 'client')
            {
                $client = Clients::where ('adminUser', $user->id)->first();
    
                return view ('clients.dashclient',compact('client'));
    
            }

            elseif($user->statut == 'secretaire')
            {
                $secretaire = Secretaires::where ('adminUser', $user->id)->first();
    
                return view ('secretaires.dashsecretaire',compact('secretaire'));
    
            }

            elseif($user->statut == 'comptable')
            {
                $comptable = Comptables::where ('adminUser', $user->id)->first();
    
                return view ('comptables.dashcomptable',compact('comptable'));
    
            }
    
            else
            {
              return view('home');  
            }
    
    }
    
}
