<?php

namespace DayRev\Extractor\Tests\Integration;

use DayRev\Extractor\Content;
use DayRev\Extractor\Provider;
use Mockery;
use ReflectionProperty;
use stdClass;

class ProviderTest extends TestCase
{
    public function testGooseExtractsExpectedContent()
    {
        $provider = Provider::instance('goose');
        $content = $provider->extract('http://www.espn.com/espn/wire/_/section/ncf/id/18398497');

        $this->assertInstanceOf('DayRev\Extractor\Content', $content);
        $this->assertEquals($this->getExpectedContentText(), $content->text);
    }

    public function testEmbedlyExtractsExpectedContent()
    {
        $extractor = Mockery::mock('Embedly\Embedly', array('api_key' => 'SDGJ8924TFDSF713J'))
            ->shouldReceive('extract')
            ->andReturn($this->getEmbedlyExtractedContent())
            ->getMock();

        $provider = Provider::instance('embedly');
        $this->setProtectedProviderProperty($provider, 'extractor', $extractor);

        $content = $provider->extract('http://www.espn.com/espn/wire/_/section/ncf/id/18398497');

        $this->assertInstanceOf('DayRev\Extractor\Content', $content);
        $this->assertEquals($this->getExpectedContentText(), $content->text);
    }

    protected function setProtectedProviderProperty(Provider $provider, string $property, $value)
    {
        $reflected_property = new ReflectionProperty(get_class($provider), $property);
        $reflected_property->setAccessible(true);
        $reflected_property->setValue($provider, $value);
    }

    protected function getEmbedlyExtractedContent(): array
    {
        $data = new stdClass();
        $data->content = $this->getExpectedContentText();

        return array($data);
    }

    protected function getExpectedContentText(): string
    {
        return file_get_contents(__DIR__ . '/../Data/extracted-text.txt');
    }
}
