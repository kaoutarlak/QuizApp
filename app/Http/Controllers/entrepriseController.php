<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use Carbon\Carbon;
use Illuminate\Http\Request;

class entrepriseController extends Controller
{

    function getAllEntreprise()
    {
        $listEntreprise = entreprise::all();
        return view('home', ['listEntreprise' => $listEntreprise]);
    }

    function getEntreprise(Request $request)
    {
        $id = $request->id;
        $entreprise = entreprise::find($id);
        return view('ModifierEntreprise', ['entreprise' => $entreprise]);
    }


    function alterEntreprise(Request $request)
    {
        $id = $request->id;
        $EntrepriseName = trim($request->nom);
        $EntrepriseNote = trim($request->note);
        $DateMod = Carbon::now()->format('Y-m-d H:i:s');

        $entreprise = entreprise::find($id);
        if ($EntrepriseName != $entreprise->EntrepriseName || $EntrepriseNote != $entreprise->EntrepriseNote) {

            entreprise::where('EntrepriseID', $id)->update([
                'EntrepriseName' => $EntrepriseName,
                'EntrepriseNote' => $EntrepriseNote,
                'DateMod' => $DateMod,
            ]);
            $listEntreprise = entreprise::all();
            return redirect('/home')->with(['listEntreprise' => $listEntreprise]);
            // view('home', ['listEntreprise' => $listEntreprise]);
        } else {
            return back()->with('info', 'You have not change anything. Nothing to update!');
        }

    }


    function AddEnreprise(Request $request)
    {

        $EntrepriseName = trim($request->nom);
        $EntrepriseNote = trim($request->note);
        $DateMod = Carbon::now()->format('Y-m-d H:i:s');
        $DateInscrit = Carbon::now()->format('Y-m-d H:i:s');

        $newEntreprise = entreprise::create([
            'EntrepriseName' => $EntrepriseName,
            'EntrepriseNote' => $EntrepriseNote,
            'DateInscrit' => $DateInscrit,
            'DateMod' => $DateMod,
        ]);

        if ($newEntreprise) {
            $listEntreprise = entreprise::all();
            return redirect('/home')->with(['listEntreprise' => $listEntreprise]);
        } else {
            return back()->with('info', 'error!');
        }
        

    }

    function deleteEntreprise(Request $request)
    {
        $id = $request->id;
        $result = entreprise::find($id)->delete();
        
    }

    function detailEntreprise(Request $request)
    {
        $id = $request->id;
        $entreprise = entreprise::find($id);
        return view('detailEntreprise', ['entreprise' => $entreprise]);
        
    }

}