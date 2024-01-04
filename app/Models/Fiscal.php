<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    

    protected $table = "fiscais_contrato";

    protected $fillable = [
        'nome',
        'email',
        'id',
        'telefone',
        'contrato_id'
    ];
    public function Contrato()
    {
      return $this->belongsTo(Contrato::class);
    }
}
 