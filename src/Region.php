<?php
/**
 * This file is a part of the geo-se package.
 *
 * Read more at https://github.com/themichaelhall/geo-se
 */
declare(strict_types=1);

namespace MichaelHall\GeoSe;

use MichaelHall\GeoSe\Exceptions\RegionNotFoundException;
use MichaelHall\GeoSe\Interfaces\RegionInterface;

/**
 * Class representing a swedish region (county).
 *
 * @since 1.0.0
 */
class Region implements RegionInterface
{
    /**
     * Returns the id.
     *
     * @since 1.0.0
     *
     * @return int The id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the name.
     *
     * @since 1.0.0
     *
     * @return string The name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the region as a string.
     *
     * @since 1.0.0
     *
     * @return string The region as a string.
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * Returns a region by id.
     *
     * @since 1.0.0
     *
     * @param int $id The id.
     *
     * @throws \MichaelHall\GeoSe\Exceptions\RegionNotFoundException If the region could not be found.
     *
     * @return RegionInterface The region.
     */
    public static function findById(int $id): RegionInterface
    {
        if (!isset(self::REGION_DATA[$id])) {
            throw new RegionNotFoundException('Could not find a region with id ' . $id . '.');
        }

        $data = self::REGION_DATA[$id];

        return new self($id, $data[0] . ' län');
    }

    /**
     * Constructs the region.
     *
     * @param int    $id   The id.
     * @param string $name The name.
     */
    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @var int My id.
     */
    private $id;

    /**
     * @var string My name.
     */
    private $name;

    /**
     * @var array My data.
     */
    private const REGION_DATA = [
        1  => ['Stockholms'],
        3  => ['Uppsala'],
        4  => ['Södermanlands'],
        5  => ['Östergötlands'],
        6  => ['Jönköpings'],
        7  => ['Kronobergs'],
        8  => ['Kalmar'],
        9  => ['Gotlands'],
        10 => ['Blekinge'],
        12 => ['Skåne'],
        13 => ['Hallands'],
        14 => ['Västra Götalands'],
        17 => ['Värmlands'],
        18 => ['Örebro'],
        19 => ['Västmanlands'],
        20 => ['Dalarnas'],
        21 => ['Gävleborgs'],
        22 => ['Västernorrlands'],
        23 => ['Jämtlands'],
        24 => ['Västerbottens'],
        25 => ['Norrbottens'],
    ];
}
