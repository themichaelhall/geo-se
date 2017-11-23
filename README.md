# Swedish geography data

[![Build Status](https://travis-ci.org/themichaelhall/geo-se.svg?branch=master)](https://travis-ci.org/themichaelhall/geo-se)
[![codecov.io](https://codecov.io/gh/themichaelhall/geo-se/coverage.svg?branch=master)](https://codecov.io/gh/themichaelhall/geo-se?branch=master)
[![StyleCI](https://styleci.io/repos/111851543/shield?style=flat)](https://styleci.io/repos/111851543)
[![License](https://poser.pugx.org/michaelhall/geo-se/license)](https://packagist.org/packages/michaelhall/geo-se)
[![Latest Stable Version](https://poser.pugx.org/michaelhall/geo-se/v/stable)](https://packagist.org/packages/michaelhall/geo-se)
[![Total Downloads](https://poser.pugx.org/michaelhall/geo-se/downloads)](https://packagist.org/packages/michaelhall/geo-se)

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