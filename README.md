## **Criando um projeto em laravel**

* * *
***Requisitos:***
Composer
Nginx
PHP
MySQL
Redis
* * *

**1.** Execute os comandos iniciais para gerar o projeto:
~~~php
composer create-project laravel/laravel NomeDoProjeto
composer install
composer update
~~~

**2.** Instale bootstrap: https://getbootstrap.com/

**3.** Configure arquivo **.env** com os dados de acesso ao Banco de Dados: 

~~~php
DB_CONNECTION=mysql
DB_HOST=172.17.0.1
DB_PORT=3306
DB_DATABASE=testeestagio
DB_USERNAME=root
DB_PASSWORD=root-docker-databases
~~~

**4.** Crie **Routes** para a execução das funções do sistema INDEX, CREATE, STORE, EDIT, UPDATE e DESTROY. Exemplo:

~~~php
Route::get('/funcionarios', 'App\\Http\\Controllers\\FuncionariosController@index')->name('indexFuncionarios');
Route::get('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@create')->name('createFuncionario');
Route::post('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@store')->name('storeFuncionario');
Route::put('/funcionarios/edicao/{id}', 'App\\Http\\Controllers\\FuncionariosController@edit')->name('editFuncionario');
Route::post('/funcionarios/atualizacao/{id}', 'App\\Http\\Controllers\\FuncionariosController@update')->name('updateFuncionario');
Route::delete('/funcionarios/delecao/{id}', 'App\\Http\\Controllers\\FuncionariosController@delete')->name('deleteFuncionario');
~~~

**5.** Criar Views para exibição das telas.

**6.** Comando para criar migrations:
~~~php
php artisan make:migration create_table_nome
~~~

**7.** Comando para criar models:
~~~php
php artisan make:model NomeModel
~~~

**8.** Criar Controllers com as Functions de execução
**8.1.** Comando para criar uma controller:
~~~php
php artisan make:controller NomeDaController --resource
~~~

**8.2.** Ao final da function, caso o resultado seja retornado a uma View, adicionar no fim do código a linha

~~~php
return view ('nomeDa.view')->with('apelidoParaAVariavel',$variavel);
~~~

ou

~~~php
return view (('nomeDa.view'), compact('nomedoarray'));
~~~


***
***
**Dicas:**

**Exibindo dados em campos editáveis:**
Em casos onde é necessário puxar os dados de uma tabela para a view é necessário enviar os dados para a view através de uma controller no formato de um array.
Exemplo:
~~~php
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('Funcionarios.edit', compact('funcionario'));
    }
~~~

No exemplo exibido a function "compact" está automaticamente convertendo os dados contidos na classe Funcionário para o formato de array.
Já o "find" está buscando a variável/campo solicitado.


**Botão de deletar na view**
Além de criar uma controller com a função de deleção, dentro da view é importante colocar o botão dentro de um formulário e especificar o formulário como "POST", adicionar @csrf para adicionar a segurança e @method('DELETE') para "converter" o método Post em Delete utilizado o PHP. Exemplo:

~~~PHP
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                        <th> </th>
                    </tr>
                    </thead>
                   <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{$funcionario['first_name']}}</td>
                                <td>{{$funcionario['last_name']}}</td>
                                <td>{{$funcionario['email']}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('editFuncionario', $funcionario->id)}}" class="btn btn-info btn-sm" role="button">Editar</a>

                                        <form method="POST" action={{route('deleteFuncionario', $funcionario['id'])}}>
                                            @csrf
                                            @method('DELETE') {{-- o HTML não suporta o método "DELETE", por isso é importante chamar o método "POST" e chamar logo em seguinda o método de deleção utilizando PHP--}}

                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
~~~


**Tabelas de relacionamento**
Quando trabalhamos com tabelas de relacionamento, precisamos criar uma Migration com o nome das duas tabelas (ex:"Nome1Nome2"), criamos também uma Model com o mesmo padrão de nome da tabela e dentro dessa Model, indicamos que essa tabela é uma Pivot Table, da seguinte maneira:

~~~php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FuncionarioInvestimento extends Pivot
{
    protected $fillable=['funcionario_id','investimento_id','valor'];
}
~~~

Seguindo  exemplo, essa Model FuncionarioInvestimento servirá como um "meio campo" na comunicação entre a tabela Funcionário e a tabela Investimentos.

Para que haja o relacionamento é necessário indicar isso nas respectivas Models de cada tabela envolvida no processo (menos a pivot). Por exemplo, na model Funcionarios fica assim:

~~~php
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
~~~

Para entender melhor como as relações funcionam podemos "destrinchar" a function "funcionarios" do exemplo apresentado:

1. Para a relação temos que dizer qual o "grau" da relação (hasOne, belongsToOne, hasMany, belongsToMany, etc...).
2. Em seguida indicamos qual model irá conter as informações de intermédio da relação, no caso do exemplo seria a model FuncionarioInvestimento 
3. Por último, caso a tabela pivot possua mais algum campo que deverá acompanhar a relação indicamos usando o atributo withPivot('colunaemquestao').
