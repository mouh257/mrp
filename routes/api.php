<?php

use App\Http\Controllers\RestApi\parametres\ArticleController;
use App\Http\Controllers\RestApi\parametres\CalibreController;
use App\Http\Controllers\RestApi\parametres\ColorationController;
use App\Http\Controllers\RestApi\parametres\CultureController;
use App\Http\Controllers\RestApi\parametres\FermeController;
use App\Http\Controllers\RestApi\parametres\FournisseurController;
use App\Http\Controllers\RestApi\parametres\GroupedarticleController;
use App\Http\Controllers\RestApi\parametres\ProducteurController;
use App\Http\Controllers\RestApi\parametres\ProduitfiniController;
use App\Http\Controllers\RestApi\parametres\SerreController;
use App\Http\Controllers\RestApi\parametres\VarieteController;

use App\Http\Controllers\RestApi\production\ColisageController;
use App\Http\Controllers\RestApi\production\CommandeController;
use App\Http\Controllers\RestApi\production\DepartController;
use App\Http\Controllers\RestApi\production\PaletteController;

use App\Http\Controllers\RestApi\reception\EcartController;
use App\Http\Controllers\RestApi\reception\ReceptionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'producteur'=> ProducteurController::class,
    'culture'=> CultureController::class,
    '/ferme'=> FermeController::class,
    '/variete'=> VarieteController::class,
    '/serre'=> SerreController::class,
    '/coloration'=> ColorationController::class,
    '/calibre'=> CalibreController::class,
    '/fournisseur'=> FournisseurController::class,
    '/article'=> ArticleController::class,
    '/groupedarticle'=> GroupedarticleController::class,
    '/produitfini'=> ProduitfiniController::class,

    '/reception'=> ReceptionController::class,
    '/ecart'=> EcartController::class,

    '/commande'=> CommandeController::class,
    '/colisage'=> ColisageController::class,
    '/palette'=> PaletteController::class,
    '/depart'=> DepartController::class,


    ]);

// parametres
Route::get('fermesOf',[FermeController::class,'fermesOf']);
Route::get('/varietesOf', [VarieteController::class,'varietesOf']);
Route::get('/serresOf', [SerreController::class,'serresOf']);
Route::get('/colorationsOf', [ColorationController::class,'colorationsOf']);
Route::get('/calibresOf', [CalibreController::class,'calibresOf']);
Route::get('/articlesOf', [ArticleController::class,'articlesOf']);
Route::get('/produitfiniOf', [ProduitfiniController::class,'produitfiniOf']);
//reception
Route::get('culturesOf',[SerreController::class,'culturesOf']);
Route::get('varietesIn',[SerreController::class,'varietesIn']);
Route::get('versementOf',[ReceptionController::class,'versementOf']);
Route::get('ecartsOf',[EcartController::class,'ecartsOf']);
//production
Route::get('commandesOf',[CommandeController::class,'commandesOf']);
Route::get('cultureOfVersement',[ReceptionController::class,'cultureOfVersement']);
Route::get('varietesOfVersement',[ReceptionController::class,'varietesOfVersement']);
Route::get('restOfVersement',[ReceptionController::class,'restOfVersement']);


