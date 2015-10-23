## Overview

Extractor provides an elegant interface to extract content from a URL using a variety of third-party tools and services.

**Supported Providers:**

 * Embedly
 * Goose

##Usage

    $extractor = Extractor\Provider::instance('embedly', array('api_key' => 'YOURKEYHERE'));
    $content = $extractor->extract($this->url)->text;
