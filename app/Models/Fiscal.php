<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    use SoftDeletes;

    protected $table = "fiscais_contrato";

    protected $fillable = [
        'nome',
        'email',
        'id',
        'contrato_id'
    ];
    public function Contrato()
    {
      return $this->belongsTo(Contrato::class);
    }
}
 