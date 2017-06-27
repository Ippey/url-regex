# UrlRegex
> Regular expression for matching URLs

Based on this [gist](https://gist.github.com/dperini/729294) by Diego Perini.

## Install
```
composer install Ippey/UrlRegex
```

## Usage
```php
<?php
require_once('vendor/autoload.php');

use Ippey\UrlRegex;

// true
$result = Ippey\UrlRegex::isMatch('This contains URL. http://www.google.com');

// false
$result = Ippey\UrlRegex::isMatch('This contains no URL.');

// array('http://www.google.com')
$result = Ippey\UrlRegex::match('This contains URL. http://www.google.com');

// array()
$result = Ippey\UrlRegex::match('This contains no URL.');

// array('https://www.google.co.jp/?q=github', 'https://www.github.com')
$result = Ippey\UrlRegex::match('This contains URL. https://www.google.co.jp/?q=github and https://www.github.com');

```

## Copyright
[Ippei Sumida](github.com/Ippey/)

## License
MIT