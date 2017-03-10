<?php

namespace DayRev\Extractor\Provider;

use DayRev\Extractor\Content;
use DayRev\Extractor\Provider;
use Goose\Client as GooseSDK;

/**
 * Driver class that handles Goose interactions.
 */
class Goose extends Provider
{
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

        $this->extractor = new GooseSDK($data);
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
        $data = $this->extractor->extractContent($url);

        $content = new Content();
        $content->text = $data->getCleanedArticleText();

        return $content;
    }
}
