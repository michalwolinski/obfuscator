<?php

declare(strict_types=1);

namespace MichalWolinski\Obfuscator\Tests\Unit;

use MichalWolinski\Obfuscator\Obfuscator;
use MichalWolinski\Obfuscator\Factory\ObfuscationStrategyFactory;
use MichalWolinski\Obfuscator\ObfuscationType;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ObfuscatorTest extends TestCase
{
    private ObfuscationStrategyFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new ObfuscationStrategyFactory();
        $this->key = 'some-secret-key';
    }

    #[Test]
    public function itObfuscatesToBase64(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::BASE64);
        $obfuscator = new Obfuscator($strategy);

        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $this->assertNotEquals($input, $obfuscated);
    }

    #[Test]
    public function itDeobfuscatesFromBase64(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::BASE64);
        $obfuscator = new Obfuscator($strategy);
        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $deobfuscated = $obfuscator->deobfuscate($obfuscated, $this->key);

        $this->assertEquals($input, $deobfuscated);
    }

    #[Test]
    public function itObfuscatesToAes(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::AES);
        $obfuscator = new Obfuscator($strategy);

        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $this->assertNotEquals($input, $obfuscated);
    }

    #[Test]
    public function itDeobfuscatesFromAes(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::AES);
        $obfuscator = new Obfuscator($strategy);
        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $deobfuscated = $obfuscator->deobfuscate($obfuscated, $this->key);

        $this->assertEquals($input, $deobfuscated);
    }

    #[Test]
    public function itNotDeobfuscatesFromAesWhenKeyIsWrong(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::AES);
        $obfuscator = new Obfuscator($strategy);
        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $deobfuscated = $obfuscator->deobfuscate($obfuscated, 'other-key');

        $this->assertNotEquals($input, $deobfuscated);
        $this->assertFalse($deobfuscated);
    }

    #[Test]
    public function itNotDeobfuscatesFromBase64WhenKeyIsWrong(): void
    {
        $input = 'Hello, World!';
        $strategy = $this->factory->create(ObfuscationType::BASE64);
        $obfuscator = new Obfuscator($strategy);
        $obfuscated = $obfuscator->obfuscate($input, $this->key);

        $deobfuscated = $obfuscator->deobfuscate($obfuscated, 'other-key');

        $this->assertNotEquals($input, $deobfuscated);
        $this->assertFalse($deobfuscated);
    }
}