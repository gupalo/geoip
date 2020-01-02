<?php

namespace Gupalo\Tests\GeoIp;

use Gupalo\GeoIp\GeoIpRecord;
use PHPUnit\Framework\TestCase;

class GeoIpRecordTest extends TestCase
{
    public function testGetters(): void
    {
        $geoIpRecord = new GeoIpRecord(
            '1.1.1.1',      // ip,
            true,           // isValidIp,
            10.11,        // sypexLatitude,
            20.11,        // sypexLongitude,
            'New York',     // sypexCity,
            'US',           // sypexCountryCode,
            'USA',          // sypexCountry,
            'EU',           // maxMindCountryContinentCode,
            'GB',           // maxMindCountryCountryCode,
            'San Paulo',    // maxMindCityCity,
            '12345',        // maxMindCityPostalCode,
            'SA',           // maxMindCityContinentCode,
            'BR',           // maxMindCityCountryCode,
            30.11,        // maxMindCityLatitude,
            40.11,        // maxMindCityLongitude,
            'example.com',  // maxMindDomainDomain,
            'ASN11',        // maxMindIspAsn,
            'Provider 1',   // maxMindIspAsnOrganization,
            'ISP1',         // maxMindIspIsp,
            'Provider 2',   // maxMindIspOrganization
        );

        $this->assertSame('1.1.1.1', $geoIpRecord->getIp());
        $this->assertTrue($geoIpRecord->isValidIp());
        $this->assertSame('San Paulo', $geoIpRecord->getCity());
        $this->assertSame('BR', $geoIpRecord->getCountryCode());
        $this->assertSame('USA', $geoIpRecord->getCountry());
        $this->assertSame('SA', $geoIpRecord->getContinentCode());
        $this->assertSame('12345', $geoIpRecord->getPostalCode());
        $this->assertSame('example.com', $geoIpRecord->getDomain());
        $this->assertSame('ASN11', $geoIpRecord->getAsn());
        $this->assertSame('Provider 1', $geoIpRecord->getAsnOrganization());
        $this->assertSame('ISP1', $geoIpRecord->getIsp());
        $this->assertSame('Provider 2', $geoIpRecord->getIspOrganization());
        $this->assertSame(30.11, $geoIpRecord->getLatitude());
        $this->assertSame(40.11, $geoIpRecord->getLongitude());
    }
}
