<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CalcTest extends TestCase
{
    public function testCanBeUsed(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}