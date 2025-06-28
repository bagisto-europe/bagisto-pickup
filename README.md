<p align="center">
    <img src="https://bagisto.com/wp-content/themes/bagisto/images/logo.png" />
    <h2 align="center">Bagisto Pickup</h2>
</p>

<p align="center">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/bagisto-eu/pickup"> <img alt="GitHub" src="https://img.shields.io/github/license/bagisto-europe/bagisto-pickup">
</p>

![pickup-checkout](docs/checkout.png)

## Features
- Allows customers to select a pickup location during checkout.
- Provides available pickup timeslots based on the selected date.
- Handles inventory source validation to ensure products are available at the selected pickup location.

## Installation
To install the package, you need to add it to your Bagisto project using Composer.

### Step 1: Install the Package
```bash
composer require bagisto-eu/pickup
```

### Step 2: Install the Package with Artisan Command

```bash
php artisan pickup:install
```

This command will handle publishing views and translation files, and any necessary assets.

## Timeslots configuration
To manage the timeslots go to the admin panel -> Settings -> Pickup Timeslots
