# Laravel maps

[![Latest Version on Packagist](https://img.shields.io/packagist/v/larswiegers/laravel-maps.svg?style=flat-square)](https://packagist.org/packages/larswiegers/laravel-maps)
[![Total Downloads](https://img.shields.io/packagist/dt/larswiegers/laravel-maps.svg?style=flat-square)](https://packagist.org/packages/larswiegers/laravel-maps)
![GitHub Actions](https://github.com/larswiegers/laravel-maps/actions/workflows/main.yml/badge.svg)

![Laravel maps](https://banners.beyondco.de/Laravel%20Maps.png?theme=light&packageManager=composer+require&packageName=larswiegers%2Flaravel-maps&pattern=architect&style=style_1&description=The+easiest+way+to+use+maps+in+your+laravel+app.+&md=1&showWatermark=0&fontSize=100px&images=map&widths=500&heights=500)

This package allows you to easily use leaflet.js or google maps to create a map in your laravel project.

## Installation

You can install the package via composer:

```bash
composer require larswiegers/laravel-maps
```

If you want to customize the map views more then you can publish the views:

```bash
php artisan vendor:publish --provider="Larswiegers\LaravelMaps\LaravelMapsServiceProvider"
```

## Supported map types
| What        | Basic map | Different map types | Centerpoint | Basic markers | Use bounds | Zoomlevel | Can use different tiles | Can be used multiple times on the same page |
| ----------- | :-------: | :-----------------: | :---------: | :-----------: | :--------: | :-------: | :---------------------: | :------------------------------------------ |
| Leaflet     |     ✅     |          ❌          |      ✅      |       ✅       |     ❌      |     ✅     |            ✅            | ✅                                           |
| Google maps |     ✅     |          ✅          |      ✅      |       ✅       |     ✅      |     ✅     |            ✅            | ❌                                           |

#### Tilehosts
##### Openstreetmap
Openstreetmap is a creative commence tile library created by volunteers.
No configuration has to be set to use as it is the default tilehost for this library.
More information can be found here: [openstreetmap.org](https://www.openstreetmap.org)

##### Mapbox
Mapbox is a for profit company that also offers free keys.
Their map can be more accurate / precise.
To get your free key go to [mapbox.com](https://account.mapbox.com/auth/signup/)
Once logged in you can get your free key and use it by placing it in the env file like this ``MAPS_MAPBOX_ACCESS_TOKEN``.

##### Attribution
Mapbox requires you to have attribution when you use their tilehost. More information on that here: https://docs.mapbox.com/help/getting-started/attribution/ 
We provide a default value if you use mapbox. But if you want to customize it you can pass in the te text via the attribution attribute. Like this:
```
<x-maps-leaflet 
    :attribution="Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>">
</x-maps-leaflet>
```
## Usage
### Leaflet

```blade
// Leaflet
// A basic map is as easy as using the x blade component.

<x-maps-leaflet></x-maps-leaflet>

// Set the centerpoint of the map:
<x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-leaflet>

// Set a zoomlevel:
<x-maps-leaflet :zoomLevel="6"></x-maps-leaflet>

// Set markers on the map:
<x-maps-leaflet :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091]]"></x-maps-leaflet>
```
Do note that if you want to use multiple maps on the same page that you need to specify an id per map.

#### Leaflet Version
By default we use the latest version of leaflet, but if you want to use a different version just pass it in via a parameter:
```blade
// Set leafletVersion to desired version:
<x-maps-leaflet leafletVersion='1.9.4'></x-maps-leaflet>
```
### Google Maps
``` blade
// Google Maps

// Set the centerpoint of the map:
<x-maps-google :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-google>

// Set a zoomlevel:
<x-maps-google :zoomLevel="6"></x-maps-google>

// Set type of the map (roadmap, satellite, hybrid, terrain):
<x-maps-google :mapType="'hybrid'"></x-maps-google>

// Set markers on the map:
<x-maps-google :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091]]"></x-maps-google>

// You can customize the title for each markers:
<x-maps-google :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091, 'title' => 'Your Title']]"></x-maps-google>

// Automatically adjust the map's view during initialization to encompass all markers:
<x-maps-google
    :markers="[
        ['lat' => 46.056946, 'long' => 14.505752],
        ['lat' => 41.902782, 'long' => 12.496365]
    ]"            
    :fitToBounds="true"
></x-maps-google>

// Position the map's center at the geometric midpoint of all markers:
<x-maps-google
    :markers="[
        ['lat' => 46.056946, 'long' => 14.505752],
        ['lat' => 41.902782, 'long' => 12.496365]
    ]"            
    :centerToBoundsCenter="true"
    :zoomLevel="7"
></x-maps-google>
```
#### Google maps api key
You can get an api key here:
![console.cloud.google.com](https://console.cloud.google.com/project/_/apiui/credential)
Create an api key and enable the Maps Javascript API in the console aswell.
Place the api key in the env file like this ``MAPS_GOOGLE_MAPS_ACCESS_TOKEN``

### Good to know
Double quotes need to be escaped, i.e. add a backslash followed by double quotes (/")

### Usage in livewire
This library does not support livewire out of the box, but some users have found a workaround to work. 
Please see this issue for more information: https://github.com/LarsWiegers/laravel-maps/issues/34

Feel free to PR a livewire component if you have the time.
### Testing
To run the tests just use the following component:
```bash
composer test
```

Testing is done through rendering the blade components and making assertions on the html outputted. 
While this is great for initial testing it does lack some more certainty. In the future an browser test may be needed to further make sure that the code works as intended. 

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
