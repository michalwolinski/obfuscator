<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator\Factory;

use MichalWolinski\Obfuscator\ObfuscationType;
use MichalWolinski\Obfuscator\Strategy\AesObfuscation;
use MichalWolinski\Obfuscator\Strategy\Base64Obfuscation;
use MichalWolinski\Obfuscator\Strategy\ObfuscationStrategy;

class ObfuscationStrategyFactory
{
    public static function create(ObfuscationType $type): ObfuscationStrategy
    {
        return match ($type) {
            ObfuscationType::AES => new AesObfuscation(),
            ObfuscationType::BASE64 => new Base64Obfuscation(),
        };
    }
}
