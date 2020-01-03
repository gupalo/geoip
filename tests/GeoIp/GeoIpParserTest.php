<?php

namespace Gupalo\Tests\GeoIp;

use Gupalo\GeoIp\GeoIpParser;
use PHPUnit\Framework\TestCase;

// To make this test real put GeoIP databases to {PROJECT_DIR}/data/
class GeoIpParserTest extends TestCase
{
    public function testParse(): void
    {
        $dir = dirname(__DIR__, 2) . '/data';
        if (!is_dir($dir)) {
            $this->assertTrue(true);
            return;
        }

        $parser = new GeoIpParser($dir);

        $geoIp = $parser->parse('95.31.18.119');

        $this->assertSame('95.31.18.119', $geoIp->getIp());
        $this->assertSame('Moscow', $geoIp->getCity());
        $this->assertSame('Europe/Moscow', $geoIp->getTimezone());
        $this->assertSame('RU', $geoIp->getCountryCode());
        $this->assertSame('corbina.ru', $geoIp->getDomain());
    }

    public function testParseExtended(): void
    {
        $dir = dirname(__DIR__, 2) . '/data';
        if (!is_dir($dir)) {
            $this->assertTrue(true);
            return;
        }

        $parser = new GeoIpParser($dir);

        $geoIp = $parser->parseExtended('95.31.18.119');

        $this->assertSame('95.31.18.119', $geoIp->getIp());
        $this->assertSame('Moscow', $geoIp->getCity());
        $this->assertSame('Europe/Moscow', $geoIp->getTimezone());
        $this->assertSame('RU', $geoIp->getCountryCode());
        $this->assertSame('corbina.ru', $geoIp->getDomain());

        $this->assertSame('corbina.ru', $geoIp->getMaxMindDomainDomain());
    }
}
