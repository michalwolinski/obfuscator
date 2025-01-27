<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator\Strategy;

interface ObfuscationStrategy
{
    public function obfuscate(string $data, string $key): string;
    public function deobfuscate(string $data, string $key): string|false;
}
