# 📎 Paperclip
A PHP CLI tool to manage custom commands.

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



