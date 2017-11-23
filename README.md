# Swedish geography data

Classes for swedish geography data.

## Requirements

- PHP >= 7.1

## Install with composer

``` bash
$ composer require "michaelhall/geo-se:~1.0"
```

## Basic usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// Find a region by id.
$region = MichaelHall\GeoSe\Region::findById(1);

// Prints "Stockholms län".
echo $region->getName();

// Also prints "Stockholms län".
echo $region;

// Find a municipality by id.
$municipality = MichaelHall\GeoSe\Municipality::findById(1480);

// Prints "Göteborgs kommun".
echo $municipality->getName();

// Also prints "Göteborgs kommun".
echo $municipality;

// Prints "Västra Götalands län".
echo $municipality->getRegion()->getName();

// Throws a MichaelHall\GeoSe\Exceptions\RegionNotFoundException.
MichaelHall\GeoSe\Region::findById(123);

// Throws a MichaelHall\GeoSe\Exceptions\MunicipalityNotFoundException.
MichaelHall\GeoSe\Municipality::findById(4567);
```

## License

MIT