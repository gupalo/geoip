<?php

namespace Gupalo\GeoIp\Twig;

use Gupalo\GeoIp\GeoIpParser;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GeoIpExtension extends AbstractExtension
{
    /** @var GeoIpParser */
    private $geoIpParser;

    public function __construct(GeoIpParser $geoIpParser)
    {
        $this->geoIpParser = $geoIpParser;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('domain_ip', [$this, 'domainIp'], ['pre_escape' => 'html', 'is_safe' => ['html']]),
            new TwigFilter('ip_country_code', [$this, 'ipCountryCode']),
            new TwigFilter('ip_country', [$this, 'ipCountry']),
            new TwigFilter('ip_flag', [$this, 'ipFlag'], ['pre_escape' => 'html', 'is_safe' => ['html']]),
            new TwigFilter('country_code_flag', [$this, 'countryCodeFlag'], ['pre_escape' => 'html', 'is_safe' => ['html']]),
        ];
    }

    public function domainIp(?string $host): string
    {
        if ($host === null) {
            return '';
        }

        return gethostbyname($host);
    }

    public function ipCountryCode(?string $ip): string
    {
        return ($ip !== null) ? $this->geoIpParser->getCountryCode($ip) : '';
    }

    public function ipCountry(?string $ip): string
    {
        return ($ip !== null) ? $this->geoIpParser->getCountry($ip) : '';
    }

    public function ipFlag(?string $value): string
    {
        $code = $this->ipCountryCode($value);

        return $this->countryCodeFlag($code);
    }

    public function countryCodeFlag(?string $value): string
    {
        if (!$value) {
            return '';
        }

        return sprintf( '<span style="display: inline-block" title="%s" class="flag flag-%s"></span><span class="invisible-report">%s</span>', $value, strtolower($value), $value);
    }
}
