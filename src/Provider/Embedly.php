<?php

namespace Extractor\Provider;

use Embedly\Embedly as EmbedlySDK;
use Extractor\Content;
use Extractor\Provider;

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
    public function extract($url)
    {
        $extractor = new EmbedlySDK(array(
            'key' => $this->api_key,
        ));

        $content = new Content();
        $content->text = $extractor->extract(array('url' => $url));

        return $content;
    }
}
