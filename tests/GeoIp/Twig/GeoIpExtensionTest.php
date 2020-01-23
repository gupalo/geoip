<?php

namespace Gupalo\Tests\GeoIp\Twig;

use Gupalo\GeoIp\GeoIpParser;
use Gupalo\GeoIp\Twig\GeoIpExtension;
use PHPUnit\Framework\TestCase;
use Twig\TwigFilter;

class GeoIpExtensionTest extends TestCase
{
    /** @var GeoIpParser */
    private $geoIpParser;

    /** @var GeoIpExtension */
    private $geoIpExtension;

    protected function setUp(): void
    {
        $this->geoIpParser = $this->prophesize(GeoIpParser::class);
        $this->geoIpExtension = new GeoIpExtension($this->geoIpParser->reveal());
    }

    public function testGetFilters(): void
    {
        $filters = $this->geoIpExtension->getFilters();

        $this->assertIsArray($filters);
        $this->assertInstanceOf(TwigFilter::class, $filters[0]);
    }

    public function testCountryCodeFlag(): void
    {
        $html = $this->geoIpExtension->countryCodeFlag('RU');

        $this->assertSame('<span style="display: inline-block" title="RU" class="flag flag-ru"></span><span class="invisible-report">RU</span>', $html);
    }

    public function testIpCountryCode(): void
    {
        $this->geoIpParser->getCountryCode('95.31.18.119')->shouldBeCalledTimes(1)->willReturn('RU');

        $html = $this->geoIpExtension->ipCountryCode('95.31.18.119');

        $this->assertSame('RU', $html);
    }

    public function testIpCountry(): void
    {
        $this->geoIpParser->getCountry('95.31.18.119')->shouldBeCalledTimes(1)->willReturn('Russia');

        $html = $this->geoIpExtension->ipCountry('95.31.18.119');

        $this->assertSame('Russia', $html);
    }

    public function testIpFlag(): void
    {
        $this->geoIpParser->getCountryCode('95.31.18.119')->shouldBeCalledTimes(1)->willReturn('RU');

        $html = $this->geoIpExtension->ipFlag('95.31.18.119');

        $this->assertSame('<span style="display: inline-block" title="RU" class="flag flag-ru"></span><span class="invisible-report">RU</span>', $html);
    }
}
