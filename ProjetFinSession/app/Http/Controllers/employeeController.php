<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class employeeController extends Controller
{

    function getAllEmployee()
    {
        $listEmployee = employee::all();

        $listEntreprise = entreprise::all();

        return view('Employee/Liste', ['listEmployee' => $listEmployee, 'listEntreprise' => $listEntreprise]);
    }

    function getEntreprise()
    {
        $listEntreprise = entreprise::all();

        return view('/Employee/Ajouter', ['listEntreprise' => $listEntreprise]);
    }

    function AddEmployee(Request $request)
    {
        $EntrepriseID = trim($request->EntrepriseID);
        $FirstName = trim($request->FirstName);
        $MiddleName = trim($request->MiddleName);
        $LastName = trim($request->LastName);
        $Gender = trim($request->Gender);
        $EmailAddress = trim($request->EmailAddress);
        $Titre = trim($request->Titre);
        $Department = trim($request->Department);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        $newEmployee = employee::create([
            'EntrepriseID' => $EntrepriseID,
            'FirstName' => $FirstName,
            'MiddleName' => $MiddleName,
            'LastName' => $LastName,
            'Gender' => $Gender,
            'EmailAddress' => $EmailAddress,
            'Titre' => $Titre,
            'Department' => $Department,
            'ModifiedDate' => $ModifiedDate,
        ]);

        if ($newEmployee) {
            $listEmployee = employee::all();
            return redirect('/Employee/Liste')->with(['listEmployee' => $listEmployee]);
        }

    }

    function getEmployee(Request $request)
    {
        $id = $request->id;
        $employee = employee::find($id);
        $listEntreprise = entreprise::all();
        return view('/Employee/Modifier', ['employee' => $employee, 'listEntreprise' => $listEntreprise]);
    }

    function alterEmployee(Request $request)
    {
        $id = $request->id;
        $EntrepriseID = trim($request->EntrepriseID);
        $FirstName = trim($request->FirstName);
        $MiddleName = trim($request->MiddleName);
        $LastName = trim($request->LastName);
        $Gender = trim($request->Gender);
        $EmailAddress = trim($request->EmailAddress);
        $Titre = trim($request->Titre);
        $Department = trim($request->Department);
        $ModifiedDate = Carbon::now()->format('Y-m-d H:i:s');

        //$employee = employee::find($id);

        employee::where('EmployeeID', $id)->update([
            'EntrepriseID' => $EntrepriseID,
            'FirstName' => $FirstName,
            'MiddleName' => $MiddleName,
            'LastName' => $LastName,
            'Gender' => $Gender,
            'EmailAddress' => $EmailAddress,
            'Titre' => $Titre,
            'Department' => $Department,
            'ModifiedDate' => $ModifiedDate,
        ]);
        $listEmployee = employee::all();
        $listEntreprise = entreprise::all();
        return redirect('/Employee/Liste')->with(['listEmployee' => $listEmployee, 'listEntreprise' => $listEntreprise]);

    }



    function detailEmployee(Request $request)
    {
        $id = $request->id;
        $employee = employee::find($id);
        $listEntreprise = entreprise::all();
        return view('/Employee/Detail', ['employee' => $employee, 'listEntreprise' => $listEntreprise]);

    }


    function deleteEmployee(Request $request)
    {
        $id = $request->id;
        employee::find($id)->delete();

    }
//----------------







}