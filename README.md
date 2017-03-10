## Overview

Extractor provides an elegant interface to extract content from a URL using a variety of third-party tools and services.

**Supported Providers:**

 * Embedly
 * Goose

##Usage

    $extractor = DayRev\Extractor\Provider::instance('embedly', array('api_key' => 'YOURKEYHERE'));
    $content = $extractor->extract($this->url);

## Tests
To run the test suite, run the following commands from the root directory:

```
composer install
vendor/bin/phpunit -d embedly_api_key=YOUR_EMBEDLY_API_KEY
```

> **Note:** A valid Embedly API key is required when running the integration tests.
