<?php

declare(strict_types=1);

namespace MichaelHall\GeoSe\Tests;

use MichaelHall\GeoSe\Region;
use PHPUnit\Framework\TestCase;

/**
 * Test Region class.
 */
class RegionTest extends TestCase
{
    /**
     * Test find non existing region by id.
     *
     * @expectedException \MichaelHall\GeoSe\Exceptions\RegionNotFoundException
     * @expectedExceptionMessage Could not find a region with id 0.
     */
    public function testFindNonExistingById()
    {
        Region::findById(0);
    }

    /**
     * Test findById method.
     *
     * @dataProvider findByIdDataProvider
     *
     * @param int    $expectedId   The expected id.
     * @param string $expectedName The expected name.
     */
    public function testFindById(int $expectedId, string $expectedName)
    {
        $region = Region::findById($expectedId);

        self::assertSame($expectedId, $region->getId());
        self::assertSame($expectedName, $region->getName());
        self::assertSame($expectedName, $region->__toString());
    }

    /**
     * Data provider for findById test.
     *
     * @return array The data.
     */
    public function findByIdDataProvider(): array
    {
        return [
            [1, 'Stockholms län'],
            [3, 'Uppsala län'],
            [4, 'Södermanlands län'],
            [5, 'Östergötlands län'],
            [6, 'Jönköpings län'],
            [7, 'Kronobergs län'],
            [8, 'Kalmar län'],
            [9, 'Gotlands län'],
            [10, 'Blekinge län'],
            [12, 'Skåne län'],
            [13, 'Hallands län'],
            [14, 'Västra Götalands län'],
            [17, 'Värmlands län'],
            [18, 'Örebro län'],
            [19, 'Västmanlands län'],
            [20, 'Dalarnas län'],
            [21, 'Gävleborgs län'],
            [22, 'Västernorrlands län'],
            [23, 'Jämtlands län'],
            [24, 'Västerbottens län'],
            [25, 'Norrbottens län'],
        ];
    }
}
