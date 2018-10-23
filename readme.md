# laravel-localizer

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://travis-ci.org/Naoray/laravel-localizer.svg?branch=master)]()
[![Total Downloads](https://img.shields.io/packagist/dt/naoray/laravel-localizer.svg?style=flat-square)](https://packagist.org/packages/naoray/laravel-localizer)

This package is using [codezero/laravel-localizer](https://github.com/codezero-be/laravel-localizer) behind the scenes and extends its functionality to include:
- add Route `localizer::setLocale` for changing locales
- add Carbon store to get localized timestamps
- add Facade to use `allowedLocales()` method in views

## Install
`composer require naoray/laravel-localizer`

Publish config with `php artisan vendor:publish --provider="CodeZero\Localizer\LocalizerServiceProvider" --tag="config"`

## Usage
### Add Supported Locales
Edit `supported-locales` array of the `localizer` config to include all allowed locales.

```php
'supported-locales' => ['en', 'de']
```

### Add Carbon Store
Add `\Naoray\LaravelLocalizer\Stores\CarbonStore::class` to `localizerstores` to enable the carbon store and sync current locale with carbon locale.

```php
'stores' => [
  CodeZero\Localizer\Stores\SessionStore::class,
  CodeZero\Localizer\Stores\CookieStore::class,
  CodeZero\Localizer\Stores\AppStore::class,
  Naoray\LaravelLocalizer\Stores\CarbonStore::class,
],
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

### Add Change Locale routes in view
Add `Localizer` Facade to `app` config.

```php
//...
'Localizer' => Naoray\LaravelLocalizer\Facades\LocalizerFacade::class,
```

In the view you can use `allowedLocales()` to get all allowed locales in the view.

```blade
@foreach (Localizer::allowedLocales() as $locale)
  <a href="{{ route('localizer::setLocale', ['locale' => $locale]) }}">{{ strtoupper($locale)}}</a>
@endforeach
```

### Extend Functionalities
You can add new `stores` and `detectors` by implementing the corresponding interface. For more info visit [codezero/laravel-localizer](https://github.com/codezero-be/laravel-localizer#drivers)

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