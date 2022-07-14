
# API CRUD Cakes

## Instalação

* Versão do PHP 7.3 ou superior.
* Ter a versão mais atual do Composer instalado

### Após o clone do repositório

> - Executar o comando ```composer install```
> - Renomear o ```.env.example``` para ```.env```
> - Executar o comando ```php artisan key:generate```
> - Alterar no ```.env``` o ```QUEUE_CONNECTION``` de ```sync``` para ```database```
> - Configurar no ```.env``` a conta para envio de e-mail
> - Executar Migration ``` php artisan migrate```

### Acessando o projeto
> - Pode ser usado com o server do próprio artisan; ```php artisan serve```

### Acessando as rotas
> localhost/api-crud-cakes/public/api/cakes
> > buscando todos registros de bolo, Método GET
# 
> localhost/api-crud-cakes/public/api/cake/{id}
> > buscando um registro de bolo, Método GET
# 
> localhost/api-crud-cakes/public/api/cakes
> > inserindo novo registro de bolo, Método POST
```php
{
    "name": "teste",
    "weight": 100,
    "price": "12.10",
	"quantity": 1
}
```
# 
> localhost/api-crud-cakes/public/api/cakes/{id}
> > editando registro de bolo, Método PUT
> Todos são opcionais
```php
{
    "name": "teste",
	"weight": 100,
    "price": "12.10",
	"quantity": 1
}
```
# 
> localhost/api-crud-cakes/public/api/cakes/{id}
> > excluindo registro de bolo, Método DELETE

# 
> localhost/api-crud-cakes/public/api/interested_emails
> > inserindo todos registros de interesse em determinado bolo, Método GET
# 
> localhost/api-crud-cakes/public/api/interested_emails/{id}
> > buscando um registro de interesse em determinado bolo,, Método GET
# 
> localhost/api-crud-cakes/public/api/interested_emails
> > inserindo novo registro de interesse em determinado bolo, Método POST
```php
{
	"email": "teste@teste.com.br",
	"cake_id": 3,
}
```

> > Fila para realizar os envios de email, executar o comando abaixo
```bash
php artisan queue:work
```
