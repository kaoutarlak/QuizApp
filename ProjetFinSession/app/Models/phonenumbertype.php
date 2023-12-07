<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phonenumbertype extends Model
{
    use HasFactory;
    protected $table = "employee_phonenumbertype";
    protected $primaryKey = "PhoneNumberTypeID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'PhoneNumberType',
        'ModifiedDate',
    ];
}
