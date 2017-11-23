<?php
/**
 * This file is a part of the geo-se package.
 *
 * Read more at https://github.com/themichaelhall/geo-se
 */
declare(strict_types=1);

namespace MichaelHall\GeoSe\Interfaces;

/**
 * Interface representing a swedish municipality.
 *
 * @since 1.0.0
 */
interface MunicipalityInterface
{
    /**
     * Returns the id.
     *
     * @since 1.0.0
     *
     * @return int The id.
     */
    public function getId(): int;

    /**
     * Returns the name.
     *
     * @since 1.0.0
     *
     * @return string The name.
     */
    public function getName(): string;

    /**
     * Returns the region.
     *
     * @since 1.0.0
     *
     * @return RegionInterface The region.
     */
    public function getRegion(): RegionInterface;

    /**
     * Returns the municipality as a string.
     *
     * @since 1.0.0
     *
     * @return string The municipality as a string.
     */
    public function __toString(): string;
}
