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
        return $this->belongsToMany(Investimento::class)->using(FuncionarioInvestimentos::class)->withPivot('valor'); //o atributo "withPivot" serve para referenciarmos atributos a mais que serão trabalhados na tabela
    }
}
