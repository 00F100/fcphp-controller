# FcPhp Controller

Abstract class to Controller FcPhp

[![Build Status](https://travis-ci.org/00F100/fcphp-controller.svg?branch=master)](https://travis-ci.org/00F100/fcphp-controller) [![codecov](https://codecov.io/gh/00F100/fcphp-controller/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-controller)

[![PHP Version](https://img.shields.io/packagist/php-v/00f100/fcphp-controller.svg)](https://packagist.org/packages/00F100/fcphp-controller) [![Packagist Version](https://img.shields.io/packagist/v/00f100/fcphp-controller.svg)](https://packagist.org/packages/00F100/fcphp-controller) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-controller/downloads)](https://packagist.org/packages/00F100/fcphp-controller)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-controller
```

or add in composer.json
```json
{
    "require": {
        "00f100/fcphp-controller": "*"
    }
}
```

## How to use

Extends your controller from [FcPhp Controller](https://github.com/00F100/fcphp-controller) and add your services into Controller using contruct method. After call to service using "getService()" method.

```php

namespace Example
{
    use FcPhp\Controller\Controller;

    class ExampleController extends Controller
    {
        public function __construct($userService, $profileService, $addressService)
        {
            $this->setService('user', $userService);
            $this->setService('profile', $profileService);
            $this->setService('address', $addressService);
        }

        public function findUsers()
        {
            return $this->getService('user')->findAll();
        }

        public function findProfiles()
        {
            return $this->getService('profile')->findAll();
        }

        public function findAddresses()
        {
            return $this->getService('address')->findAll();
        }
    }
}

```