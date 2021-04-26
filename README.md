# Laravel map

[![Latest Version on Packagist](https://img.shields.io/packagist/v/larswiegers/laravel-maps.svg?style=flat-square)](https://packagist.org/packages/larswiegers/laravel-maps)
[![Total Downloads](https://img.shields.io/packagist/dt/larswiegers/laravel-maps.svg?style=flat-square)](https://packagist.org/packages/larswiegers/laravel-maps)
![GitHub Actions](https://github.com/larswiegers/laravel-maps/actions/workflows/main.yml/badge.svg)

This package allows you to easily use leaflet.js to create a map in your laravel project.

## Installation

You can install the package via composer:

```bash
composer require larswiegers/laravel-maps
```

## Usage

```blade
// A basic map is as easy as using the x blade component.

<x-maps-leaflet></x-maps-leaflet>

// set the centerpoint of the map:
<x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-leaflet>

// set a zoomlevel:
<x-maps-leaflet :zoomLevel="6"></x-maps-leaflet>

// markers
<x-maps-leaflet :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091]]"></x-maps-leaflet>

```

### Testing
To run the tests just use the following component:
```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email larswiegers@live.nl instead of using the issue tracker.

## Credits

-   [Lars Wiegers](https://github.com/larswiegers)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

