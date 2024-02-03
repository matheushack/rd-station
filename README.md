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
