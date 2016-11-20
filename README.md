 # Commerce.php by Chec
PHP client library for Commerce.js by Chec

You can learn more about Commerce.js & Chec at https://commercejs.com.

## Requirements
PHP 5.4 and later.

## Install

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require chec/commerce:*
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

```php
require_once('vendor/autoload.php');
```



## Getting Started

Simple usage looks like:

```php
Commerce\Auth::setApiKey('sk_test_8146250gNZ8gddde480e07ac91c10c2651077176aed27');

$products = Commerce\Product:all();

foreach($products as $k => $product):
	echo $product['name'];
endforeach;
```

## Documentation

Please see https://commercejs.com/docs/api 
