# State Dropdown Field
[![Build Status](https://travis-ci.org/dynamic/state-dropdown-field.svg?branch=master)](https://travis-ci.org/dynamic/state-dropdown-field) [![Latest Stable Version](https://poser.pugx.org/dynamic/state-dropdown-field/v/stable)](https://packagist.org/packages/dynamic/state-dropdown-field) [![Total Downloads](https://poser.pugx.org/dynamic/state-dropdown-field/downloads)](https://packagist.org/packages/dynamic/state-dropdown-field) [![Latest Unstable Version](https://poser.pugx.org/dynamic/state-dropdown-field/v/unstable)](https://packagist.org/packages/dynamic/state-dropdown-field) [![License](https://poser.pugx.org/dynamic/state-dropdown-field/license)](https://packagist.org/packages/dynamic/state-dropdown-field) [![Monthly Downloads](https://poser.pugx.org/dynamic/state-dropdown-field/d/monthly)](https://packagist.org/packages/dynamic/state-dropdown-field) [![Daily Downloads](https://poser.pugx.org/dynamic/state-dropdown-field/d/daily)](https://packagist.org/packages/dynamic/state-dropdown-field) [![composer.lock](https://poser.pugx.org/dynamic/state-dropdown-field/composerlock)](https://packagist.org/packages/dynamic/state-dropdown-field) [![codecov](https://codecov.io/gh/dynamic/silverstripe-state-dropdown-field/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-state-dropdown-field) [![Dependency Status](https://www.versioneye.com/user/projects/5894e293f55eb2004f529984/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5894e293f55eb2004f529984)

A simple state dropdown field for SilverStripe forms. This dropdown defaults to US states and CA provinces but allows for the source to be overridden.

## Requirements

- `"silverstripe/framework": "^3.2"`

## Installation

`composer require dynamic/state-dropdown-field`

## Example usage

```php

public function getCMSFields(){
    $fields = parent::getCMSFields();
    
    $fields->addFieldToTab(
        'Root.MyTab',
        \Dynamic\StateDropdownField\Fields\StateDropdownField::create('States', 'States')
    );
    
    return $fields;
}

```

## Documentation

See the [docs/en](docs/en/index.md) folder.
