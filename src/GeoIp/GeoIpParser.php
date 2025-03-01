<?php

namespace Gupalo\GeoIp;

use MaxMind\Db\Reader;
use MaxMind\Db\Reader\InvalidDatabaseException;
use Throwable;

class GeoIpParser
{
    public const MAX_MIND_LANGUAGE_DE = 'de';
    public const MAX_MIND_LANGUAGE_EN = 'en';
    public const MAX_MIND_LANGUAGE_ES = 'es';
    public const MAX_MIND_LANGUAGE_FR = 'fr';
    public const MAX_MIND_LANGUAGE_JA = 'ja';
    public const MAX_MIND_LANGUAGE_PT = 'pt-BR';
    public const MAX_MIND_LANGUAGE_RU = 'ru';
    public const MAX_MIND_LANGUAGE_CN = 'zh-CN';

    private ?string $maxMindCityDbFilename = null;
    private ?string $maxMindCountryDbFilename = null;
    private ?string $maxMindDomainDbFilename = null;
    private ?string $maxMindIspDbFilename = null;
    private ?string $sypexGeoMaxFilename = null;
    private ?Reader $maxMindCityReader = null;
    private ?Reader $maxMindCountryReader = null;
    private ?Reader $maxMindDomainReader = null;
    private ?Reader $maxMindIspReader = null;
    private ?SxGeo $sxGeo = null;
    private string $maxMindLanguage = self::MAX_MIND_LANGUAGE_EN;
    private bool $isMaxMindLiteDatabaseUsed = false;

    /**
     * If you have not renamed GeoIP database files, it's enough to specify $dir
     *
     * @param string|null $dir
     * @param string|null $maxMindCityDbFilename
     * @param string|null $maxMindCountryDbFilename
     * @param string|null $maxMindDomainDbFilename
     * @param string|null $maxMindIspDbFilename
     * @param string|null $sypexGeoMaxFilename
     */
    public function __construct(
        ?string $dir = null,
        ?string $maxMindCityDbFilename = null,
        ?string $maxMindCountryDbFilename = null,
        ?string $maxMindDomainDbFilename = null,
        ?string $maxMindIspDbFilename = null,
        ?string $sypexGeoMaxFilename = null
    ) {
        $this->initFilenames(
            $dir,
            $maxMindCityDbFilename,
            $maxMindCountryDbFilename,
            $maxMindDomainDbFilename,
            $maxMindIspDbFilename,
            $sypexGeoMaxFilename
        );
    }

    public function parse(string $ip): GeoIp
    {
        return $this->doParse($ip, false);
    }

    public function parseExtended(string $ip): GeoIpExtended
    {
        return $this->doParse($ip, true);
    }

    public function getCountry(string $ip): string
    {
        $geoIp = $this->parse($ip);

        return (string)$geoIp->getCountry();
    }

    public function getCountryCode(string $ip): string
    {
        $geoIp = $this->parse($ip);

        return (string)$geoIp->getCountryCode();
    }

    /**
     * @param string $maxMindLanguage GeoIpParser:MAX_MIND_LANGUAGE_*
     */
    public function setMaxMindLanguage(string $maxMindLanguage): void
    {
        $this->maxMindLanguage = $maxMindLanguage;
    }

