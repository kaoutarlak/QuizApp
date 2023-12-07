<?php

use App\Http\Controllers\addresseTypeController;
use App\Http\Controllers\connexionController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\entrepriseController;
use App\Http\Controllers\EnvoiEmailController;
use App\Http\Controllers\addresseController; 
use App\Http\Controllers\telephoneController;
use App\Http\Controllers\telephoneTypeController;
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
    return view('connexion')->with('message', '');
})->name('principale');

Route::post('/connexion', [connexionController::class, 'login'])->name('connexion');

Route::get('/contact', function () {
    return view('contact');
})->name('affichageContact');

Route::post('/contact-message', [connexionController::class, 'envoie'])->name('contact-message');

Route::get('/inscription', function () {

    return view('inscription')->with('message', '');
})->name('inscription');

Route::post('/enregistrement', [connexionController::class, 'registre'])->name('enregistrement');


Route::post('/send', [EnvoiEmailController::class, 'sendEmail']);

Route::get('/recuperationPassword', function () {

    return view('recupPassword');
})->name('recuperationPassword');



//route entreprise

Route::get('/home', [entrepriseController::class, 'getAllEntreprise'])->name('home');

Route::get('/alterEntreprise', [entrepriseController::class, 'getEntreprise'])->name('alterEntreprise');

Route::post('/entrepriseModifier', [entrepriseController::class, 'alterEntreprise'])->name('entrepriseModifier');

Route::get('/AddEnreprise', function () {
    return view('ajouterEntreprise');
})->name('AddEnreprise');
Route::post('/AddEnreprise', [entrepriseController::class, 'AddEnreprise'])->name('AddEnreprise');

Route::get('/deleteEntreprise', [entrepriseController::class, 'deleteEntreprise'])->name('deleteEntreprise');

Route::get('/detailEntreprise', [entrepriseController::class, 'detailEntreprise'])->name('detailEntreprise');

//route employée

Route::get('/Employee/Liste', [employeeController::class, 'getAllEmployee'])->name('employee'); 

Route::get('/Employee/Ajouter', [employeeController::class, 'getEntreprise'])->name('AddEmployee');

Route::post('/Employee/Ajouter', [employeeController::class, 'AddEmployee'])->name('AddEmployee');

Route::get('/Employee/Modifier', [employeeController::class, 'getEmployee'])->name('alterEmployee'); 

Route::post('/Employee/Modifier', [employeeController::class, 'alterEmployee'])->name('alterEmployeeData'); 

Route::get('/Employee/Detail', [employeeController::class, 'detailEmployee'])->name('detailEmployee');

Route::get('/deleteEmployee', [employeeController::class, 'deleteEmployee'])->name('deleteEmployee');

//route addresse

Route::get('/Addresse/Liste', [addresseController::class, 'getAllAddresse'])->name('listAddresse'); 

Route::get('/Addresse/Ajouter', [addresseController::class, 'getEntrepriseAddresseType'])->name('AddAddresse');

Route::post('/Addresse/Ajouter', [addresseController::class, 'addAddresse'])->name('AddAddresse');

Route::get('/Addresse/Modifier', [addresseController::class, 'getAddresse'])->name('alterAddresse'); 

Route::post('/Addresse/Modifier', [addresseController::class, 'alterAddresse'])->name('alterAddresseData');

Route::get('/Addresse/Detail', [addresseController::class, 'detailAddresse'])->name('detailAddresse');

Route::get('/deleteAddresse', [addresseController::class, 'deleteAddresse'])->name('deleteAddresse');

//route addresse Type

Route::get('/AddresseType/Liste', [addresseTypeController::class, 'getAllAddresseType'])->name('listAddresseType'); 

Route::get('/AddresseType/Ajouter', function () {
    return view('/AddresseType/Ajouter');
})->name('AddAddresseType');

Route::post('/AddresseType/Ajouter', [addresseTypeController::class, 'addAddresseType'])->name('AddAddresseType');

Route::get('/AddresseType/Modifier', [addresseTypeController::class, 'getAddresseType'])->name('alterAddresseType'); 

Route::post('/AddresseType/Modifier', [addresseTypeController::class, 'alterAddresseType'])->name('alterAddresseData');

Route::get('/AddresseType/Detail', [addresseTypeController::class, 'detailAddresseType'])->name('detailAddresseType');

Route::get('/deleteAddresseType', [addresseTypeController::class, 'deleteAddresseType'])->name('deleteAddresseType');

//route telephone 

Route::get('/Telephone/Liste', [telephoneController::class, 'getAllTelephone'])->name('listTelephone'); 

Route::get('/Telephone/Ajouter', [telephoneController::class, 'getEmpTeleType'])->name('AddTelephone');

Route::post('/Telephone/Ajouter', [telephoneController::class, 'addTelephone'])->name('AddTelephone');

Route::get('/Telephone/Modifier', [telephoneController::class, 'getTelephone'])->name('alterTelephone'); 

Route::post('/Telephone/Modifier', [telephoneController::class, 'alterTelephone'])->name('alterTelephoneData');

Route::get('/Telephone/Detail', [telephoneController::class, 'detailTelephone'])->name('detailTelephone');

Route::get('/deleteTelephone', [telephoneController::class, 'deleteTelephone'])->name('deleteTelephone');

//route telephone Type

Route::get('/TelephoneType/Liste', [telephoneTypeController::class, 'getAllTelephoneType'])->name('listTelephoneType'); 

Route::get('/TelephoneType/Ajouter', function () {
    return view('/TelephoneType/Ajouter');
})->name('AddTelephoneType');

Route::post('/TelephoneType/Ajouter', [telephoneTypeController::class, 'addTelephoneType'])->name('AddTelephoneType');

Route::get('/TelephoneType/Modifier', [telephoneTypeController::class, 'getTelephoneType'])->name('alterTelephoneType'); 

Route::post('/TelephoneType/Modifier', [telephoneTypeController::class, 'alterTelephoneType'])->name('alterTelephoneData');

Route::get('/TelephoneType/Detail', [telephoneTypeController::class, 'detailTelephoneType'])->name('detailTelephoneType');

Route::get('/deleteTelephoneType', [telephoneTypeController::class, 'deleteTelephoneType'])->name('deleteTelephoneType');