<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = "setor";
    
    protected $fillable = [
        'nome'
];

   
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
