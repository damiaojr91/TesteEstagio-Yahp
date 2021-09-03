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
php artisan make:controlle NomeDaController --resource
~~~

**8.2.** Ao final da function, caso o resultado seja retornado a uma View, adicionar no fim do código a linha

~~~php
return view ('nomeDa.view')->with('apelidoParaAVariavel',$variavel);
~~~

ou

~~~php
return view (('nomeDa.view'), compact('nomedoarray'));
~~~

