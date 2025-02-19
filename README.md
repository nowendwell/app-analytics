# Track your Laravel application usage

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nowendwell/app-analytics.svg?style=flat-square)](https://packagist.org/packages/nowendwell/app-analytics)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/nowendwell/app-analytics/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/nowendwell/app-analytics/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/nowendwell/app-analytics/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/nowendwell/app-analytics/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nowendwell/app-analytics.svg?style=flat-square)](https://packagist.org/packages/nowendwell/app-analytics)

Track usage analytics for your Laravel application.

## Installation

You can install the package via composer:

```bash
composer require nowendwell/app-analytics
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="app-analytics-config"
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="app-analytics-migrations"
php artisan migrate
```

## Usage

Simply add the included middleware `\Nowendwell\AppAnalytics\Middleware\TrackAnalyticsMiddleware` to your Http Kernel middleware list and let the package do the rest.

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Nowendwell\AppAnalytics\Middleware\TrackAnalyticsMiddleware::class,
    ],
```

If you want to keep track of your own custom events, outside of the default page view tracking, you can use the `TrackEvent` facade.

```php
use Nowendwell\AppAnalytics\Facades\AppAnalytics;

class InvoicePaymentController extends Controller
{
    public function store(Invoice $invoice): RedirectResponse
    {
        // Track a custom event
        AppAnalytics::event('Invoice Paid', ['invoice_id' => 123, 'amount' => 1000]);

        return response()->redirect(route('invoices.show', $invoice));
    }
}
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

- [Ben Miller](https://github.com/nowendwell)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
