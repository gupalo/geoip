<?php

namespace Gupalo\GeoIp;

class GeoIpExtended extends GeoIp
{
    public function getSypexCityRaw()
    {
        return $this->sypexCityRaw;
    }

    public function getMaxMindCountryRaw()
    {
        return $this->maxMindCountryRaw;
    }

    public function getMaxMindCityRaw()
    {
        return $this->maxMindCityRaw;
    }

    public function getMaxMindDomainRaw()
    {
        return $this->maxMindDomainRaw;
    }

    public function getMaxMindIspRaw()
    {
        return $this->maxMindIspRaw;
    }

    public function getSypexCityLatitude(): ?float
    {
        return $this->sypexCityLatitude;
    }

    public function getSypexCityLongitude(): ?float
    {
        return $this->sypexCityLongitude;
    }

    public function getSypexCity(): ?string
    {
        return $this->sypexCity;
    }

    public function getSypexCityOkato(): ?int
    {
        return $this->sypexCityOkato;
    }

    public function getSypexCityVk(): ?bool
    {
        return $this->sypexCityVk;
    }

    public function getSypexCityPopulation(): ?int
    {
        return $this->sypexCityPopulation;
    }

    public function getSypexCityTel(): ?string
    {
        return $this->sypexCityTel;
    }

    public function getSypexCityPostalCode(): ?string
    {
        return $this->sypexCityPostalCode;
    }

    public function getSypexRegionLatitude(): ?float
    {
        return $this->sypexRegionLatitude;
    }

    public function getSypexRegionLongitude(): ?float
    {
        return $this->sypexRegionLongitude;
    }

    public function getSypexRegion(): ?string
    {
        return $this->sypexRegion;
    }

    public function getSypexRegionCode(): ?string
    {
        return $this->sypexRegionCode;
    }

    public function getSypexRegionTimezone(): ?string
    {
        return $this->sypexRegionTimezone;
    }

    public function getSypexRegionOkato(): ?int
    {
        return $this->sypexRegionOkato;
    }

    public function getSypexRegionAuto(): ?string
    {
        return $this->sypexRegionAuto;
    }

    public function getSypexRegionVk(): ?bool
    {
        return $this->sypexRegionVk;
    }

    public function getSypexCountryLatitude(): ?float
    {
        return $this->sypexCountryLatitude;
    }

    public function getSypexCountryLongitude(): ?float
    {
        return $this->sypexCountryLongitude;
    }

    public function getSypexCountry(): ?string
    {
        return $this->sypexCountry;
    }

    public function getSypexCountryCode(): ?string
    {
        return $this->sypexCountryCode;
    }

    public function getSypexCountryContinentCode(): ?string
    {
        return $this->sypexCountryContinentCode;
    }

    public function getSypexCountryTimezone(): ?string
    {
        return $this->sypexCountryTimezone;
    }

    public function getSypexCountryArea(): ?int
    {
        return $this->sypexCountryArea;
    }

    public function getSypexCountryPopulation(): ?int
    {
        return $this->sypexCountryPopulation;
    }

    public function getSypexCountryCapital(): ?string
    {
        return $this->sypexCountryCapital;
    }

    public function getSypexCountryCurrencyCode(): ?string
    {
        return $this->sypexCountryCurrencyCode;
    }

    public function getSypexCountryPhoneCode(): ?string
    {
        return $this->sypexCountryPhoneCode;
    }

    public function getSypexCountryNeighbours(): ?string
    {
        return $this->sypexCountryNeighbours;
    }

    public function getSypexCountryVk(): ?bool
    {
        return $this->sypexCountryVk;
    }

    public function getMaxMindCountryContinentCode(): ?string
    {
        return $this->maxMindCountryContinentCode;
    }

    public function getMaxMindCountryContinent(): ?string
    {
        return $this->maxMindCountryContinent;
    }

    public function getMaxMindCountryCountryCode(): ?string
    {
        return $this->maxMindCountryCountryCode;
    }

    public function getMaxMindCountryCountry(): ?string
    {
        return $this->maxMindCountryCountry;
    }

    public function getMaxMindCountryRegisteredCountryCode(): ?string
    {
        return $this->maxMindCountryRegisteredCountryCode;
    }

    public function getMaxMindCountryRegisteredCountry(): ?string
    {
        return $this->maxMindCountryRegisteredCountry;
    }

    public function getMaxMindCityCity(): ?string
    {
        return $this->maxMindCityCity;
    }

    public function getMaxMindCityContinentCode(): ?string
    {
        return $this->maxMindCityContinentCode;
    }

    public function getMaxMindCityContinent(): ?string
    {
        return $this->maxMindCityContinent;
    }

    public function getMaxMindCityCountryCode(): ?string
    {
        return $this->maxMindCityCountryCode;
    }

    public function getMaxMindCityCountry(): ?string
    {
        return $this->maxMindCityCountry;
    }

    public function getMaxMindCityRegisteredCountryCode(): ?string
    {
        return $this->maxMindCityRegisteredCountryCode;
    }

    public function getMaxMindCityRegisteredCountry(): ?string
    {
        return $this->maxMindCityRegisteredCountry;
    }

    public function getMaxMindCityLatitude(): ?float
    {
        return $this->maxMindCityLatitude;
    }

    public function getMaxMindCityLongitude(): ?float
    {
        return $this->maxMindCityLongitude;
    }

    public function getMaxMindCityLocationAccuracyRadius(): ?float
    {
        return $this->maxMindCityLocationAccuracyRadius;
    }

    public function getMaxMindCitySubdivision(): ?string
    {
        return $this->maxMindCitySubdivision;
    }

    public function getMaxMindCityTimeZone(): ?string
    {
        return $this->maxMindCityTimeZone;
    }

    public function getMaxMindCityPostalCode(): ?string
    {
        return $this->maxMindCityPostalCode;
    }

    public function getMaxMindDomainDomain(): ?string
    {
        return $this->maxMindDomainDomain;
    }

    public function getMaxMindIspAsnNumber(): ?string
    {
        return $this->maxMindIspAsnNumber;
    }

    public function getMaxMindIspAsnOrganization(): ?string
    {
        return $this->maxMindIspAsnOrganization;
    }

    public function getMaxMindIspIsp(): ?string
    {
        return $this->maxMindIspIsp;
    }

    public function getMaxMindIspOrganization(): ?string
    {
        return $this->maxMindIspOrganization;
    }
}
