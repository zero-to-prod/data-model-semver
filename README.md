# Zerotoprod\DataModelSemver

![](./logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/data-model-semver)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-semver/test.yml?label=tests)](https://github.com/zero-to-prod/data-model-semver/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/data-model-semver?color=blue)](https://packagist.org/packages/zero-to-prod/data-model-semver/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/data-model-semver.svg?color=purple)](https://packagist.org/packages/zero-to-prod/data-model-semver/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/data-model-semver?color=f28d1a)](https://packagist.org/packages/zero-to-prod/data-model-semver)
[![License](https://img.shields.io/packagist/l/zero-to-prod/data-model-semver?color=pink)](https://github.com/zero-to-prod/data-model-semver/blob/main/LICENSE.md)

A `DataModel` representing the components of a SemVer string.

## Installation

Install the package via Composer:

```bash
composer require zero-to-prod/data-model-semver
```

## Usage

Pass a [SemVer](https://semver.org/) string to the `from()` method.

```php
$Semver = \Zerotoprod\DataModelSemver\Semver::from('1.2.3-prerelease+meta');

echo $Semver->major; // 1
echo $Semver->minor; // 2
echo $Semver->patch; // 3
echo $Semver->prerelease; // prerelease
echo $Semver->buildmetadata; //meta
```

### Helper Methods
```php
Semver::from('1.2.3-prerelease+meta')->toArray();
Semver::from('1.2.3-prerelease+meta')->toJson();
```