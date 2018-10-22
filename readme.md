# laravel-localizer

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/naoray/laravel-localizer.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/naoray/laravel-localizer.svg?style=flat-square)](https://packagist.org/packages/naoray/laravel-localizer)

## Install
`composer require naoray/laravel-localizer`

## Usage
Add `allowed_locales` array to your `app` config with all allowed locales.

```php
'allowed_locales' => ['en', 'de']
```

### Use Localizer in middleware
Add `localize` middleware to your web route in the `RouteServiceProvider`

```php
//...
protected function mapWebRoutes()
{
    Route::middleware(['web', 'localize'])
          ->namespace($this->namespace)
          ->group(base_path('routes/web.php'));
}
```

Or simply add it as a middleware to your route groups.

### Using Localizer in view
Add `Localizer` Facade to `app` config.

```blade
@foreach (Localizer::allowedLanguages() as $locale)
  <a href="{{ route('setLocale', ['locale' => $locale]) }}">{{ strtoupper($locale)}}</a>
@endforeach
```

## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security-related issues, please email DummyAuthorEmail instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.