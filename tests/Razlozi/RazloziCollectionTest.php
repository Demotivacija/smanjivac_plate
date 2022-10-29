<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use Demotivacija\SmanjivacPlate\Razlozi\RazloziCollection;
use Demotivacija\SmanjivacPlate\Razlozi\RazloziIterator;
use PHPUnit\Framework\TestCase;

class RazloziCollectionTest extends TestCase
{
    public function testRazloziCollectionShouldReturnNullForNotExistingRazlozPosition(): void
    {
        $razloziCollection = new RazloziCollection();

        $this->assertEquals(null, $razloziCollection->dajRazlog(1));
    }


    public function testEmptyRazloziCollection(): void
    {
        $razloziCollection = new RazloziCollection();

        $this->assertEquals(new RazloziIterator($razloziCollection), $razloziCollection->getIterator());

        $this->assertEquals(0, $razloziCollection->count());
    }


    public function testRazloziCollectionWithRazlogElements(): void
    {
        $razloziCollection = new RazloziCollection();
        $razloziCollection->dodajRazlog($this->getRazloziMock());
        $razloziCollection->dodajRazlog($this->getRazloziMock());

        $this->assertEquals(new RazloziIterator($razloziCollection), $razloziCollection->getIterator());
        $this->assertEquals($this->getRazloziMock(), $razloziCollection->dajRazlog(1));
        $this->assertEquals(2, $razloziCollection->count());
    }

    public function testDajNasumicnirazlog(): void
    {
        $razloziCollection = new RazloziCollection();
        $razloziCollection->dodajRazlog($this->getRazloziMock());
        $razloziCollection->dodajRazlog($this->getRazloziMock());

        $this->assertInstanceOf(Razlog::class, $razloziCollection->dajNasumicnirazlog());
    }

    private function getRazloziMock(): Razlog
    {
        return $this->getMockBuilder(Razlog::class)->getMock();
    }
}
