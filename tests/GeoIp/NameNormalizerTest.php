<?php

namespace Gupalo\Tests\GeoIp;

use Gupalo\GeoIp\NameNormalizer;
use PHPUnit\Framework\TestCase;

class NameNormalizerTest extends TestCase
{
public function testNormalize(): void
    {
        self::assertSame('RU/Linevo', NameNormalizer::normalize('RU/Linëvo'));
    }
}
