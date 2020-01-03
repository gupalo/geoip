<?php

namespace Gupalo\GeoIp;

class GeoIp
{
    /** @var string */
    protected $ip;

    /** @var bool|null */
    protected $isValidIp;

    /** @var float|null */
    protected $sypexCityLatitude;

    /** @var float|null */
    protected $sypexCityLongitude;

    /** @var string|null */
    protected $sypexCity;

    /** @var int|null */
    protected $sypexCityOkato;

    /** @var bool|null */
    protected $sypexCityVk;

    /** @var int|null */
    protected $sypexCityPopulation;

    /** @var string|null */
    protected $sypexCityTel;

    /** @var string|null */
    protected $sypexCityPostalCode;

    /** @var float|null */
    protected $sypexRegionLatitude;

    /** @var float|null */
    protected $sypexRegionLongitude;

    /** @var string|null */
    protected $sypexRegion;

    /** @var string|null */
    protected $sypexRegionCode;

    /** @var string|null */
    protected $sypexRegionTimezone;

    /** @var int|null */
    protected $sypexRegionOkato;

    /** @var string|null */
    protected $sypexRegionAuto;

    /** @var bool|null */
    protected $sypexRegionVk;

    /** @var float|null */
    protected $sypexCountryLatitude;

    /** @var float|null */
    protected $sypexCountryLongitude;

    /** @var string|null */
    protected $sypexCountry;

    /** @var string|null */
    protected $sypexCountryCode;

    /** @var string|null */
    protected $sypexCountryContinentCode;

    /** @var string|null */
    protected $sypexCountryTimezone;

    /** @var int|null */
    protected $sypexCountryArea;

    /** @var int|null */
    protected $sypexCountryPopulation;

    /** @var string|null */
    protected $sypexCountryCapital;

    /** @var string|null */
    protected $sypexCountryCurrencyCode;

    /** @var string|null */
    protected $sypexCountryPhoneCode;

    /** @var string|null */
    protected $sypexCountryNeighbours;

    /** @var bool|null */
    protected $sypexCountryVk;

    /** @var string|null */
    protected $maxMindCountryContinentCode;

    /** @var string|null */
    protected $maxMindCountryContinent;

    /** @var string|null */
    protected $maxMindCountryCountryCode;

    /** @var string|null */
    protected $maxMindCountryCountry;

    /** @var string|null */
    protected $maxMindCountryRegisteredCountryCode;

    /** @var string|null */
    protected $maxMindCountryRegisteredCountry;

    /** @var string|null */
    protected $maxMindCityCity;

    /** @var string|null */
    protected $maxMindCityContinentCode;

    /** @var string|null */
    protected $maxMindCityContinent;

    /** @var string|null */
    protected $maxMindCityCountryCode;

    /** @var string|null */
    protected $maxMindCityCountry;

    /** @var string|null */
    protected $maxMindCityRegisteredCountryCode;

    /** @var string|null */
    protected $maxMindCityRegisteredCountry;

    /** @var float|null */
    protected $maxMindCityLatitude;

    /** @var float|null */
    protected $maxMindCityLongitude;

    /** @var float|null */
    protected $maxMindCityLocationAccuracyRadius;

    /** @var string|null */
    protected $maxMindCitySubdivision;

    /** @var string|null */
    protected $maxMindCityTimeZone;

    /** @var string|null */
    protected $maxMindCityPostalCode;

    /** @var string|null */
    protected $maxMindDomainDomain;

    /** @var string|null */
    protected $maxMindIspAsnNumber;

    /** @var string|null */
    protected $maxMindIspAsnOrganization;

    /** @var string|null */
    protected $maxMindIspIsp;

    /** @var string|null */
    protected $maxMindIspOrganization;

    /** @var mixed|null */
    protected $sypexCityRaw;

    /** @var mixed|null */
    protected $maxMindCountryRaw;

    /** @var mixed|null */
    protected $maxMindCityRaw;

    /** @var mixed|null */
    protected $maxMindDomainRaw;

    /** @var mixed|null */
    protected $maxMindIspRaw;

