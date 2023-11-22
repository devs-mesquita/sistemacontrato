<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aditivo extends Model
{
    use HasFactory;

    protected $table = "aditivo";

    protected $fillable = [
        'contrato_id',
        'data_anterior',
       
    ];
    
    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }

}

