<?php

namespace App\Http\Controllers;

use App\Mail\EnvoieEmail;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Encryption\DecryptException;

use Exception;

class EnvoiEmailController extends Controller
{
    public function sendEmail(Request $request){
        $email = $request->email;
        $member = user::where('email', '=', $email)->first();

        $password = $member->password;
        //$password2 = Crypt::decrypt($password);
        $data=[
            'sujet'=>'Récupération de mot de passe',
            'email'=>$email,
            'password'=> $password
        ];
        try {
            Mail::to('kaoutar.lakhal@gmail.com')->send(new EnvoieEmail($data));
            return view('confirmRecupPassword')->with('message','OK');
        } catch (Exception $th) {
            return view('confirmRecupPassword')->with('message','Error');
        }
    }
}
