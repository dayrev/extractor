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
    protected $api_key;

    /**
     * Extracts content for a given URL.
     *
     * @param string $url The URL to extract content from.
     *
     * @return Content
     */
    public function extract(string $url) : Content
    {
        $extractor = new EmbedlySDK(array(
            'key' => $this->api_key,
        ));

        $data = $extractor->extract(array('url' => $url));

        $content = new Content();
        $content->text = $data[0]->content;

        return $content;
    }
}
