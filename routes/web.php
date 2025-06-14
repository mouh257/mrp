<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Web\parametres\ArticleController;
use App\Http\Controllers\Web\parametres\CalibreController;
use App\Http\Controllers\Web\parametres\ColorationController;
use App\Http\Controllers\Web\parametres\CultureController;
use App\Http\Controllers\Web\parametres\FermeController;
use App\Http\Controllers\Web\parametres\FournisseurController;
use App\Http\Controllers\Web\parametres\GroupedarticleController;
use App\Http\Controllers\Web\parametres\ProducteurController;
use App\Http\Controllers\Web\parametres\ProduitfiniController;
use App\Http\Controllers\Web\parametres\SerreController;
use App\Http\Controllers\Web\parametres\VarieteController;

use App\Http\Controllers\Web\production\ColisageController;
use App\Http\Controllers\Web\production\CommandeController;
use App\Http\Controllers\Web\production\DepartController;
use App\Http\Controllers\Web\production\PaletteController;

use App\Http\Controllers\Web\reception\CaisserieController;
use App\Http\Controllers\Web\reception\EcartController;
use App\Http\Controllers\Web\reception\PrevisionController;
use App\Http\Controllers\Web\reception\ReceptionController;
use App\Http\Controllers\Web\reception\RetourController;

use App\Http\Controllers\Web\stock\ApprovisionnementController;
use App\Http\Controllers\Web\stock\FactureController;
use App\Http\Controllers\Web\stock\InventaireController;
use App\Http\Controllers\Web\stock\LivraisonController;
use App\Http\Controllers\Web\stock\SortieController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('home');});

Route::get('/welcome', function () { return view('welcome'); });

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('/producteur', ProducteurController::class);
Route::resource('/culture', CultureController::class);
Route::resource('/fournisseur', FournisseurController::class);
Route::resource('/groupedarticle', GroupedarticleController::class);
Route::resource('/ferme', FermeController::class);
Route::resource('/variete', VarieteController::class);
Route::resource('/coloration', ColorationController::class);
Route::resource('/calibre', CalibreController::class);
Route::resource('/article', ArticleController::class);
Route::resource('/serre', SerreController::class);
Route::resource('/produitfini', ProduitfiniController::class);

Route::resource('/reception', ReceptionController::class);
Route::resource('/retour', RetourController::class);
Route::resource('/ecart', EcartController::class);
Route::resource('/prevision', PrevisionController::class);
Route::resource('/caisserie', CaisserieController::class);

Route::resource('/commande', CommandeController::class);
Route::resource('/depart', DepartController::class);
Route::resource('/palette', PaletteController::class);
Route::resource('/colisage', ColisageController::class);

Route::get('/pre_add/{id}', [ColisageController::class, 'pre_add'])->name('pre_add');
//Route::get('/add', [ColisageController::class, 'add'])->name('add');


Route::resource('/livraison', LivraisonController::class);
Route::resource('/sortie', SortieController::class);
Route::resource('/inventaire', InventaireController::class);
Route::resource('/approvisionnement', ApprovisionnementController::class);
Route::resource('/facture', FactureController::class);


