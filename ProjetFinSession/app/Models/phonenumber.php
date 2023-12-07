<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phonenumber extends Model
{
    use HasFactory;
    protected $table = "employee_phonenumber";
    protected $primaryKey = "PhoneNumberID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'EmployeeID',
        'PhoneNumberTypeID',
        'PhoneNumber',
        'ModifiedDate',
    ];
}
