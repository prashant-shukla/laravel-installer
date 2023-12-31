# Laravel web Installation wizard Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pacificsw/laravel-installer.svg?style=flat-square)](https://packagist.org/packages/pacificsw/laravel-installer)
[![Quality Score](https://img.shields.io/scrutinizer/g/pacificsw/laravel-installer.svg?style=flat-square)](https://scrutinizer-ci.com/g/pacificsw/laravel-installer)
[![Total Downloads](https://img.shields.io/packagist/dt/pacificsw/laravel-installer.svg?style=flat-square)](https://packagist.org/packages/pacificsw/laravel-installer)

##### THIS PACKAGE IS STILL UNDER TESTING AND DEVELOPMENT

This package is built on top of the [rachidlaasri/laravel-installer](https://github.com/rashidlaasri/LaravelInstaller) package, This package just overcomes some issues that I faced during my project development such as adding new environment elements in installation wizard form and validation of new variables. This package is specially focused to use after the final build of the project, it will use .env.excample file as a template for updating .env file.

##### key Feature:

1-It will use you predefined environment keys from .env.example.

2-Easy to expand set of environment keys and validations.

3-Multi-lingual support.

## Installation

You can install the package via composer:

```bash
composer require pacificsw/laravel-installer
```
Register the package
    Laravel 5.5 and up Uses package auto discovery feature, no need to edit the config/app.php file.

Laravel 5.4 and below Register the package with laravel in config/app.php under providers with the following:
```bash
'providers' => [
	    pacificsw\LaravelInstaller\LaravelInstallerServiceProvider::class,
	];
```

Publish the packages views, config file, assets, and language files by running the following from your projects root folder:
```bash
php artisan vendor:publish --tag=laravel-installer
```

## Usage

Install Routes Notes

In order to install your application, go to the /install route and follow the instructions.
Once the installation has run the empty file installed will be placed into the /storage directory. If this file is present the route /install will abort to the 404 page.
Update Route Notes

In order to update your application, go to the /update route and follow the instructions.
The /update routes count how many migration files exist in the /database/migrations folder and compares that count against the migrations table. If the files count is greater then the /update route will render, otherwise, the page will abort to the 404 page.
Additional Files and folders published to your project :



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mohammad.arif9999@gmail.com instead of using the issue tracker.

## Credits

- [Prashant Shukla](https://github.com/prashant-shukla) 
- [Rachid Laasri](https://github.com/rashidlaasri) for core concept.
- [Irving](https://github.com/irvingv8) for Layout design.
- [All Contributors](../../contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
