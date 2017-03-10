<?php

namespace DayRev\Extractor\Provider;

use DayRev\Extractor\Content;
use DayRev\Extractor\Provider;
use Embedly\Embedly as EmbedlySDK;

/**
 * Driver class that handles Embedly interactions.
 */
class Embedly extends Provider
{
    /**
     * Embedly API key.
     *
     * @var string
     */
    protected $api_key;

    /**
     * Initializes the class.
     *
     * @param array $data Key value data to populate object properties.
     *
     * @return void
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->extractor = new EmbedlySDK([
            'key' => $this->api_key,
        ]);
    }

    /**
     * Extracts content for a given URL.
     *
     * @param string $url The URL to extract content from.
     *
     * @return Content
     */
    public function extract(string $url): Content
    {
        $data = $this->extractor->extract(['url' => $url]);

        $content = new Content();
        $content->text = $this->cleanText($data[0]->content);

        return $content;
    }

    /**
     * Cleans text by removing HTML tags and trailing whitespace.
     *
     * @param string $text The text to clean.
     *
     * @return string
     */
    private function cleanText(string $text): string
    {
        $text = str_replace('<p>', '', $text);
        $text = str_replace('</p>', "\n", $text);
        $text = strip_tags($text);

        return trim($text);
    }
}