    public function __construct(
        ?string $ip,
        ?bool $isValidIp,
        $sypexCityRaw,
        $maxMindCountryRaw,
        $maxMindCityRaw,
        $maxMindDomainRaw,
        $maxMindIspRaw,
        ?float $sypexCityLatitude,
        ?float $sypexCityLongitude,
        ?string $sypexCity,
        ?int $sypexCityOkato,
        ?bool $sypexCityVk,
        ?int $sypexCityPopulation,
        ?string $sypexCityTel,
        ?string $sypexCityPostalCode,
        ?float $sypexRegionLatitude,
        ?float $sypexRegionLongitude,
        ?string $sypexRegion,
        ?string $sypexRegionCode,
        ?string $sypexRegionTimezone,
        ?int $sypexRegionOkato,
        ?string $sypexRegionAuto,
        ?bool $sypexRegionVk,
        ?float $sypexCountryLatitude,
        ?float $sypexCountryLongitude,
        ?string $sypexCountry,
        ?string $sypexCountryCode,
        ?string $sypexCountryContinentCode,
        ?string $sypexCountryTimezone,
        ?int $sypexCountryArea,
        ?int $sypexCountryPopulation,
        ?string $sypexCountryCapital,
        ?string $sypexCountryCurrencyCode,
        ?string $sypexCountryPhoneCode,
        ?string $sypexCountryNeighbours,
        ?bool $sypexCountryVk,
        ?string $maxMindCountryContinentCode,
        ?string $maxMindCountryContinent,
        ?string $maxMindCountryCountryCode,
        ?string $maxMindCountryCountry,
        ?string $maxMindCountryRegisteredCountryCode,
        ?string $maxMindCountryRegisteredCountry,
        ?string $maxMindCityCity,
        ?string $maxMindCityContinentCode,
        ?string $maxMindCityContinent,
        ?string $maxMindCityCountryCode,
        ?string $maxMindCityCountry,
        ?string $maxMindCityRegisteredCountryCode,
        ?string $maxMindCityRegisteredCountry,
        ?float $maxMindCityLatitude,
        ?float $maxMindCityLongitude,
        ?string $maxMindCityLocationAccuracyRadius,
        ?string $maxMindCitySubdivision,
        ?string $maxMindCityTimeZone,
        ?string $maxMindCityPostalCode,
        ?string $maxMindDomainDomain,
        ?string $maxMindIspAsnNumber,
        ?string $maxMindIspAsnOrganization,
        ?string $maxMindIspIsp,
        ?string $maxMindIspOrganization
    ) {
        $this->ip = $ip;
        $this->isValidIp = $isValidIp;

        $this->sypexCityLatitude = $sypexCityLatitude;
        $this->sypexCityLongitude = $sypexCityLongitude;
        $this->sypexCity = $sypexCity;
        $this->sypexCityOkato = $sypexCityOkato;
        $this->sypexCityVk = $sypexCityVk;
        $this->sypexCityPopulation = $sypexCityPopulation;
        $this->sypexCityTel = $sypexCityTel;
        $this->sypexCityPostalCode = $sypexCityPostalCode;
        $this->sypexRegionLatitude = $sypexRegionLatitude;
        $this->sypexRegionLongitude = $sypexRegionLongitude;
        $this->sypexRegion = $sypexRegion;
        $this->sypexRegionCode = $sypexRegionCode;
        $this->sypexRegionTimezone = $sypexRegionTimezone;
        $this->sypexRegionOkato = $sypexRegionOkato;
        $this->sypexRegionAuto = $sypexRegionAuto;
        $this->sypexRegionVk = $sypexRegionVk;
        $this->sypexCountryLatitude = $sypexCountryLatitude;
        $this->sypexCountryLongitude = $sypexCountryLongitude;
        $this->sypexCountry = $sypexCountry;
        $this->sypexCountryCode = $sypexCountryCode;
        $this->sypexCountryContinentCode = $sypexCountryContinentCode;
        $this->sypexCountryTimezone = $sypexCountryTimezone;
        $this->sypexCountryArea = $sypexCountryArea;
        $this->sypexCountryPopulation = $sypexCountryPopulation;
        $this->sypexCountryCapital = $sypexCountryCapital;
        $this->sypexCountryCurrencyCode = $sypexCountryCurrencyCode;
        $this->sypexCountryPhoneCode = $sypexCountryPhoneCode;
        $this->sypexCountryNeighbours = $sypexCountryNeighbours;
        $this->sypexCountryVk = $sypexCountryVk;

        $this->maxMindCountryContinentCode = $maxMindCountryContinentCode;
        $this->maxMindCountryContinent = $maxMindCountryContinent;
        $this->maxMindCountryCountryCode = $maxMindCountryCountryCode;
        $this->maxMindCountryCountry = $maxMindCountryCountry;
        $this->maxMindCountryRegisteredCountryCode = $maxMindCountryRegisteredCountryCode;
        $this->maxMindCountryRegisteredCountry = $maxMindCountryRegisteredCountry;
        $this->maxMindCityCity = $maxMindCityCity;
        $this->maxMindCityContinentCode = $maxMindCityContinentCode;
        $this->maxMindCityContinent = $maxMindCityContinent;
        $this->maxMindCityCountryCode = $maxMindCityCountryCode;
        $this->maxMindCityCountry = $maxMindCityCountry;
        $this->maxMindCityRegisteredCountryCode = $maxMindCityRegisteredCountryCode;
        $this->maxMindCityRegisteredCountry = $maxMindCityRegisteredCountry;
        $this->maxMindCityLatitude = $maxMindCityLatitude;
        $this->maxMindCityLongitude = $maxMindCityLongitude;
        $this->maxMindCityLocationAccuracyRadius = $maxMindCityLocationAccuracyRadius;
        $this->maxMindCitySubdivision = $maxMindCitySubdivision;
        $this->maxMindCityTimeZone = $maxMindCityTimeZone;
        $this->maxMindCityPostalCode = $maxMindCityPostalCode;
        $this->maxMindDomainDomain = $maxMindDomainDomain;
        $this->maxMindIspAsnNumber = $maxMindIspAsnNumber;
        $this->maxMindIspAsnOrganization = $maxMindIspAsnOrganization;
        $this->maxMindIspIsp = $maxMindIspIsp;
        $this->maxMindIspOrganization = $maxMindIspOrganization;
        $this->sypexCityRaw = $sypexCityRaw;
        $this->maxMindCountryRaw = $maxMindCountryRaw;
        $this->maxMindCityRaw = $maxMindCityRaw;
        $this->maxMindDomainRaw = $maxMindDomainRaw;
        $this->maxMindIspRaw = $maxMindIspRaw;
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
        return $this->maxMindCityContinentCode ?? $this->maxMindCountryContinentCode ?? $this->sypexCountryContinentCode;
    }

