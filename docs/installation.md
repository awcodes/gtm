---
title: Installation
description: Install the package, publish the config file, and set your Google Tag Manager container ID.
---

# Installation

## Requirements

- PHP 8.2 or higher

## Install the package

```bash
composer require awcodes/gtm
```

The service provider is registered automatically through Laravel's package discovery.

## Publish the config

```bash
php artisan vendor:publish --tag="gtm-config"
```

This writes `config/gtm.php`:

```php
return [
    'id' => env('GTM_ID', 'GTM-XXXXXX'),
    'enabled' => env('GTM_ENABLED', true),
];
```

Publishing is optional. Without it the package uses its own copy of the file, which reads the same two environment variables — so setting `GTM_ID` alone is enough to get running. Publish when you want to change the defaults or read the values from somewhere other than the environment.

## Set your container ID

Add your container ID to `.env`:

```dotenv
GTM_ID=GTM-ABC1234
```

The default of `GTM-XXXXXX` is a placeholder, not a working container. Until you replace it, the components render tags pointing at an ID that does not exist.

> [!NOTE]
> `enabled` defaults to `true`, so tracking is active as soon as a container ID is set. Add `GTM_ENABLED=false` to environments that should not report — typically local and staging.

## Publish the views

The component markup can be published if you need to change it:

```bash
php artisan vendor:publish --tag="gtm-views"
```

This is only necessary for customizing the rendered tags. Most applications never need it.

Continue to [Usage](usage.md) to place the components in your layout.
