<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use App\Models\user;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class connexionController extends Controller
{
    function login(Request $request)
    {
        //recupérer le données soumises par l'user
        $email = $request->email;
        $password = $request->password;
        //$member = user::where('email', '=', $email)->where('password', '=', $password)->first();
        $member = user::where('email', '=', $email)->first();
        if ($member != null && $password==$member->password) { //membre existant dans la BD
            $listEntreprise = entreprise::all();
            return redirect('/home')->with(['listEntreprise' => $listEntreprise]);
        } else
            return view('connexion')->with('message', 'Courriel ou mot de passe est incorrect !! réessayez');

    }

    function envoie(Request $request)
    {
        //recupérer le données soumises par l'user
        $nom = $request->nom;
        $email = $request->email;
        $message = $request->message;

        $newMessage = contact::create(['Nom' => $nom, 'Email' => $email, 'Message' => $message]);
        if ($newMessage) {
            return view('comfirmEnvoie');
        } else {
            return view('contact');
        }

    }

    function registre(Request $request)
    {
        //recupérer le données soumises par l'user
        $email = $request->email;
        //$password = hash::make($request->password) ;
        $password = $request->password;
        $trouveUser = user::where('email', '=', $email)->first();

        if ($trouveUser != null) {
            $message = 'Un compte est déja crée avec cette adresse courriel :' . $email;
            //return view('inscription', compact('message'));
            return view('inscription')->with('message', $message);
        } else {
            $newUser = user::create(['email' => $email, 'password' => $password]);
            if ($newUser) {
                return view('comfirmIscription');
            } else {
                return view('inscription');
            }
        }



    }
}