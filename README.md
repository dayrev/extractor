# Extractor
[![Build Status](https://travis-ci.org/dayrev/extractor.svg?branch=master)](https://travis-ci.org/dayrev/extractor)
[![Coverage Status](https://coveralls.io/repos/github/dayrev/extractor/badge.svg?branch=master)](https://coveralls.io/github/dayrev/extractor?branch=master)
[![Latest Stable Version](https://poser.pugx.org/dayrev/extractor/v/stable.png)](https://packagist.org/packages/dayrev/extractor)

## Overview

Extractor provides an elegant interface to extract content from a URL using a variety of third-party providers.

**Supported Providers**

 * [Embedly](https://github.com/embedly/embedly-php)
 * [Goose](https://github.com/scotteh/php-goose)

## Installation
Run the following [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) command to add the package to your project:

```
composer require dayrev/extractor
```

Alternatively, add `"dayrev/extractor": "^1.0"` to your composer.json file.

## Usage
```php
$extractor = DayRev\Extractor\Provider::instance('embedly', ['api_key' => 'YOURKEYHERE']);
$content = $extractor->extract('http://www.espn.com/espn/wire/_/section/ncf/id/18398497');
```

## Tests
To run the test suite, run the following commands from the root directory:

```
composer install
vendor/bin/phpunit -d embedly_api_key=YOUR_EMBEDLY_API_KEY
```

> **Note:** A valid Embedly API key is required when running the integration tests.
