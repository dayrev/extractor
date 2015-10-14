<?php

namespace Extractor;

class Provider
{
    /**
     * Gets an instance of the given provider.
     *
     * @param string $provider The name of the provider to instantiate.
     *
     * @return Provider|bool
     */
    public static function instance($provider)
    {
        $class = __NAMESPACE__ . '\\Provider\\' . ucfirst($provider);
        if (!class_exists($class)) {
            return false;
        }

        return new $class();
    }
}
