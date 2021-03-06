<?php

namespace DayRev\Extractor\Tests\Integration;

use DayRev\Extractor\Content;
use DayRev\Extractor\Provider;

class ProviderTest extends TestCase
{
    public function testGooseExtractsExpectedContent()
    {
        $provider = Provider::instance('goose');
        $content = $provider->extract('http://www.espn.com/espn/wire/_/section/ncf/id/18398497');

        $this->assertInstanceOf(Content::class, $content);
        $this->assertEquals($this->getExpectedGooseExtractedContent(), $content);
    }

    public function testEmbedlyExtractsExpectedContent()
    {
        $provider = Provider::instance('embedly', ['api_key' => $this->config['embedly_api_key']]);
        $content = $provider->extract('http://www.espn.com/espn/wire/_/section/ncf/id/18398497');

        $this->assertInstanceOf(Content::class, $content);
        $this->assertEquals($this->getExpectedEmbedlyExtractedContent(), $content);
    }

    protected function getDataFileContents(string $filename): string
    {
        return file_get_contents(__DIR__ . '/../Data/' . $filename);
    }

    protected function getExpectedGooseExtractedContent(): Content
    {
        $content = new Content();
        $content->text = $this->getDataFileContents('text-extract-goose.txt');

        return $content;
    }

    protected function getExpectedEmbedlyExtractedContent(): Content
    {
        $content = new Content();
        $content->text = $this->getDataFileContents('text-extract-embedly.txt');

        return $content;
    }
}