    public function getPostalCode(): ?string
    {
        return $this->maxMindCityPostalCode ?? $this->sypexCityPostalCode;
    }

    public function getDomain(): ?string
    {
        return $this->maxMindDomainDomain;
    }

    public function getAsnNumber(): ?string
    {
        return $this->maxMindIspAsnNumber;
    }

    public function getAsnOrganization(): ?string
    {
        return $this->maxMindIspAsnOrganization;
    }

    public function getIsp(): ?string
    {
        return $this->maxMindIspIsp;
    }

    public function getOrganization(): ?string
    {
        return $this->maxMindIspOrganization;
    }

    public function getLatitude(): ?float
    {
        return $this->maxMindCityLatitude ?? $this->sypexCityLatitude ?? $this->sypexRegionLatitude ?? $this->sypexCountryLatitude;
    }

    public function getLongitude(): ?float
    {
        return $this->maxMindCityLongitude ?? $this->sypexCityLongitude ?? $this->sypexRegionLongitude ?? $this->sypexCountryLongitude;
    }

    public function getRegion(): ?string
    {
        return $this->sypexRegion;
    }

    public function getTimezone(): ?string
    {
        return $this->sypexRegionTimezone ?? $this->sypexCountryTimezone;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->sypexCountryCurrencyCode;
    }

    public function getCityPopulation(): ?int
    {
        return $this->sypexCityPopulation;
    }

    public function getCityTel(): ?int
    {
        return $this->sypexCityTel;
    }

    public function getRegionAuto(): ?string
    {
        return $this->sypexRegionAuto;
    }

    public function getCountryArea(): ?int
    {
        return $this->sypexCountryArea;
    }

    public function getCountryPopulation(): ?int
    {
        return $this->sypexCountryPopulation;
    }

    public function getCountryCapital(): ?string
    {
        return $this->sypexCountryCapital;
    }

    public function getCountryPhoneCode(): ?string
    {
        return $this->sypexCountryPhoneCode;
    }

    public function getCountryNeighbours(): ?string
    {
        return $this->sypexCountryNeighbours;
    }
}
