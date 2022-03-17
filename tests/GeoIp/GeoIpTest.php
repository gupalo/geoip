<?php

namespace Gupalo\Tests\GeoIp;

use Gupalo\GeoIp\GeoIp;
use PHPUnit\Framework\TestCase;

class GeoIpTest extends TestCase
{
    public function testGetters(): void
    {
        $geoIpRecord = new GeoIp(
            '1.1.1.1',      // ip,
            true,           // isValidIp,
            null, // $sypexCityRaw
            null, // $maxMindCountryRaw
            null, // $maxMindCityRaw
            null, // $maxMindDomainRaw
            null, // $maxMindIspRaw
            55.7527, // float $sypexCityLatitude
            37.6172, // float $sypexCityLongitude
            'Moscow', // string $sypexCity
            45, // int $sypexCityOkato
            true, // bool $sypexCityVk
            12330126, // int $sypexCityPopulation
            '495,496,498,499', // string $sypexCityTel
            '101xxx:135xxx', // string $sypexCityPostalCode
            55.76, // float $sypexRegionLatitude
            37.61, // float $sypexRegionLongitude
            'Moskva', // string $sypexRegion
            'RU-MOW', // string $sypexRegionCode
            'Europe/Moscow', // string $sypexRegionTimezone
            45, // int $sypexRegionOkato
            '77, 97, 99, 177, 197, 199, 777', // string $sypexRegionAuto
            false, // bool $sypexRegionVk
            60, // float $sypexCountryLatitude
            100, // float $sypexCountryLongitude
            'Russia', // string $sypexCountry
            'RU', // string $sypexCountryCode
            'EU', // string $sypexCountryContinentCode
            'Europe/Moscow', // string $sypexCountryTimezone
            17100000, // int $sypexCountryArea
            140702000, // int $sypexCountryPopulation
            'Moscow', // string $sypexCountryCapital
            'RUB', // string $sypexCountryCurrencyCode
            '7', // string $sypexCountryPhoneCode
            'GE,CN,BY,UA,KZ,LV,PL,EE,LT,FI,MN,NO,AZ,KP', // string $sypexCountryNeighbours
            true, // bool $sypexCountryVk
            'EU', // string $maxMindCountryContinentCode
            'Europe', // string $maxMindCountryContinent
            'RU', // string $maxMindCountryCountryCode
            'Russia', // string $maxMindCountryCountry
            'RU', // string $maxMindCountryRegisteredCountryCode
            'Russia', // string $maxMindCountryRegisteredCountry
            'Moscow', // string $maxMindCityCity
            'EU', // string $maxMindCityContinentCode
            'Europe', // string $maxMindCityContinent
            'RU', // string $maxMindCityCountryCode
            'Russia', // string $maxMindCityCountry
            'RU', // string $maxMindCityRegisteredCountryCode
            'Russia', // string $maxMindCityRegisteredCountry
            55.7527, // float $maxMindCityLatitude
            37.6172, // float $maxMindCityLongitude
            1, // string $maxMindCityLocationAccuracyRadius
            'Ontario', // string $maxMindCitySubdivision
            '', // string $maxMindCityTimeZone
            129128, // string $maxMindCityPostalCode
            'corbina.ru', // string $maxMindDomainDomain
            '8402', // string $maxMindIspAsnNumber
            'PVimpelCom', // string $maxMindIspAsnOrganization
            'VimpelCom', // string $maxMindIspIsp
            'VimpelCom'  // string $maxMindIspOrganization
        );

        $this->assertSame('1.1.1.1', $geoIpRecord->getIp());
        $this->assertTrue($geoIpRecord->isValidIp());
        $this->assertSame('Ontario', $geoIpRecord->getCitySubdivision());
        $this->assertSame('Moscow', $geoIpRecord->getCity());
        $this->assertSame('RU', $geoIpRecord->getCountryCode());
        $this->assertSame('Russia', $geoIpRecord->getCountry());
        $this->assertSame('EU', $geoIpRecord->getContinentCode());
        $this->assertSame('129128', $geoIpRecord->getPostalCode());
        $this->assertSame('corbina.ru', $geoIpRecord->getDomain());
        $this->assertSame('8402', $geoIpRecord->getAsnNumber());
        $this->assertSame('PVimpelCom', $geoIpRecord->getAsnOrganization());
        $this->assertSame('VimpelCom', $geoIpRecord->getIsp());
        $this->assertSame('VimpelCom', $geoIpRecord->getOrganization());
        $this->assertSame(55.7527, $geoIpRecord->getLatitude());
        $this->assertSame(37.6172, $geoIpRecord->getLongitude());
    }
}
