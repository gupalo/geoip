<?php

namespace Gupalo\GeoIp;

class GeoIpRecord
{
    /** @var string */
    protected $ip;

    /** @var bool|null */
    private $isValidIp;

    /** @var float|null */
    protected $sypexLatitude;

    /** @var float|null */
    protected $sypexLongitude;

    /** @var string|null */
    protected $sypexCity;

    /** @var string|null */
    protected $sypexCountryCode;

    /** @var string|null */
    protected $sypexCountry;

    /** @var string|null */
    protected $maxMindCountryContinentCode;

    /** @var string|null */
    protected $maxMindCountryCountryCode;

    /** @var string|null */
    protected $maxMindCityCity;

    /** @var string|null */
    protected $maxMindCityPostalCode;

    /** @var string|null */
    protected $maxMindCityContinentCode;

    /** @var string|null */
    protected $maxMindCityCountryCode;

    /** @var float|null */
    protected $maxMindCityLatitude;

    /** @var float|null */
    protected $maxMindCityLongitude;

    /** @var string|null */
    protected $maxMindDomainDomain;

    /** @var string|null */
    protected $maxMindIspAsn;

    /** @var string|null */
    protected $maxMindIspAsnOrganization;

    /** @var string|null */
    protected $maxMindIspIsp;

    /** @var string|null */
    protected $maxMindIspOrganization;

    public function __construct(
        ?string $ip,
        ?bool $isValidIp,
        ?float $sypexLatitude,
        ?float $sypexLongitude,
        ?string $sypexCity,
        ?string $sypexCountryCode,
        ?string $sypexCountry,
        ?string $maxMindCountryContinentCode,
        ?string $maxMindCountryCountryCode,
        ?string $maxMindCityCity,
        ?string $maxMindCityPostalCode,
        ?string $maxMindCityContinentCode,
        ?string $maxMindCityCountryCode,
        ?float $maxMindCityLatitude,
        ?float $maxMindCityLongitude,
        ?string $maxMindDomainDomain,
        ?string $maxMindIspAsn,
        ?string $maxMindIspAsnOrganization,
        ?string $maxMindIspIsp,
        ?string $maxMindIspOrganization
    ) {
        $this->ip = $ip;
        $this->isValidIp = $isValidIp;
        $this->sypexLatitude = $sypexLatitude;
        $this->sypexLongitude = $sypexLongitude;
        $this->sypexCity = $sypexCity;
        $this->sypexCountryCode = $sypexCountryCode;
        $this->sypexCountry = $sypexCountry;
        $this->maxMindCountryContinentCode = $maxMindCountryContinentCode;
        $this->maxMindCountryCountryCode = $maxMindCountryCountryCode;
        $this->maxMindCityCity = $maxMindCityCity;
        $this->maxMindCityPostalCode = $maxMindCityPostalCode;
        $this->maxMindCityContinentCode = $maxMindCityContinentCode;
        $this->maxMindCityCountryCode = $maxMindCityCountryCode;
        $this->maxMindCityLatitude = $maxMindCityLatitude;
        $this->maxMindCityLongitude = $maxMindCityLongitude;
        $this->maxMindDomainDomain = $maxMindDomainDomain;
        $this->maxMindIspAsn = $maxMindIspAsn;
        $this->maxMindIspAsnOrganization = $maxMindIspAsnOrganization;
        $this->maxMindIspIsp = $maxMindIspIsp;
        $this->maxMindIspOrganization = $maxMindIspOrganization;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function isValidIp(): ?bool
    {
        return $this->isValidIp;
    }

    public function getCity(): ?string
    {
        return $this->maxMindCityCity ?? $this->sypexCity;
    }

    public function getCountryCode(): ?string
    {
        return $this->maxMindCityCountryCode ?? $this->maxMindCountryCountryCode ?? $this->sypexCountryCode;
    }

    public function getCountry(): ?string
    {
        return $this->maxMindCityCountry ?? $this->maxMindCountryCountry ?? $this->sypexCountry;
    }

    public function getContinentCode(): ?string
    {
        return $this->maxMindCityContinentCode ?? $this->maxMindCountryContinentCode;
    }

    public function getPostalCode(): ?string
    {
        return $this->maxMindCityPostalCode;
    }

    public function getDomain(): ?string
    {
        return $this->maxMindDomainDomain;
    }

    public function getAsn(): ?string
    {
        return $this->maxMindIspAsn;
    }

    public function getAsnOrganization(): ?string
    {
        return $this->maxMindIspAsnOrganization;
    }

    public function getIsp(): ?string
    {
        return $this->maxMindIspIsp;
    }

    public function getIspOrganization(): ?string
    {
        return $this->maxMindIspOrganization;
    }

    public function getLatitude(): ?float
    {
        return $this->maxMindCityLatitude ?? $this->sypexLatitude;
    }

    public function getLongitude(): ?float
    {
        return $this->maxMindCityLongitude ?? $this->sypexLongitude;
    }
}
