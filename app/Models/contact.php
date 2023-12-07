<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "contact_message";
    public $timestamps = false;
    protected $fillable = [
        'Nom',
        'Email',
        'Message',
    ];
    protected $primaryKey = "id";

    public $incrementing = true;
}