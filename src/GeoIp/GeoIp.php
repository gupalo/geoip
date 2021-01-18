<?php

namespace Gupalo\GeoIp;

use JsonSerializable;

class GeoIp implements JsonSerializable
{
    protected ?string $ip;
    protected ?bool $isValidIp;
    protected ?float $sypexCityLatitude;
    protected ?float $sypexCityLongitude;
    protected ?string $sypexCity;
    protected ?int $sypexCityOkato;
    protected ?bool $sypexCityVk;
    protected ?int $sypexCityPopulation;
    protected ?string $sypexCityTel;
    protected ?string $sypexCityPostalCode;
    protected ?float $sypexRegionLatitude;
    protected ?float $sypexRegionLongitude;
    protected ?string $sypexRegion;
    protected ?string $sypexRegionCode;
    protected ?string $sypexRegionTimezone;
    protected ?int $sypexRegionOkato;
    protected ?string $sypexRegionAuto;
    protected ?bool $sypexRegionVk;
    protected ?float $sypexCountryLatitude;
    protected ?float $sypexCountryLongitude;
    protected ?string $sypexCountry;
    protected ?string $sypexCountryCode;
    protected ?string $sypexCountryContinentCode;
    protected ?string $sypexCountryTimezone;
    protected ?int $sypexCountryArea;
    protected ?int $sypexCountryPopulation;
    protected ?string $sypexCountryCapital;
    protected ?string $sypexCountryCurrencyCode;
    protected ?string $sypexCountryPhoneCode;
    protected ?string $sypexCountryNeighbours;
    protected ?bool $sypexCountryVk;
    protected ?string $maxMindCountryContinentCode;
    protected ?string $maxMindCountryContinent;
    protected ?string $maxMindCountryCountryCode;
    protected ?string $maxMindCountryCountry;
    protected ?string $maxMindCountryRegisteredCountryCode;
    protected ?string $maxMindCountryRegisteredCountry;
    protected ?string $maxMindCityCity;
    protected ?string $maxMindCityContinentCode;
    protected ?string $maxMindCityContinent;
    protected ?string $maxMindCityCountryCode;
    protected ?string $maxMindCityCountry;
    protected ?string $maxMindCityRegisteredCountryCode;
    protected ?string $maxMindCityRegisteredCountry;
    protected ?float $maxMindCityLatitude;
    protected ?float $maxMindCityLongitude;
    protected float|null|string $maxMindCityLocationAccuracyRadius;
    protected ?string $maxMindCitySubdivision;
    protected ?string $maxMindCityTimeZone;
    protected ?string $maxMindCityPostalCode;
    protected ?string $maxMindDomainDomain;
    protected ?string $maxMindIspAsnNumber;
    protected ?string $maxMindIspAsnOrganization;
    protected ?string $maxMindIspIsp;
    protected ?string $maxMindIspOrganization;
    protected mixed $sypexCityRaw;
    protected mixed $maxMindCountryRaw;
    protected mixed $maxMindCityRaw;
    protected mixed $maxMindDomainRaw;
    protected mixed $maxMindIspRaw;

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

    public function jsonSerialize(): array
    {
        return [
            'ip' => $this->ip,
            'is_valid_ip' => $this->isValidIp,
            'sypex_city_latitude' => $this->sypexCityLatitude,
            'sypex_city_longitude' => $this->sypexCityLongitude,
            'sypex_city' => $this->sypexCity,
            'sypex_city_okato' => $this->sypexCityOkato,
            'sypex_city_vk' => $this->sypexCityVk,
            'sypex_city_population' => $this->sypexCityPopulation,
            'sypex_city_tel' => $this->sypexCityTel,
            'sypex_city_postal_code' => $this->sypexCityPostalCode,
            'sypex_region_latitude' => $this->sypexRegionLatitude,
            'sypex_region_longitude' => $this->sypexRegionLongitude,
            'sypex_region' => $this->sypexRegion,
            'sypex_region_code' => $this->sypexRegionCode,
            'sypex_region_timezone' => $this->sypexRegionTimezone,
            'sypex_region_okato' => $this->sypexRegionOkato,
            'sypex_region_auto' => $this->sypexRegionAuto,
            'sypex_region_vk' => $this->sypexRegionVk,
            'sypex_country_latitude' => $this->sypexCountryLatitude,
            'sypex_country_longitude' => $this->sypexCountryLongitude,
            'sypex_country' => $this->sypexCountry,
            'sypex_country_code' => $this->sypexCountryCode,
            'sypex_country_continent_code' => $this->sypexCountryContinentCode,
            'sypex_country_timezone' => $this->sypexCountryTimezone,
            'sypex_country_area' => $this->sypexCountryArea,
            'sypex_country_population' => $this->sypexCountryPopulation,
            'sypex_country_capital' => $this->sypexCountryCapital,
            'sypex_country_currency_code' => $this->sypexCountryCurrencyCode,
            'sypex_country_phone_code' => $this->sypexCountryPhoneCode,
            'sypex_country_neighbours' => $this->sypexCountryNeighbours,
            'sypex_country_vk' => $this->sypexCountryVk,
            'max_mind_country_continent_code' => $this->maxMindCountryContinentCode,
            'max_mind_country_continent' => $this->maxMindCountryContinent,
            'max_mind_country_country_code' => $this->maxMindCountryCountryCode,
            'max_mind_country_country' => $this->maxMindCountryCountry,
            'max_mind_country_registered_country_code' => $this->maxMindCountryRegisteredCountryCode,
            'max_mind_country_registered_country' => $this->maxMindCountryRegisteredCountry,
            'max_mind_city_city' => $this->maxMindCityCity,
            'max_mind_city_continent_code' => $this->maxMindCityContinentCode,
            'max_mind_city_continent' => $this->maxMindCityContinent,
            'max_mind_city_country_code' => $this->maxMindCityCountryCode,
            'max_mind_city_country' => $this->maxMindCityCountry,
            'max_mind_city_registered_country_code' => $this->maxMindCityRegisteredCountryCode,
            'max_mind_city_registered_country' => $this->maxMindCityRegisteredCountry,
            'max_mind_city_latitude' => $this->maxMindCityLatitude,
            'max_mind_city_longitude' => $this->maxMindCityLongitude,
            'max_mind_city_location_accuracy_radius' => $this->maxMindCityLocationAccuracyRadius,
            'max_mind_city_subdivision' => $this->maxMindCitySubdivision,
            'max_mind_city_time_zone' => $this->maxMindCityTimeZone,
            'max_mind_city_postal_code' => $this->maxMindCityPostalCode,
            'max_mind_domain_domain' => $this->maxMindDomainDomain,
            'max_mind_isp_asn_number' => $this->maxMindIspAsnNumber,
            'max_mind_isp_asn_organization' => $this->maxMindIspAsnOrganization,
            'max_mind_isp_isp' => $this->maxMindIspIsp,
            'max_mind_isp_organization' => $this->maxMindIspOrganization,
            'sypex_city_raw' => $this->sypexCityRaw,
            'max_mind_country_raw' => $this->maxMindCountryRaw,
            'max_mind_city_raw' => $this->maxMindCityRaw,
            'max_mind_domain_raw' => $this->maxMindDomainRaw,
            'max_mind_isp_raw' => $this->maxMindIspRaw,
        ];
    }
}
