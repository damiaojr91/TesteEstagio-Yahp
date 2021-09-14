<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FuncionarioInvestimentos extends Pivot
{
    protected $table='funcionario_investimento';
    protected $fillable=['funcionario_id','investimento_id','valor'];
}