    /**
     * @param string $ip
     * @param bool $extended
     * @return GeoIp|GeoIpExtended
     * @noinspection DuplicatedCode
     * @noinspection PhpDocSignatureInspection
     */
    private function doParse(string $ip, bool $extended): GeoIp
    {
        $ip = $this->fixIp($ip);
        $this->initReaders();

        $isValidIp = filter_var($ip, FILTER_VALIDATE_IP);

        $sypexCityLatitude = null;
        $sypexCityLongitude = null;
        $sypexCity = null;
        $sypexCityOkato = null;
        $sypexCityVk = null;
        $sypexCityPopulation = null;
        $sypexCityTel = null;
        $sypexCityPostalCode = null;
        $sypexRegionLatitude = null;
        $sypexRegionLongitude = null;
        $sypexRegion = null;
        $sypexRegionCode = null;
        $sypexRegionTimezone = null;
        $sypexRegionOkato = null;
        $sypexRegionAuto = null;
        $sypexRegionVk = null;
        $sypexCountryLatitude = null;
        $sypexCountryLongitude = null;
        $sypexCountry = null;
        $sypexCountryCode = null;
        $sypexCountryContinentCode = null;
        $sypexCountryTimezone = null;
        $sypexCountryArea = null;
        $sypexCountryPopulation = null;
        $sypexCountryCapital = null;
        $sypexCountryCurrencyCode = null;
        $sypexCountryPhoneCode = null;
        $sypexCountryNeighbours = null;
        $sypexCountryVk = null;

        $maxMindCountryContinentCode = null;
        $maxMindCountryContinent = null;
        $maxMindCountryCountryCode = null;
        $maxMindCountryCountry = null;
        $maxMindCountryRegisteredCountryCode = null;
        $maxMindCountryRegisteredCountry = null;
        $maxMindCityCity = null;
        $maxMindCityContinentCode = null;
        $maxMindCityContinent = null;
        $maxMindCityCountryCode = null;
        $maxMindCityCountry = null;
        $maxMindCityRegisteredCountryCode = null;
        $maxMindCityRegisteredCountry = null;
        $maxMindCityLatitude = null;
        $maxMindCityLongitude = null;
        $maxMindCityLocationAccuracyRadius = null;
        $maxMindCitySubdivision = null;
        $maxMindCityTimeZone = null;
        $maxMindCityPostalCode = null;
        $maxMindDomainDomain = null;
        $maxMindIspAsnNumber = null;
        $maxMindIspAsnOrganization = null;
        $maxMindIspIsp = null;
        $maxMindIspOrganization = null;

        $sypexCityRaw = null;
        $maxMindCountryRaw = null;
        $maxMindCityRaw = null;
        $maxMindDomainRaw = null;
        $maxMindIspRaw = null;

        if ($isValidIp) {
            if ($this->sxGeo) {
                $sypexLanguage = ($this->maxMindLanguage === 'ru') ? 'ru' : 'en';
                $sypexCityRaw = $this->sxGeo->getCityFull($ip);

                $sypexCityLatitude = $sypexCityRaw['city']['lat'] ?? null;
                $sypexCityLongitude = $sypexCityRaw['city']['lon'] ?? null;
                $sypexCity = NameNormalizer::normalize($sypexCityRaw['city']['name_' . $sypexLanguage] ?? null);
                $sypexCityOkato = !empty($sypexCityRaw['city']['okato']) ? (int)$sypexCityRaw['city']['okato'] : null;
                $sypexCityVk = $sypexCityRaw['city']['vk'] ?? null;
                $sypexCityPopulation = $sypexCityRaw['city']['population'] ?? null;
                $sypexCityTel = $sypexCityRaw['city']['tel'] ?? null;
                $sypexCityPostalCode = $sypexCityRaw['city']['post'] ?? null;

                $sypexRegionLatitude = $sypexCityRaw['region']['lat'] ?? null;
                $sypexRegionLongitude = $sypexCityRaw['region']['lon'] ?? null;
                $sypexRegion = $sypexCityRaw['region']['name_' . $sypexLanguage] ?? null;
                $sypexRegionCode = $sypexCityRaw['region']['iso'] ?? null;
                $sypexRegionTimezone = $sypexCityRaw['region']['timezone'] ?? null;
                $sypexRegionOkato = !empty($sypexRegionRaw['region']['okato']) ? (int)$sypexRegionRaw['region']['okato'] : null;
                $sypexRegionAuto = $sypexCityRaw['region']['auto'] ?? null;
                $sypexRegionVk = $sypexCityRaw['region']['vk'] ?? null;

                $sypexCountryLatitude = $sypexCityRaw['country']['lat'] ?? null;
                $sypexCountryLongitude = $sypexCityRaw['country']['lon'] ?? null;
                $sypexCountry = $sypexCityRaw['country']['name_' . $sypexLanguage] ?? null;
                $sypexCountryCode = $sypexCityRaw['country']['iso'] ?? null;
                $sypexCountryContinentCode = $sypexCityRaw['country']['continent'] ?? null;
                $sypexCountryTimezone = $sypexCityRaw['country']['timezone'] ?? null;
                $sypexCountryArea = $sypexCityRaw['country']['area'] ?? null;
                $sypexCountryPopulation = $sypexCityRaw['country']['population'] ?? null;
                $sypexCountryCapital = $sypexCityRaw['country']['capital_' . $sypexLanguage] ?? null;
                $sypexCountryCurrencyCode = $sypexCityRaw['country']['cur_code'] ?? null;
                $sypexCountryPhoneCode = $sypexCityRaw['country']['phone'] ?? null;
                $sypexCountryNeighbours = $sypexCityRaw['country']['neighbours'] ?? null;
                $sypexCountryVk = $sypexCityRaw['country']['vk'] ?? null;
            }

            try {
                $maxMindCountryRaw = $this->maxMindCountryReader->get($ip);
                $maxMindCountryContinentCode = $maxMindCountryRaw['continent']['code'] ?? null;
                $maxMindCountryContinent = $maxMindCountryRaw['continent']['names'][$this->maxMindLanguage] ?? null;
                $maxMindCountryCountryCode = $maxMindCountryRaw['country']['iso_code'] ?? null;
                $maxMindCountryCountry = $maxMindCountryRaw['country']['names'][$this->maxMindLanguage] ?? null;
                $maxMindCountryRegisteredCountryCode = $maxMindCountryRaw['registered_country']['iso_code'] ?? null;
                $maxMindCountryRegisteredCountry = $maxMindCountryRaw['registered_country']['names'][$this->maxMindLanguage] ?? null;
            } catch (Throwable) {
            }
            try {
                $maxMindCityRaw = $this->maxMindCityReader->get($ip) ?? [];
                $maxMindCityContinentCode = $maxMindCityRaw['continent']['code'] ?? null;
                $maxMindCityContinent = $maxMindCityRaw['continent']['names'][$this->maxMindLanguage] ?? null;
                $maxMindCityCountryCode = $maxMindCityRaw['country']['iso_code'] ?? null;
                $maxMindCityCountry = $maxMindCityRaw['country']['names'][$this->maxMindLanguage] ?? null;
                $maxMindCityRegisteredCountryCode = $maxMindCityRaw['registered_country']['iso_code'] ?? null;
                $maxMindCityRegisteredCountry = $maxMindCityRaw['registered_country']['names'][$this->maxMindLanguage] ?? null;
                $maxMindCityCity = NameNormalizer::normalize($maxMindCityRaw['city']['names'][$this->maxMindLanguage] ?? null);
                $maxMindCityPostalCode = $maxMindCityRaw['postal']['code'] ?? null;
                $maxMindCityLatitude = $maxMindCityRaw['location']['latitude'] ?? null;
                $maxMindCityLongitude = $maxMindCityRaw['location']['longitude'] ?? null;
                $maxMindCityLocationAccuracyRadius = $maxMindCityRaw['location']['accuracy_radius'] ?? null;
                $maxMindCityTimeZone = $maxMindCityRaw['location']['timezone'] ?? null;
                $maxMindCitySubdivision = $maxMindCityRaw['subdivisions'][0]['names'][$this->maxMindLanguage] ?? null;
            } catch (Throwable) {
            }
            try {
                $maxMindDomainRaw = $this->maxMindDomainReader->get($ip) ?? [];
                $maxMindDomainDomain = $maxMindDomainRaw['domain'] ?? null;
            } catch (Throwable) {
            }
            try {
                $maxMindIspRaw = $this->maxMindIspReader->get($ip) ?? [];
                $maxMindIspAsnNumber = $maxMindIspRaw['autonomous_system_number'] ?? null;
                $maxMindIspAsnOrganization = $maxMindIspRaw['autonomous_system_organization'] ?? null;
                $maxMindIspIsp = $maxMindIspRaw['isp'] ?? null;
                $maxMindIspOrganization = $maxMindIspRaw['organization'] ?? null;
            } catch (Throwable) {
            }
        }

        $class = $extended ? GeoIpExtended::class : GeoIp::class;

        return new $class(
            $ip,
            $isValidIp,
            $sypexCityRaw,
            $maxMindCountryRaw,
            $maxMindCityRaw,
            $maxMindDomainRaw,
            $maxMindIspRaw,
            $sypexCityLatitude,
            $sypexCityLongitude,
            $sypexCity,
            $sypexCityOkato,
            $sypexCityVk,
            $sypexCityPopulation,
            $sypexCityTel,
            $sypexCityPostalCode,
            $sypexRegionLatitude,
            $sypexRegionLongitude,
            $sypexRegion,
            $sypexRegionCode,
            $sypexRegionTimezone,
            $sypexRegionOkato,
            $sypexRegionAuto,
            $sypexRegionVk,
            $sypexCountryLatitude,
            $sypexCountryLongitude,
            $sypexCountry,
            $sypexCountryCode,
            $sypexCountryContinentCode,
            $sypexCountryTimezone,
            $sypexCountryArea,
            $sypexCountryPopulation,
            $sypexCountryCapital,
            $sypexCountryCurrencyCode,
            $sypexCountryPhoneCode,
            $sypexCountryNeighbours,
            $sypexCountryVk,
            $maxMindCountryContinentCode,
            $maxMindCountryContinent,
            $maxMindCountryCountryCode,
            $maxMindCountryCountry,
            $maxMindCountryRegisteredCountryCode,
            $maxMindCountryRegisteredCountry,
            $maxMindCityCity,
            $maxMindCityContinentCode,
            $maxMindCityContinent,
            $maxMindCityCountryCode,
            $maxMindCityCountry,
            $maxMindCityRegisteredCountryCode,
            $maxMindCityRegisteredCountry,
            $maxMindCityLatitude,
            $maxMindCityLongitude,
            $maxMindCityLocationAccuracyRadius,
            $maxMindCitySubdivision,
            $maxMindCityTimeZone,
            $maxMindCityPostalCode,
            $maxMindDomainDomain,
            $maxMindIspAsnNumber,
            $maxMindIspAsnOrganization,
            $maxMindIspIsp,
            $maxMindIspOrganization
        );
    }

