<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator\Strategy;

class Base64Obfuscation implements ObfuscationStrategy
{
    public function obfuscate(string $data, string $key): string
    {
        $dataWithKey = $data . $key;

        return base64_encode($dataWithKey);
    }

    public function deobfuscate(string $data, string $key): string|false
    {
        $decodedData = base64_decode($data);

        if (str_ends_with($decodedData, $key)) {
            return substr($decodedData, 0, -strlen($key));
        }

        return false;
    }
}
