[![Latest Stable Version](https://img.shields.io/packagist/v/friends-of-phpspec/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/friends-of-phpspec/phpspec-requires)
 [![GitHub stars](https://img.shields.io/github/stars/friends-of-phpspec/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/friends-of-phpspec/phpspec-requires)
 [![Total Downloads](https://img.shields.io/packagist/dt/friends-of-phpspec/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/friends-of-phpspec/phpspec-requires)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/friends-of-phpspec/phpspec-requires/Continuous%20Integration?style=flat-square)](https://github.com/friends-of-phpspec/phpspec-requires/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/friends-of-phpspec/phpspec-requires/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/friends-of-phpspec/phpspec-requires/?branch=master)
 [![License](https://img.shields.io/packagist/l/friends-of-phpspec/phpspec-requires.svg?style=flat-square)](https://packagist.org/packages/friends-of-phpspec/phpspec-requires)
 
# PHPSpec requires extension

A [PHPSpec](http://www.phpspec.net) extension that allows you to use the
annotation `@requires`.

## Installation

```shell script
composer require friends-of-phpspec/phpspec-requires --dev
```

## Usage

Enable extension in `phpspec.yml` (or `phpspec.yml.dist`) file:

```yaml
extensions:
  FriendsOfPhpspec\PhpspecRequires\PhpspecRequires: ~
```

Then, you can use the annotation `@requires` in the documentation block of your
spec methods.

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

# Todo

* Tests

## Contributing

See the file [CONTRIBUTING.md](.github/CONTRIBUTING.md) but feel free to
contribute to this library by sending Github pull requests.
