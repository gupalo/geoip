GeoIP Client
============

Adapter for MaxMind and Sypex GeoIP database clients.

Usage
-----

    composer require gupalo/geoip

Put GeoIP databases to some directory. Supported databases:

* GeoIP2-City.mmdb or GeoLite2-City.mmdb
* GeoIP2-Country.mmdb or GeoLite2-Country.mmdb
* GeoIP2-Domain.mmdb
* GeoIP2-ISP.mmdb
* SxGeoMax.dat

You can download MaxMind lite databases:

    export MAX_MIND_LICENSE_KEY="XXXXXXXXXXXXXXXX" # you need to register to get the key
    export TARGET_DIR="/opt/geoip" # or any other folder where you keep geoip files
    curl "https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-Country&suffix=tar.gz&license_key=${MAX_MIND_LICENSE_KEY}" | tar zxf - -C ${TARGET_DIR}/ --strip-components=1 --no-anchored --wildcards *.mmdb
    curl "https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-City&suffix=tar.gz&license_key=${MAX_MIND_LICENSE_KEY}" | tar zxf - -C ${TARGET_DIR}/ --strip-components=1 --no-anchored --wildcards *.mmdb

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

* MaxMind City (if not available - MaxMind City Lite)
* Sypex (if has city data)
* MaxMind Country (if not available - MaxMind Country Lite)
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

Symfony
-------

Add to `config/services.yaml`

    Gupalo\GeoIp\GeoIpParser:
        arguments: ['%kernel.project_dir%/data/geoip']

    Gupalo\GeoIp\Twig\GeoIpExtension:
        tags: [twig.extension]

Use with autowire

    /**
     * @Route("/test", name="test")
     */
    public function test(GeoIpParser $geoIpParser): Response
    {
        dd($geoIpParser->parse('1.1.1.1'));
    }

`GeoIpExtension` is optional to add but if you added it you have Twig filters:

* `domain_ip`: convert domain name or IP to IP - `'google.com'|domain_ip`, `'1.1.1.1'|domain_ip`
* `ip_country_code`: convert IP to country code - `'1.1.1.1'|ip_country_code` - US, AU, ...
* `ip_country`: convert IP to country name - `'1.1.1.1'|ip_country` - Australia, Russia, ...
* `ip_flag`: convert IP to HTML with flag - `'1.1.1.1'|ip_flag`
* `country_code_flag`: convert country code to HTML with flag - `'RU'|country_code_flag`

To use flags copy `public/css/flags.css` and `public/img/flags.png` to your public folder.

Add to `base.html.twig` or other template:

    <link rel="stylesheet" href="{{ asset('css/flags.css') }}">
