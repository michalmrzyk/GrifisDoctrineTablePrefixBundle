README
======

This simple bundle add prefix to your table name. Use it for new symfony2 application.

## Installation

### Step 1: Download GrifisDoctrineTablePrefixBundle using composer

Add GrifisDoctrineTablePrefixBundle in your composer.json:

```js
{
    "require": {
        "grifis/doctrine-table-prefix-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update grifis/doctrine-table-prefix-bundle
```
Composer will install the bundle to your project's `vendor/grifis` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Grifis\DoctrineTablePrefixBundle\GrifisDoctrineTablePrefixBundle(),
    );
}
```

Default prefix is "sf_".

You can change the prefix in your configuration:

``` yaml
# app/config/parameters.yml
parameters:
    doctrine.db.prefix_table: sf_
```