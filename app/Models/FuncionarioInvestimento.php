<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FuncionarioInvestimento extends Pivot
{
    protected $fillable=['funcionario_id','investimento_id','valor'];
}
