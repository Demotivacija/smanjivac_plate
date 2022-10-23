<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\DoprinosZaCedjenu;
use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use PHPUnit\Framework\TestCase;

class DoprinosZaCedjenuTest extends TestCase
{
    public function testGetters(): void
    {
        $doprinos = new DoprinosZaCedjenu();

        $this->assertEquals('Doprinos za cedjenu u kancu', $doprinos->getRazlog());
        $this->assertEquals(0.1, $doprinos->getSmanjenjePlate());
        $this->assertInstanceOf(Razlog::class, $doprinos);
    }
}
