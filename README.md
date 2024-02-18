# This package adds Zoho Desk API support to Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/navari/laravel-zoho-desk.svg?style=flat-square)](https://packagist.org/packages/navari/laravel-zoho-desk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/navari/laravel-zoho-desk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/navari/laravel-zoho-desk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/navari/laravel-zoho-desk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/navari/laravel-zoho-desk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/navari/laravel-zoho-desk.svg?style=flat-square)](https://packagist.org/packages/navari/laravel-zoho-desk)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require navari/laravel-zoho-desk
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-zoho-desk-config"
```

This is the contents of the published config file:

```php
return [
    'organizationId' => env('ZOHO_DESK_ORGANIZATION_ID', ''),
    'departmentId' => env('ZOHO_DESK_DEPARTMENT_ID', ''),
    'clientId' => env('ZOHO_DESK_CLIENT_ID', ''),
    'clientSecret' => env('ZOHO_DESK_CLIENT_SECRET', ''),
    'oAuthBaseUrl' => env('ZOHO_DESK_OAUTH_BASE_URL', ''),
    'refreshToken' => env('ZOHO_DESK_REFRESH_TOKEN', ''),
    'baseApiUrl' => env('ZOHO_DESK_BASE_API_URL', 'https://desk.zoho.com/api/v1/'),
    'agentEmail' => env('ZOHO_DESK_AGENT_EMAIL', ''),
];
```

## Usage

```php
$createTicketEntity = new \Navari\ZohoDesk\Entities\CreateTicketEntity();

$createTicketEntity->firstName = 'Larus';
$createTicketEntity->lastName = 'Navari';
$createTicketEntity->email = 'larustr@gmail.com';
$createTicketEntity->subject = 'Test Ticket';
$createTicketEntity->departmentId = '123456789';
$createTicketEntity->message = 'This is a test ticket';
$ticket = \Navari\ZohoDesk\ZohoDesk::createTicket($createTicketEntity);
```

## Usage for other methods
All methods usage will be similar to the above example


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
