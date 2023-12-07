<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresstype extends Model
{
    use HasFactory;
    protected $table = "entreprise_addresstype";
    protected $primaryKey = "AddressTypeID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'AddressType',
        'ModifiedDate',
    ];
}
