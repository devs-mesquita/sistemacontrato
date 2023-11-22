<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use SoftDeletes;

    protected $table = "contrato";

    protected $fillable = [
        'numero',
        'data',
        'fim',
        'tipo',
        'secretaria',
        'publicado',
        'user_id',
        'deleted_at'
    ];
    
    public function fiscais()
    {
        return $this->hasMany(Fiscal::class);

    }  
    public function aditivo()

    {
        return $this->hasMany(Aditivo::class);
        
    }



}

