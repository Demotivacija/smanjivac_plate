<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\KasnjenjeNaDejli;
use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use PHPUnit\Framework\TestCase;

class KasnjenjeNaDejliTest extends TestCase
{
    public function testGetters(): void
    {
        $kasnjenje = new KasnjenjeNaDejli();

        $this->assertEquals('Zašnjenje na daily standup', $kasnjenje->getRazlog());
        $this->assertEquals(0.3, $kasnjenje->getSmanjenjePlate());
        $this->assertInstanceOf(Razlog::class, $kasnjenje);
    }
}
