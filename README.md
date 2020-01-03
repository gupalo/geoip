GeoIP Client
============

Adapter for MaxMind and Sypex GeoIP database clients.

Usage
-----

    composer require gupalo/geoip

Put GeoIP databases to some directory. Supported databases:

* GeoIP2-City.mmdb
* GeoIP2-Country.mmdb
* GeoIP2-Domain.mmdb
* GeoIP2-ISP.mmdb
* SxGeoMax.dat

Usage:

    $parser = new GeoIpParser($dir);
    $geoIp = $parser->parse('1.1.1.1');
    
    $ip = $geoip->getIp();
    $isValidIp = $geoip->isValidIp(); 
    $city = $geoip->getCity(); 
    $countryCode = $geoip->getCountryCode(); 
    $country = $geoip->getCountry(); 
    $continentCode = $geoip->getContinentCode(); 
    $postalCode = $geoip->getPostalCode(); 
    $domain = $geoip->getDomain(); 
    $asnNumber = $geoip->getAsnNumber(); 
    $asnOrganization = $geoip->getAsnOrganization(); 
    $isp = $geoip->getIsp(); 
    $organization = $geoip->getOrganization(); 
    $latitude = $geoip->getLatitude(); 
    $longitude = $geoip->getLongitude(); 
    $region = $geoip->getRegion(); 
    $timezone = $geoip->getTimezone(); 
    $currencyCode = $geoip->getCurrencyCode(); 
    $cityPopulation = $geoip->getCityPopulation(); 
    $cityTel = $geoip->getCityTel(); 
    $regionAuto = $geoip->getRegionAuto(); 
    $countryArea = $geoip->getCountryArea(); 
    $countryPopulation = $geoip->getCountryPopulation(); 
    $countryCapital = $geoip->getCountryCapital(); 
    $countryPhoneCode = $geoip->getCountryPhoneCode();

Advanced Usage
--------------

If data may exist in several databases like latitude/longitude then data is taken from the best database:

* MaxMind City
* Sypex (if has city data)
* MaxMind Country
* Sypex

You can get data from specific database:

    $parser = new GeoIpParser($dir);
    $geoIp = $parser->parseAdvanced('1.1.1.1');
    $latitudes = [
        $geoIp->getSypexCityLatitude(),
        $geoIp->getSypexRegionLatitude(),
        $geoIp->getSypexCountryLatitude(),
        $geoIp->getMaxMindCityLatitude(),
    ];

Also you can get raw data from:

    $parser = new GeoIpParser($dir);
    $geoIp = $parser->parseAdvanced('1.1.1.1');
    $raw = [
        $geoIp->getSypexCityRaw(),
        $geoIp->getMaxMindCountryRaw(),
        $geoIp->getMaxMindCityRaw(),
        $geoIp->getMaxMindDomainRaw(),
        $geoIp->getMaxMindIspRaw(),
    ];
