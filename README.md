# OgrPackage

## Introduction

OgrPackage for Laravel provides a simple connection to Gravatar API to get all information you need to get from their service.

## Installation

First, you should create a new Laravel application, configure your database,
and run your database migrations.

Once you have created a new Laravel application, you may install OgrPackage for Laravel using Composer:

`composer require okh/ogr-package`

You may publish this package config-file executing the next command:

`php artisan vendor:publish --tag=ogr-config`

`php artisan vendor:publish --tag=ogr-migrations`

Add next configuration to .env file

`GRAVATAR_API_HOST=`

`OGR_PACKAGE_FILE_PATH=`

`OGR_PACKAGE_FILE_NAME=`


## License
OgrPackage for Laravel is open-sourced software licensed under the [MIT license](LICENSE.md).
