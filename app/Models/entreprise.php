<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    use HasFactory;
    protected $table = "entreprise_entreprise";
    protected $primaryKey = "EntrepriseID";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'EntrepriseName',
        'EntrepriseNote',
        'DateInscrit',
        'DateMod',
    ];
}
