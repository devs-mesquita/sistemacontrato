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
        'processo',
        'data',
        'fim',
        'tipo',
        'secretaria',
        'publicado',
        'empresa',
        'objeto',
        'classe',
        'motivo',
        'user_id',
        'deleted_at',
        'setor_id'
    ];
    
    public function fiscais()
    {
        return $this->hasMany(Fiscal::class);

    }  
    public function aditivo()

    {
        return $this->hasMany(Aditivo::class);
        
    }
    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }


}

