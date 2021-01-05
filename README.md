# Challenge

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Challenge is a RESTFUL web API and a CLI to manage products.

# Features!

  - CLI to add and delete products and categories
  - RESTFUL API to create products and list products and categories

### Installation

challenge requires php v7+ to run.

Install the dependencies and devDependencies.

```sh
$ composer install
```

To start the dev server:

```sh
$ php artisan serve
```

To seed the database:

```sh
$ php artisan db:seed
```

To link the storage:

```sh
$ php artisan storage:link
```

# USAGE:

## CLI

### Create product
```sh
$ php artisan create:product productName --description="Product description" --price=10 --image="image/file/name.ext"
```
Description:
  Create a new Product

Usage:
  create:product [options] [--] <name>

Arguments:
  name                             The name of the Category

Options:
      --description[=DESCRIPTION]  Product description
      --price[=PRICE]              Product price
      --image[=IMAGE]              Product image URL
      -h, --help                   Display help for the given command.
      
### Delete product

```sh
$ php artisan delete:product id
```
Description:
  Delete a Product

Usage:
  delete:product <id>

Arguments:
  id                    The ID of the Product

### Create Category

```sh
$ php artisan create:category name
```

Description:
  Create a new Category

Usage:
  create:category [options] [--] <name>

Arguments:
  name                  The name of the Category

Options:
      --catid[=CATID]   Parent Category ID
        -h, --help      Display help for the given command.
      
### Delete Category

```sh
$ php artisan delete:category id
```
Description:
  Delete a Category

Usage:
  delete:category <id>

Arguments:
  id                    The ID of the Category

## Web API

```sh
| Method | ENDPOINT    | Params                                        |
-------------------------------------------------------------------------
|  GET   | /products   | None                                          |
|  GET   | /categories | None                                          |
|  POST  | /products   | { name, description, price, category, image } |
```

