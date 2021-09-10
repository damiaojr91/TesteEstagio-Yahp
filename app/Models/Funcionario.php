<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = "funcionarios";
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function investimentos(){
        return $this->hasMany(Investimento::class)->using(FuncionarioInvestimento::class)->withPivot('valor'); //o atributo "withpivot" serve para referenciarmos atributos a mais que serão trabalhados na tabela
    }
}
