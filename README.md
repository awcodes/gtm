# Google Tag Manager for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/gtm.svg?style=flat-square)](https://packagist.org/packages/awcodes/gtm)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/gtm.svg?style=flat-square)](https://packagist.org/packages/awcodes/gtm)

Easy integration of Google Tag Manager into your Laravel application.

## Installation

You can install the package via composer:

```bash
composer require awcodes/gtm
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="gtm-config"
```

This is the contents of the published config file:

```php
return [
    'id' => env('GTM_ID', 'GTM-XXXXXX'),
    'enabled' => env('GTM_ENABLED', true),
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="gtm-views"
```

## Usage

1. Add your GTM_ID to your `.env` file
2. Simply add the blade components to your base layout files.

The `enabled` attribute is optional, but can be used to control the tags integration from blade files that extend the base layout. It accepts `true/false`. This can still be controlled globally via the `.env` file should you need to disable the integration global on different environments as well.

```html
<!-- Should be placed in the head -->
<x-gtm::script :enabled="$enabled" />

<!-- Should be placed after the opening body tag -->
<x-gtm::no-script :enabled="$enabled" />
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [awcodes](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
