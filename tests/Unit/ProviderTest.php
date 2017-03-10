<?php

namespace DayRev\Extractor\Tests\Unit;

use DayRev\Extractor\Provider;

class ProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testProviderIsGoose()
    {
        $provider = Provider::instance('goose');

        $this->assertInstanceOf('DayRev\Extractor\Provider\Goose', $provider);
    }

    public function testProviderIsEmbedly()
    {
        $provider = Provider::instance('embedly');

        $this->assertInstanceOf('DayRev\Extractor\Provider\Embedly', $provider);
    }

    public function testProviderIsInvalid()
    {
        $provider = Provider::instance('caterpillar');

        $this->assertFalse($provider);
    }

    public function testProviderMetaDataIsSet()
    {
        $provider = Provider::instance('embedly', ['api_key' => 'SDGJ8924TFDSF713J']);

        $this->assertObjectHasAttribute('api_key', $provider);
        $this->assertAttributeEquals('SDGJ8924TFDSF713J', 'api_key', $provider);
    }
}
