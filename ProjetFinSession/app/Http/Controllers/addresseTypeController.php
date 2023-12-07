<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\addresstype;
use App\Models\entreprise;
use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class addresseTypeController extends Controller
{

    function getAllAddresseType()
    {

        $listAddresseType = addresstype::all();

        return view('AddresseType/Liste', ['listAddresseType' => $listAddresseType]);
    }


    function addAddresseType(Request $request)
    {
        $AddressType = trim($request->AddressType);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        $newAddresseType = addresstype::create([
            'AddressType' => $AddressType,
            'ModifiedDate' => $ModifiedDate,
        ]);

        if ($newAddresseType) {

            $listAddresseType = addresstype::all();
            return view('AddresseType/Liste', ['listAddresseType' => $listAddresseType]);
        }

    }
    function getAddresseType(Request $request)
    {
        $id = $request->id;
        $addresseType = addresstype::find($id);
        return view('/AddresseType/Modifier', ['addresseType' => $addresseType]);
    }

    function alterAddresseType(Request $request)
    {
        $id = $request->id;
        $AddressType = trim($request->AddressType);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        //$employee = employee::find($id);

        addresstype::where('AddressTypeID', $id)->update([
            'AddressType' => $AddressType,
            'ModifiedDate' => $ModifiedDate,
        ]);

        $listAddresseType = addresstype::all();
        return redirect('AddresseType/Liste')->with(['listAddresseType' => $listAddresseType]);

    }
    
    function detailAddresseType(Request $request)
    {
        $id = $request->id;
        $addresseType = addresstype::find($id);
        return view('/AddresseType/Detail', ['addresseType' => $addresseType]);

    }


    function deleteAddresseType(Request $request)
    {
        $id = $request->id;
        addresstype::find($id)->delete();

    }
//----------------








}