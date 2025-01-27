<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator;

enum ObfuscationType: string
{
    case AES = 'aes';
    case BASE64 = 'base64';
}
