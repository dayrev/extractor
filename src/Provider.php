<?php

namespace DayRev\Extractor;

/**
 * Adapter class that handles extractor provider interactions.
 */
abstract class Provider
{
    /**
     * Gets an instance of the given provider.
     *
     * @param string $provider The name of the provider to instantiate.
     * @param array $data Optional provider data.
     *
     * @return Provider|bool
     */
    public static function instance($provider, $data = array())
    {
        $class = __NAMESPACE__ . '\\Provider\\' . ucfirst($provider);
        if (!class_exists($class)) {
            return false;
        }

        return new $class($data);
    }

    /**
     * Initializes the class.
     *
     * @param array $data
     *
     * @return void
     */
    public function __construct(array $data = array())
    {
        if (!empty($data)) {
            $this->loadData($data);
        }
    }

    /**
     * Attempts to map array data to object properties.
     *
     * @param array $data
     *
     * @return void
     */
    public function loadData(array $data = array())
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Extracts content for a given URL.
     *
     * @param string $url The URL to extract content from.
     *
     * @return Content
     */
    abstract public function extract($url);
}
