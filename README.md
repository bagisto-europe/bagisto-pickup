<p align="center">
    <img src="https://bagisto.com/wp-content/themes/bagisto/images/logo.png" />
    <h2 align="center">Bagisto Pickup</h2>
</p>

![Packagist Downloads](https://img.shields.io/packagist/dt/digibytes/pickup) ![Packagist License](https://img.shields.io/packagist/l/digibytes/pickup)

This extension allows your customers to collect their orders from your physical store.

## Requirements
- [Bagisto](https://github.com/bagisto/bagisto)

## Installation

### Install with composer
1. Run the following commands
```php
composer require digibytes/pickup
```

```
php artisan optimize
```
2. Go to `https://<your-site>/admin/configuration/sales/carriers`.
3. Make sure that **Picking up at the store** is active and press save.

Your customers are now able to select the new shipping method.
