<?php

namespace Gupalo\Tests\GeoIp;

use Gupalo\GeoIp\GeoIpParser;
use PHPUnit\Framework\TestCase;

// To make this test real put GeoIP databases to {PROJECT_DIR}/data/
class GeoIpParserTest extends TestCase
{
    public function testParse(): void
    {
        $parser = $this->getParser();

        $geoIp = $parser->parse('95.31.18.119');

        $this->assertSame('95.31.18.119', $geoIp->getIp());
        $this->assertSame('Moscow', $geoIp->getCity());
        $this->assertSame('RU', $geoIp->getCountryCode());
        if (!$parser->isMaxMindLiteDatabaseUsed()) {
            $this->assertSame('Europe/Moscow', $geoIp->getTimezone());
            $this->assertSame('corbina.ru', $geoIp->getDomain());
        }
    }

    public function testParseExtended(): void
    {
        $parser = $this->getParser();

        $geoIp = $parser->parseExtended('95.31.18.119');

        $this->assertSame('95.31.18.119', $geoIp->getIp());
        $this->assertSame('Moscow', $geoIp->getCity());
        $this->assertSame('RU', $geoIp->getCountryCode());
        if (!$parser->isMaxMindLiteDatabaseUsed()) {
            $this->assertSame('Europe/Moscow', $geoIp->getTimezone());
            $this->assertSame('corbina.ru', $geoIp->getDomain());
            $this->assertSame('corbina.ru', $geoIp->getMaxMindDomainDomain());
        }
    }

    public function testGetCountryCode(): void
    {
        $parser = $this->getParser();

        $this->assertSame('RU', $parser->getCountryCode('95.31.18.119'));
    }

    public function testGetCountry(): void
    {
        $parser = $this->getParser();

        $this->assertSame('Russia', $parser->getCountry('95.31.18.119'));
    }

    private function getParser(): ?GeoIpParser
    {
        $dir = dirname(__DIR__, 2) . '/data';
        if (!is_dir($dir)) {
            $this->assertTrue(true);
            return null;
        }

        return new GeoIpParser($dir);
    }
}
