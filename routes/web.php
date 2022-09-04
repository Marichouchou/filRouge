<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// les routes pour les differentes pages d'enregistrement register et les pages de creation create 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/agence-register', [App\Http\Controllers\AgenceController::class, 'viewForm'])->name('agence.formview');
Route::post('/agence-create', [App\Http\Controllers\AgenceController::class, 'registerAgenc'])->name('agence.create');

Route::get('/proprietaire-register', [App\Http\Controllers\ProprietaireController::class, 'viewForm'])->name('proprietaireagence.formview');
Route::post('/proprietaire-create', [App\Http\Controllers\ProprietaireController::class, 'registerProprio'])->name('proprietaire.create');

Route::get('/client-register', [App\Http\Controllers\ClientsController::class, 'viewForm'])->name('clientagence.formview');
Route::post('/client-create', [App\Http\Controllers\ClientsController::class, 'registerClient'])->name('client.create');

Route::get('/type-register', [App\Http\Controllers\TypeBienController::class, 'viewForm'])->name('typeagence.formview');
Route::post('/type-create', [App\Http\Controllers\TypeBienController::class, 'registerTypebiens'])->name('typebiens.create');

Route::get('/biens-register', [App\Http\Controllers\BienController::class, 'viewForm'])->name('biensagence.formview');
Route::post('/biens-create', [App\Http\Controllers\BienController::class, 'registerBiens'])->name('biens.create');

Route::get('/rdv/{rv}/biens', [App\Http\Controllers\VisiteController::class, 'viewForm'])->name('visiteagence.formview');
Route::post('/visite-create', [App\Http\Controllers\VisiteController::class, 'registerVisites'])->name('visite.create');

Route::get('/secretaire-register', [App\Http\Controllers\SecretaireController::class, 'viewForm'])->name('secretaire.formview');
Route::post('/secretaire-create', [App\Http\Controllers\SecretaireController::class, 'registerSecretaire'])->name('secretaire.create');

Route::get('/comptable-register', [App\Http\Controllers\ComptableController::class, 'viewForm'])->name('comptable.formview');
Route::post('/comptable-create', [App\Http\Controllers\ComptableController::class, 'registerComptable'])->name('comptable.create');

Route::get('/location-register', [App\Http\Controllers\LocationController::class, 'viewForm'])->name('location.formview');
Route::post('/location-create', [App\Http\Controllers\LocationController::class, 'registerLocation'])->name('locations.create');

Route::get('/paiement-register', [App\Http\Controllers\PaiementController::class, 'viewForm'])->name('paiement.formview');
Route::post('/paiement-create', [App\Http\Controllers\PaiementController::class, 'registerPaiement'])->name('paiement.create');





// les routes pour les differentes liste 

Route::resource('agences', 'AgenceController');
Route::resource('proprietaires', 'ProprietaireController');
Route::resource('clients', 'ClientsController');
Route::resource('biens', 'BienController');
Route::resource('typebiens', 'TypeBienController');
Route::resource('secretaires', 'SecretaireController');
Route::resource('comptables', 'ComptableController');
// Route::resource('locations', 'LocationController');
// Route::resource('paiements', 'PaiementController');