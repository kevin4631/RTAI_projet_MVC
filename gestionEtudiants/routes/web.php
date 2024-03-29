<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\HomeController;
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('insert', 'insert')->name('insert');
});

use App\Http\Controllers\ProgrammesController;
Route::controller(ProgrammesController::class)->group(function (){
    Route::get('programme', 'all')->name('programmes');
    Route::get('programmeTri', 'Tri')->name('programmesTri');
    Route::get('recupererDiplome', 'RecuperationDiplomes')->name('programmes.newProgramme');
    Route::get('creerProgramme', 'CreerProgramme')->name('creerProgramme');
    Route::get('supprimerProgramme={codeProgramme}', 'SupprimerProgramme')->name('suppProgramme');
    Route::get('modifierProgramme={codeProgramme}', 'ModifierProgramme')->name('modifProgramme');
    Route::get('modificationProgramme', 'ModificationProgramme')->name('modificationProgramme');
});

use App\Http\Controllers\UnivsController;
Route::controller(UnivsController::class)->group(function (){
    Route::get('univs', 'all')->name('univs.all');
    Route::get('univs/tab', 'tab')->name('univs.tab');

});

use App\Http\Controllers\DiplomesController;
Route::controller(DiplomesController::class)->group(function (){
    Route::get('diplomes', 'all')->name('diplomes.all');
    Route::get('diplomes/destroy={codeDiplome}', 'destroy')->name('diplomes.destroy');
    Route::get('diplomes/new', 'new')->name('diplomes.new');
    Route::get('diplomes/create', 'create')->name('diplomes.create');
    Route::get('diplomes/modif={codeDiplome}', 'modif')->name('diplomes.modif');
    Route::get('diplomes/valideModif', 'valideModif')->name('diplomes.valideModif');
    Route::get('diplomes/tab', 'tab')->name('diplomes.tab');

});

use App\Http\Controllers\CoursController;
Route::controller(CoursController::class)->group(function (){
    Route::get('cours', 'all')->name('cours.all');
    Route::post('cours', 'filtre')->name('cours.filtre');
    Route::get('new', [CoursController::class, 'new'])->name('new');
    Route::get('create', [CoursController::class, 'create'])->name('create');
    Route::get('modif={codeCours}', [CoursController::class, 'modif'])->name('modif');
    Route::get('validation', [CoursController::class, 'validation'])->name('validation');
    Route::get('suppCours={codeCours}', 'suppCours')->name('delete');
});

use App\Http\Controllers\FinancementsController;
Route::controller(FinancementsController::class)->group(function(){
    Route::get('financement', 'all')->name('financements');
    Route::get('MajFinancement={etat}/{codeDF}', 'maj')->name('MajFinancement');
    Route::get('financementTri', 'tri')->name('financementTri');
    Route::get('MajMontantFinancement={codeDF}', 'majMontant')->name('MajMontantFinancement');
});

use App\Http\Controllers\MobilitesController;
Route::controller(MobilitesController::class)->group(function(){
    Route::get('mobilite', 'all')->name('mobilites');
    Route::get('MajMobilite={etat}/{codeDM}', 'maj')->name('MajMobilite');
    Route::get('mobiliteTri', 'tri')->name('mobiliteTri');
});

use App\Http\Controllers\ContratsController;
Route::controller(ContratsController::class)->group(function(){
    Route::get('contrat', 'all')->name('contrats');
    Route::get('MajContrat={etat}/{codeC}', 'maj')->name('MajContrat');
    Route::get('contratTri', 'tri')->name('contratTri');
});




