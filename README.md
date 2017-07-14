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

## Usage
The `genert/bbcode` library comes with functionality to convert BBCode to HTML or vice versa.

### `convertFromHtml(string $text)`
Converts BBCode to HTML and returns output as string.

Example:
```php
use Genert\BBCode\BBCode;

$bbCode = new BBCode();

// Output: '<strong>Hello word!</strong>'
$bbCode->convertFromHtml('[b]Hello word![/b]');
```

### `convertToHtml(string $text, [$caseSensitive])`
Converts HTML to BBCode and returns output as string.

Example:
```php
use Genert\BBCode\BBCode;

$bbCode = new BBCode();

// Output: '[b]Hello word![/b]'
$bbCode->convertToHtml('<strong>Hello word!</strong>');
```

This function also supports case sensitive BBCode parsing by optional parameter.

To enable this, simply pass `BBCode::CASE_SENSITIVE` as second argument:
```php
// Output: '<strong><i><u>Ran<strong>d</strong>om text</u></i></strong>'
$bbCode->convertToHtml('[B][I][U]Ran[b]d[/b]om text[/u][/I][/b]', BBCode::CASE_SENSITIVE);
```

### `stripBBCodeTags(string $text)`
Strips BBCode tags from text and returns output as string.

Example:
```php
use Genert\BBCode\BBCode;

$bbCode = new BBCode();

// Output: 'Hello word!'
$bbCode->stripBBCodeTags('[b]Hello word![/b]');
```

### `only(array list or ...args)`
Sets parser to only convert set BBCode tags.

Example:
```php
use Genert\BBCode\BBCode;

$bbCode = new BBCode();

// Output: '<strong>Bold</strong> [i]italic[/i]'
$bbCode->only('bold')->convertToHtml('[b]Bold[/b] [i]italic[/i]');

// Or as array
$bbCode->only(['bold'])->convertToHtml('[b]Bold[/b] [i]italic[/i]');
```

### `except(array list or ...args)`
Sets parser to only convert all BBCode tags except listed.

Example:
```php
use Genert\BBCode\BBCode;

$bbCode = new BBCode();

// Output: '[b]Bold[/b] <i>italic</i>'
$bbCode->except('bold')->convertToHtml('[b]Bold[/b] [i]italic[/i]');

// Or as array
$bbCode->except(['bold'])->convertToHtml('[b]Bold[/b] [i]italic[/i]');
```

## Laravel installation

Once BBCode is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `\Genert\BBCode\BBCodeServiceProvider::class,`

You can register facades in the `aliases` key of your `config/app.php` file if you like.

* `'BBCode' => \Genert\BBCode\Facades\BBCode::class,`

With registered facade, you can use library's functionality as following:
```php
// Output: '<strong>Laravel wins</strong>'
echo BBCode::convertToHtml('[b]Laravel wins[/b]);


// Output: '[b]Do Symphony or not[/b]'
echo BBCode::convertFromHtml('<strong>Do Symphony or not</strong>');

// Output: '<strong>What does<strong> [i]fox say[/i]'
echo BBCode::only('bold')->convertToHtml('[b]What does[/b] [i]fox say[/i]');
```

## Testing
To run tests, simply run following command in terminal:
```bash
composer test
```

## Contributions & Issues
Contributions are welcome. Please clearly explain the purpose of the PR and follow the current style.

Issues can be resolved quickest if they are descriptive and include both a reduced test case and a set of steps to reproduce.

## Licence
The `genert/bbcode` library is copyright © [Genert Org](http://genert.org)and licensed for use under the MIT License (MIT).

Please see [MIT License](LICENSE) for more information.
