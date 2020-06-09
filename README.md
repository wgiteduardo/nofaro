## Sobre o projeto

O projeto consiste em um sistema capaz de realizar um CRUD de pets e também de serviços que serão prestados a esses pets.

- [Laravel Framework v7.13.0](https://laravel.com/).
- [PHP v7.4.6](https://www.php.net/).
- [MariaDB v10.4.11](https://mariadb.org/).

## Como instalar

Baixe o projeto utilizando git `git clone https://github.com/wgiteduardo/nofaro.git` e em seguinda rode o composer dentro do diretório do projeto com `composer update`.

## Configurando o projeto

Para configurar o projeto, faça uma cópia do arquivo `.env.example` renomeando para `.env` e insira as informações do seu banco de dados, como por exemplo: **DB_DATABASE, DB_USERNAME e DB_PASSWORD**.

E então é só rodar o projeto utilizando `php artisan serve` ou acessar com Apache!

## API

Você pode desfrutar da API do projeto enviando requisições para as urls abaixo:

### Pets

> api/pets [GET] -> Lista os pets cadastrados    
> api/pets [POST] -> Cadastrar um novo pet (necessário: name e specie)    
> api/pets/{pet} [GET] -> Retorna os dados de um pet especifico    
> api/pets/{pet} [DELETE] -> Deleta um pet do banco de dados    

### Serviços

> api/services [GET] -> Lista os serviços dos pets com paginação    
> api/services/{pet} [POST] -> Cadastra um novo serviço para um pet (necessario date e description opcional) - Deve passar o ID do pet na URL.    
> api/services/{service} [GET] -> Realiza uma busca no banco de dados procurando serviços de pets com o nome parecido com o que for informado na URL. Exemplo: api/services/Bob    
> api/services/{service} [DELETE] -> Deleta um serviço    