# Obfuscator

A PHP package for obfuscating strings using different strategies.

## Features

- Simple integration for string obfuscation.
- Supports Base64 and AES obfuscation out of the box.
- Easily extendable with custom obfuscation strategies.

## Requirements

- PHP 8.4 or later

## Installation

```bash
composer require michalwolinski/obfuscator
```

## Usage

### Basic Example

```php
use MichalWolinski\Obfuscator\Obfuscator;
use MichalWolinski\Obfuscator\ObfuscationStrategyFactory;
use MichalWolinski\Obfuscator\ObfuscationKey;

$factory = new ObfuscationStrategyFactory();
$strategy = $factory->create(ObfuscationKey::BASE64);

$obfuscator = new Obfuscator($strategy);

$input = 'example';
$obfuscated = $obfuscator->obfuscate($input);
echo $obfuscated;

$deobfuscated = $obfuscator->deobfuscate($obfuscated);
echo $deobfuscated;
```

### Testing

Run the tests with PHPUnit:

```bash
vendor/bin/phpunit
```

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
