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
    public function __construct(array $data = array())
    {
        parent::__construct($data);

        $this->extractor = new EmbedlySDK(array(
            'key' => $this->api_key,
        ));
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
        $data = $this->extractor->extract(array('url' => $url));

        $content = new Content();
        $content->text = $data[0]->content;

        return $content;
    }
}
