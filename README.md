MiniSuite 6.0.0
===============

MiniSuite is a very concise and flexible unit testing tool with beautiful reports and a simple API.

![A MiniSuite report](https://github.com/pyrsmk/MiniSuite/raw/master/screenshot.jpg)

Installing
----------

```
composer require pyrsmk/minisuite
```

Example
-------

Notes
-----

The `assert` PHP instruction will only run if the `zend.assertions` directive is set to `1`. Please update your `php.ini` if this is not the case. Consider to run unit tests only in development environments. Here's some explanations on [assert](http://php.net/manual/en/function.assert.php) behavior.

License
-------

MiniSuite is released under the [MIT license](http://dreamysource.mit-license.org).
