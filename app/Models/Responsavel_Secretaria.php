<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel_Secretaria extends Model
{
    use HasFactory;

    protected $table = "responsavel_secretaria";

    protected $fillable = [
        'nome'
       
    ];
}
