[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/drupol/phpspec-requires)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/drupol/phpspec-requires)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/drupol/phpspec-requires)
 [![Build Status](https://img.shields.io/travis/drupol/phpspec-requires/master.svg?style=flat-square)](https://travis-ci.org/drupol/phpspec-requires)
 [![Build Status](https://img.shields.io/appveyor/ci/drupol/phpspec-requires.svg?style=flat-square)](https://ci.appveyor.com/project/drupol/phpspec-requires)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/phpspec-requires/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phpspec-requires/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/phpspec-requires/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phpspec-requires/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/phpspec-requires/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/drupol/phpspec-requires)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
# PHPSpec requires extension

A [PHPSpec](http://www.phpspec.net) extension that allows you to use the
annotation `@requires`.

## Installation

```yaml
composer require drupol/phpspec-requires --dev
```

## Usage

Enable extension in `phpspec.yml` (or `phpspec.yml.dist`) file:

```yaml
extensions:
  drupol\PhpspecRequires\PhpspecRequires: ~
```

Then, you can use the annotation `@requires` in the documentation block of your spec methods.

```php
/**
 * @requires OS Windows
 */
public function it_will_be_tested_on_windows_operating_system_only() {
  // test code here
}

/**
 * @requires OSFAMILY bsd
 */
public function it_will_be_tested_on_bsd_operating_system_family() {
  // test code here
}

/**
 * @requires function customFunction
 */
public function it_will_be_tested_only_if_the_function_is_found() {
  // test code here
}

/**
 * @requires extension mysqli
 */
public function it_will_be_tested_only_if_extension_is_found() {
  // test code here
}

/**
 * @requires PHP 7.3
 */
public function it_will_be_tested_only_if_php_version_is_equal_or_greater() {
  // test code here
}

```

# Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
