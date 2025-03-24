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

# Composer autoload
$autoload = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoload)) {
    echo "Composer autoload file not found. Please run `composer install` first.\n";
    exit;
}
require $autoload;

# Paperclip setup
if (!file_exists(__DIR__ . '/vendor/wuppo/paperclip')) {
    echo "Paperclip not found. Please install it first. Please run `composer require wuppo/paperclip`\n";
    exit;
}

const PROJECT_NAME = 'NAME_OF_YOUR_PROJECT';
$paperclip = new Paperclip\Paperclip($argv);
$paperclip->execute();
```

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



