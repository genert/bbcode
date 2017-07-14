BBCode
================

> BBCode parser from or to HTML.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/Genert/BBCode.svg?branch=master)](https://travis-ci.org/Genert/BBCode)

## Installation

[PHP](https://php.net) 7.1+ is required. 

To get the latest version of BBCode, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require genert/bbcode
```

Once BBCode is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `\Genert\BBCode\BBCodeServiceProvider::class,`

You can register facades in the `aliases` key of your `config/app.php` file if you like.

* `'BBCode' => \Genert\BBCode\Facades\BBCode::class,`

## Contributions & Issues
Contributions are welcome. Please clearly explain the purpose of the PR and follow the current style.

Issues can be resolved quickest if they are descriptive and include both a reduced test case and a set of steps to reproduce.

## Licence
The `genert/bbcode` library is copyright © [Genert Org](http://genert.org)and licensed for use under the MIT License (MIT).

Please see [MIT License](LICENSE) for more information.
