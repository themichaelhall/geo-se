<?php
/**
 * This file is a part of the geo-se package.
 *
 * Read more at https://github.com/themichaelhall/geo-se
 */
declare(strict_types=1);

namespace MichaelHall\GeoSe\Exceptions;

/**
 * Exception used when a region could not be found.
 *
 * @since 1.0.0
 */
class RegionNotFoundException extends \OutOfBoundsException
{
}
