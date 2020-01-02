<?php

namespace Gupalo\GeoIp;

class GeoIpRecordExtended extends GeoIpRecord
{
    public function getSypexLatitude(): ?float
    {
        return $this->sypexLatitude;
    }

    public function getSypexLongitude(): ?float
    {
        return $this->sypexLongitude;
    }

    public function getSypexCity(): ?string
    {
        return $this->sypexCity;
    }

    public function getSypexCountryCode(): ?string
    {
        return $this->sypexCountryCode;
    }

    public function getSypexCountry(): ?string
    {
        return $this->sypexCountry;
    }

    public function getMaxMindCountryContinentCode(): ?string
    {
        return $this->maxMindCountryContinentCode;
    }

    public function getMaxMindCountryCountryCode(): ?string
    {
        return $this->maxMindCountryCountryCode;
    }

    public function getMaxMindCityCity(): ?string
    {
        return $this->maxMindCityCity;
    }

    public function getMaxMindCityPostalCode(): ?string
    {
        return $this->maxMindCityPostalCode;
    }

    public function getMaxMindCityContinentCode(): ?string
    {
        return $this->maxMindCityContinentCode;
    }

    public function getMaxMindCityCountryCode(): ?string
    {
        return $this->maxMindCityCountryCode;
    }

    public function getMaxMindCityLatitude(): ?float
    {
        return $this->maxMindCityLatitude;
    }

    public function getMaxMindCityLongitude(): ?float
    {
        return $this->maxMindCityLongitude;
    }

    public function getMaxMindDomainDomain(): ?string
    {
        return $this->maxMindDomainDomain;
    }

    public function getMaxMindIspAsn(): ?string
    {
        return $this->maxMindIspAsn;
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
