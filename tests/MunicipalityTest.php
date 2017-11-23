<?php

declare(strict_types=1);

namespace MichaelHall\GeoSe\Tests;

use MichaelHall\GeoSe\Municipality;
use PHPUnit\Framework\TestCase;

/**
 * Test Municipality class.
 */
class MunicipalityTest extends TestCase
{
    /**
     * Test find non existing municipality by id.
     *
     * @expectedException \MichaelHall\GeoSe\Exceptions\MunicipalityNotFoundException
     * @expectedExceptionMessage Could not find a municipality with id 0.
     */
    public function testFindNonExistingById()
    {
        Municipality::findById(0);
    }

    /**
     * Test findById method.
     *
     * @dataProvider findByIdDataProvider
     *
     * @param int    $expectedId         The expected id.
     * @param string $expectedName       The expected name.
     * @param int    $expectedRegionId   The region id.
     * @param string $expectedRegionName The region name.
     */
    public function testFindById(int $expectedId, string $expectedName, int $expectedRegionId, string $expectedRegionName)
    {
        $municipality = Municipality::findById($expectedId);

        self::assertSame($expectedId, $municipality->getId());
        self::assertSame($expectedName, $municipality->getName());
        self::assertSame($expectedName, $municipality->__toString());
        self::assertSame($expectedRegionId, $municipality->getRegion()->getId());
        self::assertSame($expectedRegionName, $municipality->getRegion()->getName());
        self::assertSame(intval($municipality->getId() / 100), $municipality->getRegion()->getId());
    }

