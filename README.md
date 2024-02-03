# Laravel RD Station Marketing
[![Latest Stable Version](https://poser.pugx.org/matheushack/rd-station/v/stable)](https://packagist.org/packages/matheushack/rd-station)
[![Latest Unstable Version](https://poser.pugx.org/matheushack/rd-station/v/unstable)](https://packagist.org/packages/matheushack/rd-station)
[![Total Downloads](https://poser.pugx.org/matheushack/rd-station/downloads)](https://packagist.org/packages/matheushack/rd-station)
[![License](https://poser.pugx.org/matheushack/rd-station/license)](https://packagist.org/packages/matheushack/rd-station)

Projeto em Laravel para integração módulo de marketing do RD Station.

# Instalação
### Composer
```
"matheushack/rd-station": "dev-main"
```

# Contato
No RD Station todos os registros de pessoas são referidos como Contatos, independentemente de serem classificados como Leads, Leads Qualificados ou Clientes a partir de uma perspectiva de vendas.

Ao criar um Contato ele pode ser qualificado com um conjunto de campos padrão, como email, nome, cargo, empresa, cidade, estado, etc.. O campo padrão chave de identificação dos contatos dentro do RD Station é o "email" deste Contato, que sempre será único.

| Campo         | Tipo   | Obrigatório | Exemplo             |
|---------------|--------|-------------|---------------------|
| name          | string | Não         | Matheus Silva       |
| email         | string | Sim         | exemplo@exemplo.com |
| jobTitle      | string | Não         | Developer           |
| birthDate     | string | Não         | 1992-12-12          |
| bio           | string | Não         | Bio do usuário      |
| website       | string | Não         | exemplo.com.br      |
| personalPhone | string | Não         | +5511999999999      |
| mobilePhone   | string | Não         | +5511999999999      |
| city          | string | Não         | São Paulo           |
| state         | string | Não         | SP                  |
| country       | string | Não         | Brasil              |
| twitter       | string | Não         | twitter.com         |
| facebook      | string | Não         | facebook.com        |
| tags          | array  | Não         | ['tag1', 'tag2']    |


# Exemplos
## 1. Contato
   - ### Criar
```php
<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Contact;
use MatheusHack\RdStation\Requests\ContactRequest;

$request = (new ContactRequest())
    ->setEmail('email@email.com');

$response = (new Contact())
    ->create($request);
```
   - ### Editar
```php
<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Contact;
use MatheusHack\RdStation\Requests\ContactRequest;

$request = (new ContactRequest())
    ->setEmail('email@email.com')
    ->setName('Example')
    ->setJobTitle('Developer')
    ->setBirthDate('1992-12-14')
    ->setBio('Bio example')
    ->setWebsite('example.com.br')
    ->setCity('São Paulo')
    ->setState('SP')
    ->setCountry('Brasil')
    ->setTags([
        'teste',
    ]);

$response = (new Contact())
    ->update($request);
```
   - ### Procurar
```php
<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Contact;
use MatheusHack\RdStation\Requests\ContactRequest;

$request = (new ContactRequest())
    ->setEmail('email@email.com');

$response = (new Contact())->find($request);
```
