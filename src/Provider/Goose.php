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
     * @param array $data
     *
     * @return void
     */
    public function __construct(array $data = array())
    {
        parent::__construct($data);

        $this->extractor = new GooseSDK(get_object_vars($this));
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
