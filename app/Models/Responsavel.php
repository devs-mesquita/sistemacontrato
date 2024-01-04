<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $table = "responsavel";

    protected $fillable = [
        ' nome',
        'email',
        'telefone'
       
    ];
    
    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }

}