    public function isMaxMindLiteDatabaseUsed(): bool
    {
        return $this->isMaxMindLiteDatabaseUsed;
    }

    private function initReaders(): void
    {
        if (!$this->maxMindCityReader && $this->maxMindCityDbFilename) {
            try {
                $this->maxMindCityReader = new Reader($this->maxMindCityDbFilename);
            } catch (InvalidDatabaseException) {
            }
        }
        if (!$this->maxMindCountryReader && $this->maxMindCountryDbFilename) {
            try {
                $this->maxMindCountryReader = new Reader($this->maxMindCountryDbFilename);
            } catch (InvalidDatabaseException) {
            }
        }
        if (!$this->maxMindDomainReader && $this->maxMindDomainDbFilename) {
            try {
                $this->maxMindDomainReader = new Reader($this->maxMindDomainDbFilename);
            } catch (InvalidDatabaseException) {
            }
        }
        if (!$this->maxMindIspReader && $this->maxMindIspDbFilename) {
            try {
                $this->maxMindIspReader = new Reader($this->maxMindIspDbFilename);
            } catch (InvalidDatabaseException) {
            }
        }
        if (!$this->sxGeo && $this->sypexGeoMaxFilename) {
            $this->sxGeo = new SxGeo($this->sypexGeoMaxFilename, SXGEO_BATCH | SXGEO_MEMORY);
        }
    }

