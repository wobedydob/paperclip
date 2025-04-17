# 📎 Paperclip
A PHP CLI tool to manage custom commands.

# Setup
1. Install the package via composer
2. Run `composer install` to install the required packages
3. Create a PHP file that will be used for cli execution (for example `execute.php`)
4. Add the following code to the file:
```php
#!/usr/bin/env php
<?php
use Paperclip\Enums\ColorOption;
use Paperclip\Paperclip;

# Composer autoload
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

# Paperclip setup
Paperclip::instance()
    ->setup($argv)
    ->execute();
```

## Customising Paperclip
You can also customise the look of Paperclip by adding a config array to the `Paperclip::instance()->setup()` method.
```php
# Paperclip setup
Paperclip::instance()
    ->setup($argv,
        [
            'display_subject' => false,
            'colors' => [
                'banner' => [
                    'row' => ColorOption::DARK_GRAY->value,
                    'braces' => ColorOption::LIGHT_RED->value,
                    'slashes' => ColorOption::LIGHT_RED->value,
                    'title' => ColorOption::WHITE->value,
                ],
                'info' => [
                    'title' => ColorOption::YELLOW->value,
                    'text' => ColorOption::LIGHT_GRAY->value,
                    'description' => ColorOption::WHITE->value,
                    'highlight' => ColorOption::GREEN->value,
                    'parameter' => ColorOption::WHITE->value,
                ],
                'notes' => [
                    'title' => ColorOption::MAGENTA->value,
                    'text' => COLOROPTION::WHITE->value,
                    'highlight' => ColorOption::LIGHT_YELLOW->value,
                    'bullet' => COLOROPTION::MAGENTA->value,
                ]
            ]
        ]
    )
    ->execute();
```
(This example shows the default settings)

# Creating commands
From the root of your project you can add Commands however you like.
The default structure is classes/Commands/... (in composer: NAMESPACE/Commands/...)

Make the new command be a child of the `Command.php` class and register this in the
`paperclip.commands.json` file in the root of your project.

Example:
```json
[
  'NAMESPACE/Commands/ExampleCommand'
]
```

# Composer packages
```js
- "google/apiclient"
- "vlucas/phpdotenv"
- "google/analytics-data"
```

# PHP Required Extensions
```js
- "bcmath"
- "calendar"
- "Core"
- "ctype"
- "date"
- "dom"
- "exif"
- "FFI"
- "fileinfo"
- "filter"
- "ftp"
- "gettext"
- "hash"
- "iconv"
- "json"
- "libxml"
- "mbstring"
- "openssl"
- "pcntl"
- "pcre"
- "PDO"
- "Phar"
- "posix"
- "random"
- "readline"
- "Reflection"
- "session"
- "shmop"
- "SimpleXML"
- "sockets"
- "sodium"
- "SPL"
- "standard"
- "sysvmsg"
- "sysvsem"
- "sysvshm"
- "tokenizer"
- "xml"
- "xmlreader"
- "xmlwriter"
- "xsl"
- "Zend OPcache"
- "zlib"
```



