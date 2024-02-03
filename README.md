# Laravel RD Station Marketing
[![Total Downloads](https://poser.pugx.org/matheushack/rd-station/downloads)](https://packagist.org/packages/matheushack/rd-station)
[![License](https://poser.pugx.org/matheushack/rd-station/license)](https://packagist.org/packages/matheushack/rd-station)

Projeto em Laravel para integração módulo de marketing do RD Station.

# Instalação
### Composer
```
composer required matheushack/rd-station
```
ou
```
"matheushack/rd-station": "^1.1.3"
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

# Conversão
O RD Station Marketing considera o valor do atributo `conversion_identifier` como identificador do evento customizado. Esse evento é registrado sempre que ocorre uma conversão.

* Principal

| Campo       | Tipo   | Obrigatório | Exemplo         |
|-------------|--------|-------------|-----------------|
| eventType   | string | Sim         | CONVERSION      |
| eventFamily | string | Sim         | CDP             |
| payload     | array  | Sim         | `PayloadObject` |


* PayloadObject

| Campo                | Tipo   | Obrigatório | Exemplo             |
|----------------------|--------|-------------|---------------------|
| conversionIdentifier | string | Sim         | Conversão exemplo   |
| email                | string | Sim         | exemplo@exemplo.com |

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

## 2. Conversão
- ### Criar
```php
<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Conversion;
use MatheusHack\RdStation\Requests\ConversionRequest;
use MatheusHack\RdStation\Requests\ConversionPayloadRequest;

$payload = (new ConversionPayloadRequest())
    ->setConversionIdentifler('Conversão exemplo')
    ->setEmail('email@email.com');

$request = (new ConversionRequest())
    ->setEventType('CONVERSION')
    ->setEventFamily('CDP')
    ->setPayload($payload);

$response = (new Conversion())
    ->create($request);
```
