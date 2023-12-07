<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table = "entreprise_address";
    protected $primaryKey = "AddressID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'EntrepriseID',
        'AddressTypeID',
        'AddressLine1',
        'AddressLine2',
        'City',
        'Province',
        'Country',
        'PostalCode',
        'WebSiteURL',
        'ModifiedDate',
    ];
}
