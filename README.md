BBCode
================

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
