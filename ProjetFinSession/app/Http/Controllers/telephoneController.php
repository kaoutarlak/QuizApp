<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\phonenumber;
use App\Models\phonenumbertype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class telephoneController extends Controller
{

    function getAllTelephone()
    {

        $listTelephone = phonenumber::all();
        $listTelephoneType = phonenumbertype::all();
        $listEmployee = employee::all();
        return view('Telephone/Liste', ['listTelephone' => $listTelephone, 'listTelephoneType' => $listTelephoneType, 'listEmployee' => $listEmployee]);
    }

    function getEmpTeleType()
    {

        $listTelephoneType = phonenumbertype::all();
        $listEmployee = employee::all();
        return view('Telephone/Ajouter', ['listTelephoneType' => $listTelephoneType, 'listEmployee' => $listEmployee]);
    }

    function addTelephone(Request $request)
    {
        $EmployeeID = trim($request->EmployeeID);
        $PhoneNumberTypeID = trim($request->PhoneNumberTypeID);
        $PhoneNumber = trim($request->PhoneNumber);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        $newTelephone = phonenumber::create([
            'EmployeeID' => $EmployeeID,
            'PhoneNumberTypeID' => $PhoneNumberTypeID,
            'PhoneNumber' => $PhoneNumber,
            'ModifiedDate' => $ModifiedDate,
        ]);

        if ($newTelephone) {
            $listTelephone = phonenumber::all();
            $listTelephoneType = phonenumbertype::all();
            $listEmployee = employee::all();
            return Redirect('Telephone/Liste')->with(['listTelephone' => $listTelephone, 'listTelephoneType' => $listTelephoneType, 'listEmployee' => $listEmployee]);
        }

    }
    function getTelephone(Request $request)
    {
        $id = $request->id;
        $Telephone = phonenumber::find($id);
        $listTelephoneType = phonenumbertype::all();
        $listEmployee = employee::all();
        return view('Telephone/Modifier', ['Telephone' => $Telephone,'listTelephoneType' => $listTelephoneType, 'listEmployee' => $listEmployee]);
        // $id = $request->id;
        // $Telephone = phonenumber::find($id);
        // return view('/Telephone/Modifier', ['Telephone' => $Telephone]);
    }

    function alterTelephone(Request $request)
    {
        $id = $request->id;
        $EmployeeID = trim($request->EmployeeID);
        $PhoneNumberTypeID = trim($request->PhoneNumberTypeID);
        $PhoneNumber = trim($request->PhoneNumber);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        //$employee = employee::find($id);

        phonenumber::where('PhoneNumberID', $id)->update([
            'EmployeeID' => $EmployeeID,
            'PhoneNumberTypeID' => $PhoneNumberTypeID,
            'PhoneNumber' => $PhoneNumber,
            'ModifiedDate' => $ModifiedDate,
        ]);

        $listTelephone = phonenumber::all();
        return redirect('Telephone/Liste')->with(['listTelephone' => $listTelephone]);

    }

    function detailTelephone(Request $request)
    {
        $id = $request->id;
        $Telephone = phonenumber::find($id);
        $listTelephoneType = phonenumbertype::all();
        $listEmployee = employee::all();
        return view('/Telephone/Detail', ['Telephone' => $Telephone,'listTelephoneType' => $listTelephoneType, 'listEmployee' => $listEmployee]);

    }


    function deleteTelephone(Request $request)
    {
        $id = $request->id;
        phonenumber::find($id)->delete();

    }
//----------------








}