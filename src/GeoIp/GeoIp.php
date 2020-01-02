<?php

namespace Gupalo\GeoIp;

use MaxMind\Db\Reader;
use MaxMind\Db\Reader\InvalidDatabaseException;
use Throwable;

class GeoIp
{
    /** @var string|null */
    private $maxMindCityDbFilename;

    /** @var string|null */
    private $maxMindCountryDbFilename;

    /** @var string|null */
    private $maxMindDomainDbFilename;

    /** @var string|null */
    private $maxMindIspDbFilename;

    /** @var string|null */
    private $sypexGeoMaxFilename;

    /** @var Reader|null */
    private $maxMindCityReader;

    /** @var Reader|null */
    private $maxMindCountryReader;

    /** @var Reader|null */
    private $maxMindDomainReader;

    /** @var Reader|null */
    private $maxMindIspReader;

    /** @var SxGeo|null */
    private $sxGeo;

    public function __construct(
        string $maxMindCityDbFilename = null,
        string $maxMindCountryDbFilename = null,
        string $maxMindDomainDbFilename = null,
        string $maxMindIspDbFilename = null,
        string $sypexGeoMaxFilename = null
    ) {
        $this->maxMindCityDbFilename = $maxMindCityDbFilename;
        $this->maxMindCountryDbFilename = $maxMindCountryDbFilename;
        $this->maxMindDomainDbFilename = $maxMindDomainDbFilename;
        $this->maxMindIspDbFilename = $maxMindIspDbFilename;
        $this->sypexGeoMaxFilename = $sypexGeoMaxFilename;
    }

    public function parse(string $ip): GeoIpRecord
    {
        return $this->doParse($ip, false);
    }

    public function parseExtended(string $ip): GeoIpRecordExtended
    {
        return $this->doParse($ip, true);
    }