    private function initFilenames(
        ?string $dir,
        ?string $maxMindCityDbFilename,
        ?string $maxMindCountryDbFilename,
        ?string $maxMindDomainDbFilename,
        ?string $maxMindIspDbFilename,
        ?string $sypexGeoMaxFilename
    ): void {
        if ($dir) {
            $dir = rtrim($dir, '/') . '/';
        }

        $maxMindCityDbFilename2 = $dir . ($maxMindCityDbFilename ?? 'GeoLite2-City.mmdb');
        $maxMindCityDbFilename = $dir . ($maxMindCityDbFilename ?? 'GeoIP2-City.mmdb');
        $maxMindCountryDbFilename2 = $dir . ($maxMindCountryDbFilename ?? 'GeoLite2-Country.mmdb');
        $maxMindCountryDbFilename = $dir . ($maxMindCountryDbFilename ?? 'GeoIP2-Country.mmdb');
        $maxMindDomainDbFilename = $dir . ($maxMindDomainDbFilename ?? 'GeoIP2-Domain.mmdb');
        $maxMindIspDbFilename = $dir . ($maxMindIspDbFilename ?? 'GeoIP2-ISP.mmdb');
        $sypexGeoMaxFilename = $dir . ($sypexGeoMaxFilename ?? 'SxGeoMax.dat');

        if (!is_file($maxMindCityDbFilename) && is_file($maxMindCityDbFilename2)) {
            $maxMindCityDbFilename = $maxMindCityDbFilename2;
            $this->isMaxMindLiteDatabaseUsed = true;
        }
        if (!is_file($maxMindCountryDbFilename) && is_file($maxMindCountryDbFilename2)) {
            $maxMindCountryDbFilename = $maxMindCountryDbFilename2;
            $this->isMaxMindLiteDatabaseUsed = true;
        }

        $this->maxMindCityDbFilename = is_file($maxMindCityDbFilename) ? $maxMindCityDbFilename : null;
        $this->maxMindCountryDbFilename = is_file($maxMindCountryDbFilename) ? $maxMindCountryDbFilename : null;
        $this->maxMindDomainDbFilename = is_file($maxMindDomainDbFilename) ? $maxMindDomainDbFilename : null;
        $this->maxMindIspDbFilename = is_file($maxMindIspDbFilename) ? $maxMindIspDbFilename : null;
        $this->sypexGeoMaxFilename = is_file($sypexGeoMaxFilename) ? $sypexGeoMaxFilename : null;
    }

    private function fixIp(string $ip): string
    {
        $p = strpos($ip, ',');
        if ($p !== false) {
            $ip = substr($ip, 0, $p - 1);
        }

        $ip = trim($ip);

        return $ip;
    }
}
