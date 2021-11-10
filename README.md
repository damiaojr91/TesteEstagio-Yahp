# Xastree Financial
Projeto de estudo em Laravel simulando um sistema para investimentos.

**Introdução**
****
Xastree Financial Services é um sistema que tem como objetivo apoiar seus colaboradores no gerenciamento de investimentos financeiros.

***Requisitos:***
Este projeto foi desenvolvido em Laravel e para tal é necessária a utilização de:

- Composer
- PHP
- MySQL

Também é necessário alguns ajustes no arquivo .env do projeto pois é onde é efetivamente feita a conexão com o banco de dados.

No projeto também foi utilizado o bootstrap em uma blade de layout onde esta replica o design para as outras blades através da chamada de sua função.

<br>

****

**Homepage**
****
![img](https://i.imgur.com/WZAgWMx.png)

<br>
<br>

Ao acessarmos a página inicial nos deparamos com os itens principais de atuação no sistema:
1. É possível visualizarmos a lista completa de colaboradores cadastrados.
1.1. É possível também acessarmos a visualização de tipos de investimentos disponíveis para aquele funcionário, assim como a possibilidade de visualizar os investimentos que já estão vinculados ao colaborador.
2. Podemos acessar a tela de cadastro de funcionários.
3. Podemos acessar a tela de cadastro de investimentos.

<br>

**Funcionários**
****
![img](https://i.imgur.com/I1ktMWW.png)

<br>
<br>

Dentro da tela de funcionários somos apresentados às opções:
1. Lista de funcionários já cadastrados, contendo nome, sobrenome e email. Além das opções de Editar e Deletar o funcionário.
2. Botões de manipulação. É possível criar um novo funcionário manualmente ou importar uma lista de funcionários já existentes em uma api.
3. Opções de cabeçalho com botões para navegação rápida entre as páginas Homepage, Funcionários e Investimentos.

<br>

**Investimentos**
****
![img](https://i.imgur.com/OGHbHap.png)

<br>
<br>

A tela de investimentos, assim como a de funcionários, possui uma interface simples e direta. Nela temos as seguintes opções:
1. Lista de investimentos cadastrados, assim como suas opções de edição e deleção.
2. Botões de manipulação, com a possibilidade de inserção manual de investimentos.
3. Opções de cabeçalho com botões para navegação rápida entre as páginas Homepage, Funcionários e Investimentos.

<br>

**Atribuindo investimentos ao funcionario**
****
![img](https://i.imgur.com/ezre3F0.png)

<br>
<br>

A atribuição de valores e vínculos entre funcionário e investimentos acontece dentro da tela de detalhes de cada funcionário. Para acessá-la utilizamos o botão "Detalhes" existente dentro da homepage.

Nessa tela podemos realizar as seguintes opções:
1. Visualização da lista de investimentos cadastrados para o funcionário, assim como suas opções de edição e deleção.
2. Botões de manipulação. Aqui podemos vincular um investimento ao funcionário e também adicionar o valor investido pelo colaborador.
3. Para facilitar a utilização do sistema e sabermos qual funcionário estamos editando, o nome do colaborador é exibido logo acima de sua lista de investimentos.
4. Opções de cabeçalho com botões para ndavegação rápida entre as páginas Homepage, Funcionários e Investimentos.

<br>