    /**
     * @param string $ip
     * @param bool $extended
     * @return GeoIpRecord|GeoIpRecordExtended
     * @noinspection DuplicatedCode
     */
    private function doParse(string $ip, bool $extended): GeoIpRecord
    {
        $this->initReaders();

        $isValidIp = filter_var($ip, FILTER_VALIDATE_IP);

        $sypexLatitude = null;
        $sypexLongitude = null;
        $sypexCity = null;
        $sypexCountryCode = null;
        $sypexCountry = null;
        $maxMindCountryContinentCode = null;
        $maxMindCountryCountryCode = null;
        $maxMindCityCity = null;
        $maxMindCityPostalCode = null;
        $maxMindCityContinentCode = null;
        $maxMindCityCountryCode = null;
        $maxMindCityLatitude = null;
        $maxMindCityLongitude = null;
        $maxMindDomainDomain = null;
        $maxMindIspAsn = null;
        $maxMindIspAsnOrganization = null;
        $maxMindIspIsp = null;
        $maxMindIspOrganization = null;

        if ($isValidIp) {
            $sypexLocation = $this->sxGeo->getCityFull($ip);
            $sypexLatitude = $sypexLocation['city']['lat'] ?? null;
            $sypexLongitude = $sypexLocation['city']['lon'] ?? null;
            $sypexCity = $sypexLocation['city']['name_en'] ?? null;
            $sypexCountryCode = $sypexLocation['country']['iso'] ?? null;
            $sypexCountry = $sypexLocation['country']['name_en'] ?? null;

            try {
                $maxMindCountry = $this->maxMindCountryReader->get($ip);
                $maxMindCountryContinentCode = (!empty($maxMindCountry['continent'])) ? $maxMindCountry['continent']['code'] : null;
                $maxMindCountryCountryCode = (!empty($maxMindCountry['country'])) ? $maxMindCountry['country']['iso_code'] : null;
            } catch (Throwable $e) {
            }
            try {
                $maxMindCity = $this->maxMindCityReader->get($ip);
                $maxMindCityCity = (!empty($maxMindCity['city'])) ? $maxMindCity['city']['names']['en'] : null;
                $maxMindCityPostalCode = (!empty($maxMindCity['postal'])) ? $maxMindCity['postal']['code'] : null;
                $maxMindCityContinentCode = (!empty($maxMindCity['continent'])) ? $maxMindCity['continent']['code'] : null;
                $maxMindCityCountryCode = (!empty($maxMindCity['country'])) ? $maxMindCity['country']['iso_code'] : null;
                $maxMindCityLatitude = (!empty($maxMindCity['location'])) ? $maxMindCity['location']['latitude'] : null;
                $maxMindCityLongitude = (!empty($maxMindCity['location'])) ? $maxMindCity['location']['longitude'] : null;
            } catch (Throwable $e) {
            }
            try {
                $maxMindDomain = $this->maxMindDomainReader->get($ip);
                $maxMindDomainDomain = (!empty($maxMindDomain)) ? $maxMindDomain['domain'] : null;
            } catch (Throwable $e) {
            }
            try {
                $maxMindIsp = $this->maxMindIspReader->get($ip);
                $maxMindIspAsn = (!empty($maxMindIsp) && !empty($maxMindIsp['autonomous_system_number'])) ? $maxMindIsp['autonomous_system_number'] : null;
                $maxMindIspAsnOrganization = (!empty($maxMindIsp) && !empty($maxMindIsp['autonomous_system_organization'])) ? $maxMindIsp['autonomous_system_organization'] : null;
                $maxMindIspIsp = (!empty($maxMindIsp) && !empty($maxMindIsp['isp'])) ? $maxMindIsp['isp'] : null;
                $maxMindIspOrganization = (!empty($maxMindIsp) && !empty($maxMindIsp['organization'])) ? $maxMindIsp['organization'] : null;
            } catch (Throwable $e) {
            }
        }

        $class = $extended ? GeoIpRecordExtended::class : GeoIpRecord::class;

        return new $class(
            $ip,
            $isValidIp,
            $sypexLatitude,
            $sypexLongitude,
            $sypexCity,
            $sypexCountryCode,
            $sypexCountry,
            $maxMindCountryContinentCode,
            $maxMindCountryCountryCode,
            $maxMindCityCity,
            $maxMindCityPostalCode,
            $maxMindCityContinentCode,
            $maxMindCityCountryCode,
            $maxMindCityLatitude,
            $maxMindCityLongitude,
            $maxMindDomainDomain,
            $maxMindIspAsn,
            $maxMindIspAsnOrganization,
            $maxMindIspIsp,
            $maxMindIspOrganization
        );
    }

    private function initReaders(): void
    {
        if (!$this->maxMindCityReader && $this->maxMindCityDbFilename) {
            try {
                $this->maxMindCityReader = new Reader($this->maxMindCityDbFilename);
            } catch (InvalidDatabaseException $e) {
            }
        }
        if (!$this->maxMindCountryReader && $this->maxMindCountryDbFilename) {
            try {
                $this->maxMindCountryReader = new Reader($this->maxMindCountryDbFilename);
            } catch (InvalidDatabaseException $e) {
            }
        }
        if (!$this->maxMindDomainReader && $this->maxMindDomainDbFilename) {
            try {
                $this->maxMindDomainReader = new Reader($this->maxMindDomainDbFilename);
            } catch (InvalidDatabaseException $e) {
            }
        }
        if (!$this->maxMindIspReader && $this->maxMindIspDbFilename) {
            try {
                $this->maxMindIspReader = new Reader($this->maxMindIspDbFilename);
            } catch (InvalidDatabaseException $e) {
            }
        }
        if (!$this->sxGeo && $this->sypexGeoMaxFilename) {
            $this->sxGeo = new SxGeo($this->sypexGeoMaxFilename, SXGEO_BATCH | SXGEO_MEMORY);
        }
    }
}
