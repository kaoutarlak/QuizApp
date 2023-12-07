<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = "employee_employee";
    protected $primaryKey = "EmployeeID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'EntrepriseID',
        'FirstName',
        'MiddleName',
        'LastName',
        'Gender',
        'EmailAddress',
        'Titre',
        'Department',
        'ModifiedDate',
    ];
}
