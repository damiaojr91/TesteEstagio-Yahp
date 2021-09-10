<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    use HasFactory;

    protected $table = "investimentos";
    protected $fillable = ['nome', 'tipo'];

    public function funcionarios(){
        return $this->belongsToMany(Funcionario::class)->using(FuncionarioInvestimento::class)->withPivot('valor'); //o atributo "withPivot" serve para referenciarmos atributos a mais que serão trabalhados na tabela
    }
}
