<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\RadisPhpU2022;
use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use PHPUnit\Framework\TestCase;

class RadisPhpU2022Test extends TestCase
{
    public function testGetters(): void
    {
        $kasnjenje = new RadisPhpU2022();

        $this->assertEquals('Radiš PHP u 2022. godini', $kasnjenje->getRazlog());
        $this->assertEquals(0.5, $kasnjenje->getSmanjenjePlate());
        $this->assertInstanceOf(Razlog::class, $kasnjenje);
    }
}
