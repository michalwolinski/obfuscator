<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator\Strategy;

class AesObfuscation implements ObfuscationStrategy
{
    public function obfuscate(string $data, string $key): string
    {
        return openssl_encrypt($data, 'aes-256-cbc', $key, 0, substr($key, 0, 16));
    }

    public function deobfuscate(string $data, string $key): string|false
    {
        return openssl_decrypt($data, 'aes-256-cbc', $key, 0, substr($key, 0, 16));
    }
}
