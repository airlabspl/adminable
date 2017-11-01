# airlabs/adminable

[![Build Status](https://travis-ci.org/airlabspl/adminable.svg?branch=master)](https://travis-ci.org/airlabspl/adminable)
[![Maintainability](https://api.codeclimate.com/v1/badges/ee0646cb3298d53390ba/maintainability)](https://codeclimate.com/github/airlabspl/adminable/maintainability)

This package provides a scaffold for creating admin accounts.

### Requirements

* Laravel >= 5.5

### Installation

* Require this package

```
composer require airlabs/adminable
```

* Publish the package configuration and customize (or use defaults).

```
php artisan vendor:publish --provider="Airlabs\Adminable\AdminableServiceProvider" --tag="config"
```

*  Run package migrations

```
php artisan migrate
```

* Add a trait to your user model

```php
<?php

namespace App;

use Airlabs\Adminable\Adminable;
...

class User
{
    use Adminable, ...;
    
    ...
}
```

### Usage

* Checking if user instance is admin:

```php
$user->isAdmin(); // true or false
```

* Creating an admin account via console:

``` 
php artisan adminable:create
```

Follow the prompts:

![](https://gitlab.com/airlabs/admin/uploads/998fffabba1a5859a1e2bc6ff4c606dd/Zrzut_ekranu_2017-10-31_o_22.00.21.png)

### Configuration

This package can be customized. Look at the default config file (that can be published to `config/adminable.php`):

```php
<?php

return [
    'column' => 'is_admin',
    'table' => 'users',
    'model' => 'App\User',
    'required_fields' => [
        'name', 'email'
    ],
    'password_field' => 'password'
];
```

### Blade helper

This packages comes with a blade helper called `@admin`. It uses a recently added `if` blade directive so you can also use stuff like `elseadmin` etc.

```blade
@admin
    You are an admin.
@else
    You are NOT an admin.
@endadmin
```