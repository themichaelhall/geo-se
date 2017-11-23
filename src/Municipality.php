<?php
/**
 * This file is a part of the geo-se package.
 *
 * Read more at https://github.com/themichaelhall/geo-se
 */
declare(strict_types=1);

namespace MichaelHall\GeoSe;

use MichaelHall\GeoSe\Exceptions\MunicipalityNotFoundException;
use MichaelHall\GeoSe\Interfaces\MunicipalityInterface;
use MichaelHall\GeoSe\Interfaces\RegionInterface;

/**
 * Class representing a swedish municipality.
 *
 * @since 1.0.0
 */
class Municipality implements MunicipalityInterface
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
     * Returns the region.
     *
     * @since 1.0.0
     *
     * @return RegionInterface The region.
     */
    public function getRegion(): RegionInterface
    {
        return $this->region;
    }

    /**
     * Returns the municipality as a string.
     *
     * @since 1.0.0
     *
     * @return string The municipality as a string.
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
     * @throws \MichaelHall\GeoSe\Exceptions\MunicipalityNotFoundException If the municipality could not be found.
     *
     * @return MunicipalityInterface The municipality.
     */
    public static function findById(int $id): MunicipalityInterface
    {
        if (!isset(self::MUNICIPALITY_DATA[$id])) {
            throw new MunicipalityNotFoundException('Could not find a municipality with id ' . $id . '.');
        }

        $data = self::MUNICIPALITY_DATA[$id];

        return new self($id, $data[0] . ' kommun', Region::findById(intval($id / 100)));
    }

    /**
     * Constructs the municipality.
     *
     * @param int             $id     The id.
     * @param string          $name   The name.
     * @param RegionInterface $region The region.
     */
    private function __construct(int $id, string $name, RegionInterface $region)
    {
        $this->id = $id;
        $this->name = $name;
        $this->region = $region;
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
     * @var RegionInterface My region.
     */
    private $region;

    /**
     * @var array My data.
     */
    private const MUNICIPALITY_DATA = [
        // 1xx Stockholms län.
        114  => ['Upplands Väsby'],
        115  => ['Vallentuna'],
        117  => ['Österåkers'],
        120  => ['Värmdö'],
        123  => ['Järfälla'],
        125  => ['Ekerö'],
        126  => ['Huddinge'],
        127  => ['Botkyrka'],
        128  => ['Salems'],
        136  => ['Haninge'],
        138  => ['Tyresö'],
        139  => ['Upplands-Bro'],
        140  => ['Nykvarns'],
        160  => ['Täby'],
        162  => ['Danderyds'],
        163  => ['Sollentuna'],
        180  => ['Stockholms'],
        181  => ['Södertälje'],
        182  => ['Nacka'],
        183  => ['Sundbybergs'],
        184  => ['Solna'],
        186  => ['Lidingö'],
        187  => ['Vaxholms'],
        188  => ['Norrtälje'],
        191  => ['Sigtuna'],
        192  => ['Nynäshamns'],

        // 3xx Uppsala län.
        305  => ['Håbo'],
        319  => ['Älvkarleby'],
        330  => ['Knivsta'],
        331  => ['Heby'],
        360  => ['Tierps'],
        380  => ['Uppsala'],
        381  => ['Enköpings'],
        382  => ['Östhammars'],

        // 4xx Södermanlands län.
        428  => ['Vingåkers'],
        461  => ['Gnesta'],
        480  => ['Nyköpings'],
        481  => ['Oxelösunds'],
        482  => ['Flens'],
        483  => ['Katrineholms'],
        484  => ['Eskilstuna'],
        486  => ['Strängnäs'],
        488  => ['Trosa'],

        // 5xx Östergötlands län.
        509  => ['Ödeshögs'],
        512  => ['Ydre'],
        513  => ['Kinda'],
        560  => ['Boxholms'],
        561  => ['Åtvidabergs'],
        562  => ['Finspångs'],
        563  => ['Valdemarsviks'],
        580  => ['Linköpings'],
        581  => ['Norrköpings'],
        582  => ['Söderköpings'],
        583  => ['Motala'],
        584  => ['Vadstena'],
        586  => ['Mjölby'],

        // 6xx Jönköpings län
        604  => ['Aneby'],
        617  => ['Gnosjö'],
        642  => ['Mullsjö'],
        643  => ['Habo'],
        662  => ['Gislaveds'],
        665  => ['Vaggeryds'],
        680  => ['Jönköpings'],
        682  => ['Nässjö'],
        683  => ['Värnamo'],
        684  => ['Sävsjö'],
        685  => ['Vetlanda'],
        686  => ['Eksjö'],
        687  => ['Tranås'],

        // 7xx Kronobergs län.
        760  => ['Uppvidinge'],
        761  => ['Lessebo'],
        763  => ['Tingsryds'],
        764  => ['Alvesta'],
        765  => ['Älmhults'],
        767  => ['Markaryds'],
        780  => ['Växjö'],
        781  => ['Ljungby'],

        // 8xx Kalmar län.
        821  => ['Högsby'],
        834  => ['Torsås'],
        840  => ['Mörbylånga'],
        860  => ['Hultsfreds'],
        861  => ['Mönsterås'],
        862  => ['Emmaboda'],
        880  => ['Kalmar'],
        881  => ['Nybro'],
        882  => ['Oskarshamns'],
        883  => ['Västerviks'],
        884  => ['Vimmerby'],
        885  => ['Borgholms'],

        // 9xx Gotlands län.
        980  => ['Gotlands'],

        // 10xx Blekinge län.
        1060 => ['Olofströms'],
        1080 => ['Karlskrona'],
        1081 => ['Ronneby'],
        1082 => ['Karlshamns'],
        1083 => ['Sölvesborgs'],

        // 12xx Skåne län.
        1214 => ['Svalövs'],
        1230 => ['Staffanstorps'],
        1231 => ['Burlövs'],
        1233 => ['Vellinge'],
        1256 => ['Östra Göinge'],
        1257 => ['Örkelljunga'],
        1260 => ['Bjuvs'],
        1261 => ['Kävlinge'],
        1262 => ['Lomma'],
        1263 => ['Svedala'],
        1264 => ['Skurups'],
        1265 => ['Sjöbo'],
        1266 => ['Hörby'],
        1267 => ['Höörs'],
        1270 => ['Tomelilla'],
        1272 => ['Bromölla'],
        1273 => ['Osby'],
        1275 => ['Perstorps'],
        1276 => ['Klippans'],
        1277 => ['Åstorps'],
        1278 => ['Båstads'],
        1280 => ['Malmö'],
        1281 => ['Lunds'],
        1282 => ['Landskrona'],
        1283 => ['Helsingborgs'],
        1284 => ['Höganäs'],
        1285 => ['Eslövs'],
        1286 => ['Ystads'],
        1287 => ['Trelleborgs'],
        1290 => ['Kristianstads'],
        1291 => ['Simrishamns'],
        1292 => ['Ängelholms'],
        1293 => ['Hässleholms'],

        // 13xx Hallands län.
        1315 => ['Hylte'],
        1380 => ['Halmstads'],
        1381 => ['Laholms'],
        1382 => ['Falkenbergs'],
        1383 => ['Varbergs'],
        1384 => ['Kungsbacka'],

        // 14xx Västra Götalands län.
        1401 => ['Härryda'],
        1402 => ['Partille'],
        1407 => ['Öckerö'],
        1415 => ['Stenungsunds'],
        1419 => ['Tjörns'],
        1421 => ['Orusts'],
        1427 => ['Sotenäs'],
        1430 => ['Munkedals'],
        1435 => ['Tanums'],
        1438 => ['Dals-Eds'],
        1439 => ['Färgelanda'],
        1440 => ['Ale'],
        1441 => ['Lerums'],
        1442 => ['Vårgårda'],
        1443 => ['Bollebygds'],
        1444 => ['Grästorps'],
        1445 => ['Essunga'],
        1446 => ['Karlsborgs'],
        1447 => ['Gullspångs'],
        1452 => ['Tranemo'],
        1460 => ['Bengtsfors'],
        1461 => ['Melleruds'],
        1462 => ['Lilla Edets'],
        1463 => ['Marks'],
        1465 => ['Svenljunga'],
        1466 => ['Herrljunga'],
        1470 => ['Vara'],
        1471 => ['Götene'],
        1472 => ['Tibro'],
        1473 => ['Töreboda'],
        1480 => ['Göteborgs'],
        1481 => ['Mölndals'],
        1482 => ['Kungälvs'],
        1484 => ['Lysekils'],
        1485 => ['Uddevalla'],
        1486 => ['Strömstads'],
        1487 => ['Vänersborgs'],
        1488 => ['Trollhättans'],
        1489 => ['Alingsås'],
        1490 => ['Borås'],
        1491 => ['Ulricehamns'],
        1492 => ['Åmåls'],
        1493 => ['Mariestads'],
        1494 => ['Lidköpings'],
        1495 => ['Skara'],
        1496 => ['Skövde'],
        1497 => ['Hjo'],
        1498 => ['Tidaholms'],
        1499 => ['Falköpings'],

        // 17xx Värmlands län.
        1715 => ['Kils'],
        1730 => ['Eda'],
        1737 => ['Torsby'],
        1760 => ['Storfors'],
        1761 => ['Hammarö'],
        1762 => ['Munkfors'],
        1763 => ['Forshaga'],
        1764 => ['Grums'],
        1765 => ['Årjängs'],
        1766 => ['Sunne'],
        1780 => ['Karlstads'],
        1781 => ['Kristinehamns'],
        1782 => ['Filipstads'],
        1783 => ['Hagfors'],
        1784 => ['Arvika'],
        1785 => ['Säffle'],

        // 18xx Örebro län.
        1814 => ['Lekebergs'],
        1860 => ['Laxå'],
        1861 => ['Hallsbergs'],
        1862 => ['Degerfors'],
        1863 => ['Hällefors'],
        1864 => ['Ljusnarsbergs'],
        1880 => ['Örebro'],
        1881 => ['Kumla'],
        1882 => ['Askersunds'],
        1883 => ['Karlskoga'],
        1884 => ['Nora'],
        1885 => ['Lindesbergs'],

        // 19xx Västmanlands län.
        1904 => ['Skinnskattebergs'],
        1907 => ['Surahammars'],
        1960 => ['Kungsörs'],
        1961 => ['Hallstahammars'],
        1962 => ['Norbergs'],
        1980 => ['Västerås'],
        1981 => ['Sala'],
        1982 => ['Fagersta'],
        1983 => ['Köpings'],
        1984 => ['Arboga'],

        // 20xx Dalarnas län.
        2021 => ['Vansbro'],
        2023 => ['Malung-Sälens'],
        2026 => ['Gagnefs'],
        2029 => ['Leksands'],
        2031 => ['Rättviks'],
        2034 => ['Orsa'],
        2039 => ['Älvdalens'],
        2061 => ['Smedjebackens'],
        2062 => ['Mora'],
        2080 => ['Falu'],
        2081 => ['Borlänge'],
        2082 => ['Säters'],
        2083 => ['Hedemora'],
        2084 => ['Avesta'],
        2085 => ['Ludvika'],

        // 21xx Gävleborgs län.
        2101 => ['Ockelbo'],
        2104 => ['Hofors'],
        2121 => ['Ovanåkers'],
        2132 => ['Nordanstigs'],
        2161 => ['Ljusdals'],
        2180 => ['Gävle'],
        2181 => ['Sandvikens'],
        2182 => ['Söderhamns'],
        2183 => ['Bollnäs'],
        2184 => ['Hudiksvalls'],

        // 22xx Västernorrlands län.
        2260 => ['Ånge'],
        2262 => ['Timrå'],
        2280 => ['Härnösands'],
        2281 => ['Sundsvalls'],
        2282 => ['Kramfors'],
        2283 => ['Sollefteå'],
        2284 => ['Örnsköldsviks'],

        // 23xx Jämtlands län.
        2303 => ['Ragunda'],
        2305 => ['Bräcke'],
        2309 => ['Krokoms'],
        2313 => ['Strömsunds'],
        2321 => ['Åre'],
        2326 => ['Bergs'],
        2361 => ['Härjedalens'],
        2380 => ['Östersunds'],

        // 24xx Västerbottens län.
        2401 => ['Nordmalings'],
        2403 => ['Bjurholms'],
        2404 => ['Vindelns'],
        2409 => ['Robertsfors'],
        2417 => ['Norsjö'],
        2418 => ['Malå'],
        2421 => ['Storumans'],
        2422 => ['Sorsele'],
        2425 => ['Dorotea'],
        2460 => ['Vännäs'],
        2462 => ['Vilhelmina'],
        2463 => ['Åsele'],
        2480 => ['Umeå'],
        2481 => ['Lycksele'],
        2482 => ['Skellefteå'],

        // 25xx Norrbottens län.
        2505 => ['Arvidsjaurs'],
        2506 => ['Arjeplogs'],
        2510 => ['Jokkmokks'],
        2513 => ['Överkalix'],
        2514 => ['Kalix'],
        2518 => ['Övertorneå'],
        2521 => ['Pajala'],
        2523 => ['Gällivare'],
        2560 => ['Älvsbyns'],
        2580 => ['Luleå'],
        2581 => ['Piteå'],
        2582 => ['Bodens'],
        2583 => ['Haparanda'],
        2584 => ['Kiruna'],
    ];
}
