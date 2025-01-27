<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator;

use MichalWolinski\Obfuscator\Strategy\ObfuscationStrategy;

class Obfuscator
{
    private ObfuscationStrategy $strategy;

    public function __construct(ObfuscationStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function obfuscate(string $input, string $key): string
    {
        return $this->strategy->obfuscate($input, $key);
    }

    public function deobfuscate(string $input, string $key): string|false
    {
        return $this->strategy->deobfuscate($input, $key);
    }
}