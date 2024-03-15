<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "setor";
    
    protected $fillable = [
        'nome'
];

   
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
