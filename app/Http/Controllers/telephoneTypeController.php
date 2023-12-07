<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\addresstype;
use App\Models\entreprise;
use App\Models\employee;
use App\Models\phonenumbertype;
use Carbon\Carbon;
use Illuminate\Http\Request;

class telephoneTypeController extends Controller
{

    function getAllTelephoneType()
    {

        $listTelephoneType = phonenumbertype::all();

        return view('TelephoneType/Liste', ['listTelephoneType' => $listTelephoneType]);
    }


    function addTelephoneType(Request $request)
    {
        $PhoneNumberType = trim($request->PhoneNumberType);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        $newTelephoneType = phonenumbertype::create([
            'PhoneNumberType' => $PhoneNumberType,
            'ModifiedDate' => $ModifiedDate,
        ]);

        if ($newTelephoneType) {

            $listTelephoneType = phonenumbertype::all();
            return view('TelephoneType/Liste', ['listTelephoneType' => $listTelephoneType]);
        }

    }
    function getTelephoneType(Request $request)
    {
        $id = $request->id;
        $TelephoneType = phonenumbertype::find($id);
        return view('/TelephoneType/Modifier', ['TelephoneType' => $TelephoneType]);
    }

    function alterTelephoneType(Request $request)
    {
        $id = $request->id;
        $PhoneNumberType = trim($request->PhoneNumberType);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        //$employee = employee::find($id);

        phonenumbertype::where('PhoneNumberTypeID', $id)->update([
            'PhoneNumberType' => $PhoneNumberType,
            'ModifiedDate' => $ModifiedDate,
        ]);

        $listTelephoneType = phonenumbertype::all();
        return redirect('TelephoneType/Liste')->with(['listTelephoneType' => $listTelephoneType]);

    }
    
    function detailTelephoneType(Request $request)
    {
        $id = $request->id;
        $TelephoneType = phonenumbertype::find($id);
        return view('/TelephoneType/Detail', ['TelephoneType' => $TelephoneType]);

    }


    function deleteTelephoneType(Request $request)
    {
        $id = $request->id;
        phonenumbertype::find($id)->delete();
        
    }
//----------------








}