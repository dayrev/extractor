<?php

namespace Extractor\Provider;

use Extractor\Content;
use Extractor\Provider;
use Goose\Client as GooseSDK;

/**
 * Driver class that handles Goose interactions.
 */
class Goose extends Provider
{
    /**
     * Extracts content for a given URL.
     *
     * @param string $url The URL to extract content from.
     *
     * @return Content
     */
    public function extract($url)
    {
        $extractor = new GooseSDK(get_object_vars($this));
        $data = $extractor->extractContent($url);

        $content = new Content();
        $content->text = $data->getCleanedArticleText();

        return $content;
    }
}
