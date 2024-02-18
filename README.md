# This package adds Zoho Desk API support to Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/navari/laravel-zoho-desk.svg?style=flat-square)](https://packagist.org/packages/navari/laravel-zoho-desk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/navari/laravel-zoho-desk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/navari/laravel-zoho-desk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/navari/laravel-zoho-desk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/navari/laravel-zoho-desk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/navari/laravel-zoho-desk.svg?style=flat-square)](https://packagist.org/packages/navari/laravel-zoho-desk)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-zoho-desk.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-zoho-desk)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require navari/laravel-zoho-desk
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-zoho-desk-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-zoho-desk-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-zoho-desk-views"
```

## Usage

```php
$zohoDesk = new Navari\ZohoDesk();
echo $zohoDesk->echoPhrase('Hello, Navari!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Larus Navari](https://github.com/Navari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
