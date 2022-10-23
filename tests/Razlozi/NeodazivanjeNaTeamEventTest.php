<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\NeodazivanjeNaTeamEvent;
use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use PHPUnit\Framework\TestCase;

class NeodazivanjeNaTeamEventTest extends TestCase
{
    public function testGetters(): void
    {
        $neodazivanje = new NeodazivanjeNaTeamEvent();

        $this->assertEquals('Neodazivanje na team evente', $neodazivanje->getRazlog());
        $this->assertEquals(0.45, $neodazivanje->getSmanjenjePlate());
        $this->assertInstanceOf(Razlog::class, $neodazivanje);
    }
}
