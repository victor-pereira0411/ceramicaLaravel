<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $primaryKey = 'idFuncionario';
    protected $fillable = [
        'name',
        'ganhoMilheiro'
    ];
}