    /**
     * Data provider for findById test.
     *
     * @return array The data.
     */
    public function findByIdDataProvider(): array
    {
        return [
            // 1xx Stockholms län.
            [114, 'Upplands Väsby kommun', 1, 'Stockholms län'],
            [115, 'Vallentuna kommun', 1, 'Stockholms län'],
            [117, 'Österåkers kommun', 1, 'Stockholms län'],
            [120, 'Värmdö kommun', 1, 'Stockholms län'],
            [123, 'Järfälla kommun', 1, 'Stockholms län'],
            [125, 'Ekerö kommun', 1, 'Stockholms län'],
            [126, 'Huddinge kommun', 1, 'Stockholms län'],
            [127, 'Botkyrka kommun', 1, 'Stockholms län'],
            [128, 'Salems kommun', 1, 'Stockholms län'],
            [136, 'Haninge kommun', 1, 'Stockholms län'],
            [138, 'Tyresö kommun', 1, 'Stockholms län'],
            [139, 'Upplands-Bro kommun', 1, 'Stockholms län'],
            [140, 'Nykvarns kommun', 1, 'Stockholms län'],
            [160, 'Täby kommun', 1, 'Stockholms län'],
            [162, 'Danderyds kommun', 1, 'Stockholms län'],
            [163, 'Sollentuna kommun', 1, 'Stockholms län'],
            [180, 'Stockholms kommun', 1, 'Stockholms län'],
            [181, 'Södertälje kommun', 1, 'Stockholms län'],
            [182, 'Nacka kommun', 1, 'Stockholms län'],
            [183, 'Sundbybergs kommun', 1, 'Stockholms län'],
            [184, 'Solna kommun', 1, 'Stockholms län'],
            [186, 'Lidingö kommun', 1, 'Stockholms län'],
            [187, 'Vaxholms kommun', 1, 'Stockholms län'],
            [188, 'Norrtälje kommun', 1, 'Stockholms län'],
            [191, 'Sigtuna kommun', 1, 'Stockholms län'],
            [192, 'Nynäshamns kommun', 1, 'Stockholms län'],

            // 3xx Uppsala län.
            [305, 'Håbo kommun', 3, 'Uppsala län'],
            [319, 'Älvkarleby kommun', 3, 'Uppsala län'],
            [330, 'Knivsta kommun', 3, 'Uppsala län'],
            [331, 'Heby kommun', 3, 'Uppsala län'],
            [360, 'Tierps kommun', 3, 'Uppsala län'],
            [380, 'Uppsala kommun', 3, 'Uppsala län'],
            [381, 'Enköpings kommun', 3, 'Uppsala län'],
            [382, 'Östhammars kommun', 3, 'Uppsala län'],

            // 4xx Södermanlands län.
            [428, 'Vingåkers kommun', 4, 'Södermanlands län'],
            [461, 'Gnesta kommun', 4, 'Södermanlands län'],
            [480, 'Nyköpings kommun', 4, 'Södermanlands län'],
            [481, 'Oxelösunds kommun', 4, 'Södermanlands län'],
            [482, 'Flens kommun', 4, 'Södermanlands län'],
            [483, 'Katrineholms kommun', 4, 'Södermanlands län'],
            [484, 'Eskilstuna kommun', 4, 'Södermanlands län'],
            [486, 'Strängnäs kommun', 4, 'Södermanlands län'],
            [488, 'Trosa kommun', 4, 'Södermanlands län'],

            // 5xx Östergötlands län.
            [509, 'Ödeshögs kommun', 5, 'Östergötlands län'],
            [512, 'Ydre kommun', 5, 'Östergötlands län'],
            [513, 'Kinda kommun', 5, 'Östergötlands län'],
            [560, 'Boxholms kommun', 5, 'Östergötlands län'],
            [561, 'Åtvidabergs kommun', 5, 'Östergötlands län'],
            [562, 'Finspångs kommun', 5, 'Östergötlands län'],
            [563, 'Valdemarsviks kommun', 5, 'Östergötlands län'],
            [580, 'Linköpings kommun', 5, 'Östergötlands län'],
            [581, 'Norrköpings kommun', 5, 'Östergötlands län'],
            [582, 'Söderköpings kommun', 5, 'Östergötlands län'],
            [583, 'Motala kommun', 5, 'Östergötlands län'],
            [584, 'Vadstena kommun', 5, 'Östergötlands län'],
            [586, 'Mjölby kommun', 5, 'Östergötlands län'],

            // 6xx Jönköpings län.
            [604, 'Aneby kommun', 6, 'Jönköpings län'],
            [617, 'Gnosjö kommun', 6, 'Jönköpings län'],
            [642, 'Mullsjö kommun', 6, 'Jönköpings län'],
            [643, 'Habo kommun', 6, 'Jönköpings län'],
            [662, 'Gislaveds kommun', 6, 'Jönköpings län'],
            [665, 'Vaggeryds kommun', 6, 'Jönköpings län'],
            [680, 'Jönköpings kommun', 6, 'Jönköpings län'],
            [682, 'Nässjö kommun', 6, 'Jönköpings län'],
            [683, 'Värnamo kommun', 6, 'Jönköpings län'],
            [684, 'Sävsjö kommun', 6, 'Jönköpings län'],
            [685, 'Vetlanda kommun', 6, 'Jönköpings län'],
            [686, 'Eksjö kommun', 6, 'Jönköpings län'],
            [687, 'Tranås kommun', 6, 'Jönköpings län'],

            // 7xx Kronobergs län.
            [760, 'Uppvidinge kommun', 7, 'Kronobergs län'],
            [761, 'Lessebo kommun', 7, 'Kronobergs län'],
            [763, 'Tingsryds kommun', 7, 'Kronobergs län'],
            [764, 'Alvesta kommun', 7, 'Kronobergs län'],
            [765, 'Älmhults kommun', 7, 'Kronobergs län'],
            [767, 'Markaryds kommun', 7, 'Kronobergs län'],
            [780, 'Växjö kommun', 7, 'Kronobergs län'],
            [781, 'Ljungby kommun', 7, 'Kronobergs län'],

            // 8xx Kalmar län.
            [821, 'Högsby kommun', 8, 'Kalmar län'],
            [834, 'Torsås kommun', 8, 'Kalmar län'],
            [840, 'Mörbylånga kommun', 8, 'Kalmar län'],
            [860, 'Hultsfreds kommun', 8, 'Kalmar län'],
            [861, 'Mönsterås kommun', 8, 'Kalmar län'],
            [862, 'Emmaboda kommun', 8, 'Kalmar län'],
            [880, 'Kalmar kommun', 8, 'Kalmar län'],
            [881, 'Nybro kommun', 8, 'Kalmar län'],
            [882, 'Oskarshamns kommun', 8, 'Kalmar län'],
            [883, 'Västerviks kommun', 8, 'Kalmar län'],
            [884, 'Vimmerby kommun', 8, 'Kalmar län'],
            [885, 'Borgholms kommun', 8, 'Kalmar län'],

            // 9xx Gotlands län.
            [980, 'Gotlands kommun', 9, 'Gotlands län'],

            // 10xx Blekinge län.
            [1060, 'Olofströms kommun', 10, 'Blekinge län'],
            [1080, 'Karlskrona kommun', 10, 'Blekinge län'],
            [1081, 'Ronneby kommun', 10, 'Blekinge län'],
            [1082, 'Karlshamns kommun', 10, 'Blekinge län'],
            [1083, 'Sölvesborgs kommun', 10, 'Blekinge län'],

            // 12xx Skåne län.
            [1214, 'Svalövs kommun', 12, 'Skåne län'],
            [1230, 'Staffanstorps kommun', 12, 'Skåne län'],
            [1231, 'Burlövs kommun', 12, 'Skåne län'],
            [1233, 'Vellinge kommun', 12, 'Skåne län'],
            [1256, 'Östra Göinge kommun', 12, 'Skåne län'],
            [1257, 'Örkelljunga kommun', 12, 'Skåne län'],
            [1260, 'Bjuvs kommun', 12, 'Skåne län'],
            [1261, 'Kävlinge kommun', 12, 'Skåne län'],
            [1262, 'Lomma kommun', 12, 'Skåne län'],
            [1263, 'Svedala kommun', 12, 'Skåne län'],
            [1264, 'Skurups kommun', 12, 'Skåne län'],
            [1265, 'Sjöbo kommun', 12, 'Skåne län'],
            [1266, 'Hörby kommun', 12, 'Skåne län'],
            [1267, 'Höörs kommun', 12, 'Skåne län'],
            [1270, 'Tomelilla kommun', 12, 'Skåne län'],
            [1272, 'Bromölla kommun', 12, 'Skåne län'],
            [1273, 'Osby kommun', 12, 'Skåne län'],
            [1275, 'Perstorps kommun', 12, 'Skåne län'],
            [1276, 'Klippans kommun', 12, 'Skåne län'],
            [1277, 'Åstorps kommun', 12, 'Skåne län'],
            [1278, 'Båstads kommun', 12, 'Skåne län'],
            [1280, 'Malmö kommun', 12, 'Skåne län'],
            [1281, 'Lunds kommun', 12, 'Skåne län'],
            [1282, 'Landskrona kommun', 12, 'Skåne län'],
            [1283, 'Helsingborgs kommun', 12, 'Skåne län'],
            [1284, 'Höganäs kommun', 12, 'Skåne län'],
            [1285, 'Eslövs kommun', 12, 'Skåne län'],
            [1286, 'Ystads kommun', 12, 'Skåne län'],
            [1287, 'Trelleborgs kommun', 12, 'Skåne län'],
            [1290, 'Kristianstads kommun', 12, 'Skåne län'],
            [1291, 'Simrishamns kommun', 12, 'Skåne län'],
            [1292, 'Ängelholms kommun', 12, 'Skåne län'],
            [1293, 'Hässleholms kommun', 12, 'Skåne län'],

            // 13xx Hallands län.
            [1315, 'Hylte kommun', 13, 'Hallands län'],
            [1380, 'Halmstads kommun', 13, 'Hallands län'],
            [1381, 'Laholms kommun', 13, 'Hallands län'],
            [1382, 'Falkenbergs kommun', 13, 'Hallands län'],
            [1383, 'Varbergs kommun', 13, 'Hallands län'],
            [1384, 'Kungsbacka kommun', 13, 'Hallands län'],

            // 14xx Västra Götalands län.
            [1401, 'Härryda kommun', 14, 'Västra Götalands län'],
            [1402, 'Partille kommun', 14, 'Västra Götalands län'],
            [1407, 'Öckerö kommun', 14, 'Västra Götalands län'],
            [1415, 'Stenungsunds kommun', 14, 'Västra Götalands län'],
            [1419, 'Tjörns kommun', 14, 'Västra Götalands län'],
            [1421, 'Orusts kommun', 14, 'Västra Götalands län'],
            [1427, 'Sotenäs kommun', 14, 'Västra Götalands län'],
            [1430, 'Munkedals kommun', 14, 'Västra Götalands län'],
            [1435, 'Tanums kommun', 14, 'Västra Götalands län'],
            [1438, 'Dals-Eds kommun', 14, 'Västra Götalands län'],
            [1439, 'Färgelanda kommun', 14, 'Västra Götalands län'],
            [1440, 'Ale kommun', 14, 'Västra Götalands län'],
            [1441, 'Lerums kommun', 14, 'Västra Götalands län'],
            [1442, 'Vårgårda kommun', 14, 'Västra Götalands län'],
            [1443, 'Bollebygds kommun', 14, 'Västra Götalands län'],
            [1444, 'Grästorps kommun', 14, 'Västra Götalands län'],
            [1445, 'Essunga kommun', 14, 'Västra Götalands län'],
            [1446, 'Karlsborgs kommun', 14, 'Västra Götalands län'],
            [1447, 'Gullspångs kommun', 14, 'Västra Götalands län'],
            [1452, 'Tranemo kommun', 14, 'Västra Götalands län'],
            [1460, 'Bengtsfors kommun', 14, 'Västra Götalands län'],
            [1461, 'Melleruds kommun', 14, 'Västra Götalands län'],
            [1462, 'Lilla Edets kommun', 14, 'Västra Götalands län'],
            [1463, 'Marks kommun', 14, 'Västra Götalands län'],
            [1465, 'Svenljunga kommun', 14, 'Västra Götalands län'],
            [1466, 'Herrljunga kommun', 14, 'Västra Götalands län'],
            [1470, 'Vara kommun', 14, 'Västra Götalands län'],
            [1471, 'Götene kommun', 14, 'Västra Götalands län'],
            [1472, 'Tibro kommun', 14, 'Västra Götalands län'],
            [1473, 'Töreboda kommun', 14, 'Västra Götalands län'],
            [1480, 'Göteborgs kommun', 14, 'Västra Götalands län'],
            [1481, 'Mölndals kommun', 14, 'Västra Götalands län'],
            [1482, 'Kungälvs kommun', 14, 'Västra Götalands län'],
            [1484, 'Lysekils kommun', 14, 'Västra Götalands län'],
            [1485, 'Uddevalla kommun', 14, 'Västra Götalands län'],
            [1486, 'Strömstads kommun', 14, 'Västra Götalands län'],
            [1487, 'Vänersborgs kommun', 14, 'Västra Götalands län'],
            [1488, 'Trollhättans kommun', 14, 'Västra Götalands län'],
            [1489, 'Alingsås kommun', 14, 'Västra Götalands län'],
            [1490, 'Borås kommun', 14, 'Västra Götalands län'],
            [1491, 'Ulricehamns kommun', 14, 'Västra Götalands län'],
            [1492, 'Åmåls kommun', 14, 'Västra Götalands län'],
            [1493, 'Mariestads kommun', 14, 'Västra Götalands län'],
            [1494, 'Lidköpings kommun', 14, 'Västra Götalands län'],
            [1495, 'Skara kommun', 14, 'Västra Götalands län'],
            [1496, 'Skövde kommun', 14, 'Västra Götalands län'],
            [1497, 'Hjo kommun', 14, 'Västra Götalands län'],
            [1498, 'Tidaholms kommun', 14, 'Västra Götalands län'],
            [1499, 'Falköpings kommun', 14, 'Västra Götalands län'],

            // 17xx Värmlands län.
            [1715, 'Kils kommun', 17, 'Värmlands län'],
            [1730, 'Eda kommun', 17, 'Värmlands län'],
            [1737, 'Torsby kommun', 17, 'Värmlands län'],
            [1760, 'Storfors kommun', 17, 'Värmlands län'],
            [1761, 'Hammarö kommun', 17, 'Värmlands län'],
            [1762, 'Munkfors kommun', 17, 'Värmlands län'],
            [1763, 'Forshaga kommun', 17, 'Värmlands län'],
            [1764, 'Grums kommun', 17, 'Värmlands län'],
            [1765, 'Årjängs kommun', 17, 'Värmlands län'],
            [1766, 'Sunne kommun', 17, 'Värmlands län'],
            [1780, 'Karlstads kommun', 17, 'Värmlands län'],
            [1781, 'Kristinehamns kommun', 17, 'Värmlands län'],
            [1782, 'Filipstads kommun', 17, 'Värmlands län'],
            [1783, 'Hagfors kommun', 17, 'Värmlands län'],
            [1784, 'Arvika kommun', 17, 'Värmlands län'],
            [1785, 'Säffle kommun', 17, 'Värmlands län'],

            // 18xx Örebro län.
            [1814, 'Lekebergs kommun', 18, 'Örebro län'],
            [1860, 'Laxå kommun', 18, 'Örebro län'],
            [1861, 'Hallsbergs kommun', 18, 'Örebro län'],
            [1862, 'Degerfors kommun', 18, 'Örebro län'],
            [1863, 'Hällefors kommun', 18, 'Örebro län'],
            [1864, 'Ljusnarsbergs kommun', 18, 'Örebro län'],
            [1880, 'Örebro kommun', 18, 'Örebro län'],
            [1881, 'Kumla kommun', 18, 'Örebro län'],
            [1882, 'Askersunds kommun', 18, 'Örebro län'],
            [1883, 'Karlskoga kommun', 18, 'Örebro län'],
            [1884, 'Nora kommun', 18, 'Örebro län'],
            [1885, 'Lindesbergs kommun', 18, 'Örebro län'],

            // 19xx Västmanlands län.
            [1904, 'Skinnskattebergs kommun', 19, 'Västmanlands län'],
            [1907, 'Surahammars kommun', 19, 'Västmanlands län'],
            [1960, 'Kungsörs kommun', 19, 'Västmanlands län'],
            [1961, 'Hallstahammars kommun', 19, 'Västmanlands län'],
            [1962, 'Norbergs kommun', 19, 'Västmanlands län'],
            [1980, 'Västerås kommun', 19, 'Västmanlands län'],
            [1981, 'Sala kommun', 19, 'Västmanlands län'],
            [1982, 'Fagersta kommun', 19, 'Västmanlands län'],
            [1983, 'Köpings kommun', 19, 'Västmanlands län'],
            [1984, 'Arboga kommun', 19, 'Västmanlands län'],

            // 20xx Dalarnas län.
            [2021, 'Vansbro kommun', 20, 'Dalarnas län'],
            [2023, 'Malung-Sälens kommun', 20, 'Dalarnas län'],
            [2026, 'Gagnefs kommun', 20, 'Dalarnas län'],
            [2029, 'Leksands kommun', 20, 'Dalarnas län'],
            [2031, 'Rättviks kommun', 20, 'Dalarnas län'],
            [2034, 'Orsa kommun', 20, 'Dalarnas län'],
            [2039, 'Älvdalens kommun', 20, 'Dalarnas län'],
            [2061, 'Smedjebackens kommun', 20, 'Dalarnas län'],
            [2062, 'Mora kommun', 20, 'Dalarnas län'],
            [2080, 'Falu kommun', 20, 'Dalarnas län'],
            [2081, 'Borlänge kommun', 20, 'Dalarnas län'],
            [2082, 'Säters kommun', 20, 'Dalarnas län'],
            [2083, 'Hedemora kommun', 20, 'Dalarnas län'],
            [2084, 'Avesta kommun', 20, 'Dalarnas län'],
            [2085, 'Ludvika kommun', 20, 'Dalarnas län'],

            // 21xx Gävleborgs län.
            [2101, 'Ockelbo kommun', 21, 'Gävleborgs län'],
            [2104, 'Hofors kommun', 21, 'Gävleborgs län'],
            [2121, 'Ovanåkers kommun', 21, 'Gävleborgs län'],
            [2132, 'Nordanstigs kommun', 21, 'Gävleborgs län'],
            [2161, 'Ljusdals kommun', 21, 'Gävleborgs län'],
            [2180, 'Gävle kommun', 21, 'Gävleborgs län'],
            [2181, 'Sandvikens kommun', 21, 'Gävleborgs län'],
            [2182, 'Söderhamns kommun', 21, 'Gävleborgs län'],
            [2183, 'Bollnäs kommun', 21, 'Gävleborgs län'],
            [2184, 'Hudiksvalls kommun', 21, 'Gävleborgs län'],

            // 22xx Västernorrlands län.
            [2260, 'Ånge kommun', 22, 'Västernorrlands län'],
            [2262, 'Timrå kommun', 22, 'Västernorrlands län'],
            [2280, 'Härnösands kommun', 22, 'Västernorrlands län'],
            [2281, 'Sundsvalls kommun', 22, 'Västernorrlands län'],
            [2282, 'Kramfors kommun', 22, 'Västernorrlands län'],
            [2283, 'Sollefteå kommun', 22, 'Västernorrlands län'],
            [2284, 'Örnsköldsviks kommun', 22, 'Västernorrlands län'],

            // 23xx Jämtlands län.
            [2303, 'Ragunda kommun', 23, 'Jämtlands län'],
            [2305, 'Bräcke kommun', 23, 'Jämtlands län'],
            [2309, 'Krokoms kommun', 23, 'Jämtlands län'],
            [2313, 'Strömsunds kommun', 23, 'Jämtlands län'],
            [2321, 'Åre kommun', 23, 'Jämtlands län'],
            [2326, 'Bergs kommun', 23, 'Jämtlands län'],
            [2361, 'Härjedalens kommun', 23, 'Jämtlands län'],
            [2380, 'Östersunds kommun', 23, 'Jämtlands län'],

            // 24xx Västerbottens län.
            [2401, 'Nordmalings kommun', 24, 'Västerbottens län'],
            [2403, 'Bjurholms kommun', 24, 'Västerbottens län'],
            [2404, 'Vindelns kommun', 24, 'Västerbottens län'],
            [2409, 'Robertsfors kommun', 24, 'Västerbottens län'],
            [2417, 'Norsjö kommun', 24, 'Västerbottens län'],
            [2418, 'Malå kommun', 24, 'Västerbottens län'],
            [2421, 'Storumans kommun', 24, 'Västerbottens län'],
            [2422, 'Sorsele kommun', 24, 'Västerbottens län'],
            [2425, 'Dorotea kommun', 24, 'Västerbottens län'],
            [2460, 'Vännäs kommun', 24, 'Västerbottens län'],
            [2462, 'Vilhelmina kommun', 24, 'Västerbottens län'],
            [2463, 'Åsele kommun', 24, 'Västerbottens län'],
            [2480, 'Umeå kommun', 24, 'Västerbottens län'],
            [2481, 'Lycksele kommun', 24, 'Västerbottens län'],
            [2482, 'Skellefteå kommun', 24, 'Västerbottens län'],

            // 25xx Norrbottens län.
            [2505, 'Arvidsjaurs kommun', 25, 'Norrbottens län'],
            [2506, 'Arjeplogs kommun', 25, 'Norrbottens län'],
            [2510, 'Jokkmokks kommun', 25, 'Norrbottens län'],
            [2513, 'Överkalix kommun', 25, 'Norrbottens län'],
            [2514, 'Kalix kommun', 25, 'Norrbottens län'],
            [2518, 'Övertorneå kommun', 25, 'Norrbottens län'],
            [2521, 'Pajala kommun', 25, 'Norrbottens län'],
            [2523, 'Gällivare kommun', 25, 'Norrbottens län'],
            [2560, 'Älvsbyns kommun', 25, 'Norrbottens län'],
            [2580, 'Luleå kommun', 25, 'Norrbottens län'],
            [2581, 'Piteå kommun', 25, 'Norrbottens län'],
            [2582, 'Bodens kommun', 25, 'Norrbottens län'],
            [2583, 'Haparanda kommun', 25, 'Norrbottens län'],
            [2584, 'Kiruna kommun', 25, 'Norrbottens län'],
        ];
    }
}
