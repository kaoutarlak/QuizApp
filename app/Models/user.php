<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class user extends Model
{
    use HasFactory,EncryptedAttribute;
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $encryptable = [
        'password',
    ];
}
