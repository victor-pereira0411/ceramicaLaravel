<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    protected $fillable = [
        'dataProducao',
        'milheirosProduzidos',
    ];

    // protected $table = 'albums';

    // public function producao()
    // {
    //     return $this->belongsTo(Producao::class, 'id_artista', 'id');
    // }
}
