<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    protected $fillable = [
        'funcionario_id',
        'valorMilheiro',
        'somaMilheiros',
        'salario'
    ];
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }
}
