<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\addresstype;
use App\Models\entreprise;
use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class addresseController extends Controller
{

    function getAllAddresse()
    {
        $listAddresse = address::all();
        $listAddresseType = addresstype::all();
        $listEntreprise = entreprise::all();

        return view('Addresse/Liste', ['listAddresse' => $listAddresse, 'listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);
    }

    function getEntrepriseAddresseType()
    {
        $listAddresseType = addresstype::all();
        $listEntreprise = entreprise::all();

        return view('/Addresse/Ajouter', ['listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);
    }

    function addAddresse(Request $request)
    {
        $EntrepriseID = trim($request->EntrepriseID);
        $AddressTypeID = trim($request->AddressTypeID);
        $AddressLine1 = trim($request->AddressLine1);
        $AddressLine2 = trim($request->AddressLine2);
        $City = trim($request->City);
        $Province = trim($request->Province);
        $Country = trim($request->Country);
        $PostalCode = trim($request->PostalCode);
        $WebSiteURL = trim($request->WebSiteURL);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        $newAddresse = address::create([
            'EntrepriseID' => $EntrepriseID,
            'AddressTypeID' => $AddressTypeID,
            'AddressLine1' => $AddressLine1,
            'AddressLine2' => $AddressLine2,
            'City' => $City,
            'Province' => $Province,
            'Country' => $Country,
            'PostalCode' => $PostalCode,
            'WebSiteURL' => $WebSiteURL,
            'ModifiedDate' => $ModifiedDate,
        ]);

        if ($newAddresse) {
            $listAddresse = address::all();
            $listAddresseType = addresstype::all();
            $listEntreprise = entreprise::all();
            return view('Addresse/Liste', ['listAddresse' => $listAddresse, 'listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);
        }

    }
    function getAddresse(Request $request)
    {
        $id = $request->id;
        $addresse = address::find($id);
        $listAddresseType = addresstype::all();
        $listEntreprise = entreprise::all();
        return view('/Addresse/Modifier', ['addresse' => $addresse, 'listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);
    }

    function alterAddresse(Request $request)
    {
        $id = $request->id;
        $EntrepriseID = trim($request->EntrepriseID);
        $AddressTypeID = trim($request->AddressTypeID);
        $AddressLine1 = trim($request->AddressLine1);
        $AddressLine2 = trim($request->AddressLine2);
        $City = trim($request->City);
        $Province = trim($request->Province);
        $Country = trim($request->Country);
        $PostalCode = trim($request->PostalCode);
        $WebSiteURL = trim($request->WebSiteURL);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        //$employee = employee::find($id);

        address::where('AddressID', $id)->update([
            'EntrepriseID' => $EntrepriseID,
            'AddressTypeID' => $AddressTypeID,
            'AddressLine1' => $AddressLine1,
            'AddressLine2' => $AddressLine2,
            'City' => $City,
            'Province' => $Province,
            'Country' => $Country,
            'PostalCode' => $PostalCode,
            'WebSiteURL' => $WebSiteURL,
            'ModifiedDate' => $ModifiedDate,
        ]);
        $listAddresse = address::all();
        $listAddresseType = addresstype::all();
        $listEntreprise = entreprise::all();
        return redirect('Addresse/Liste')->with(['listAddresse' => $listAddresse, 'listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);

    }
    
    function detailAddresse(Request $request)
    {
        $id = $request->id;
        $addresse = address::find($id);
        $listAddresseType = addresstype::all();
        $listEntreprise = entreprise::all();
        return view('/Addresse/Detail', ['addresse' => $addresse, 'listEntreprise' => $listEntreprise, 'listAddresseType' => $listAddresseType]);

    }


    function deleteAddresse(Request $request)
    {
        $id = $request->id;
        address::find($id)->delete();

    }
//----------------








}