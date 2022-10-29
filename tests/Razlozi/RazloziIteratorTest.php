<?php

namespace Tests\Demotivacija\SmanjivacPlate\Razlozi;

use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use Demotivacija\SmanjivacPlate\Razlozi\RazloziCollection;
use Demotivacija\SmanjivacPlate\Razlozi\RazloziIterator;
use PHPUnit\Framework\TestCase;

class RazloziIteratorTest extends TestCase
{
    public function testCurrent(): void
    {
        $iterator = $this->getIterator();
        $current = $iterator->current();

        $this->assertEquals($this->getRazlogMock(), $current);
    }


    public function testNext(): void
    {
        $iterator = $this->getIterator();
        $iterator->next();

        $this->assertEquals(1, $iterator->key());
    }


    public function testKey(): void
    {
        $iterator = $this->getIterator();

        $iterator->next();
        $iterator->next();

        $this->assertEquals(2, $iterator->key());
    }


    public function testValidIfItemInvalid(): void
    {
        $iterator = $this->getIterator();

        $iterator->next();
        $iterator->next();
        $iterator->next();

        $this->assertEquals(false, $iterator->valid());
    }


    public function testValidIfItemIsValid(): void
    {
        $iterator = $this->getIterator();

        $iterator->next();

        $this->assertEquals(true, $iterator->valid());
    }


    public function testRewind(): void
    {
        $iterator = $this->getIterator();

        $iterator->rewind();

        $this->assertEquals(0, $iterator->key());
    }

    private function getIterator() : RazloziIterator
    {
        return new RazloziIterator($this->getCollection());
    }

    private function getCollection() : RazloziCollection
    {
        $razlogItems[] = $this->getRazlogMock();
        $razlogItems[] = $this->getRazlogMock();

        $razloziCollection = new RazloziCollection();

        foreach ($razlogItems as $razlog) {
            $razloziCollection->dodajRazlog($razlog);
        }

        return $razloziCollection;
    }

    private function getRazlogMock(): Razlog
    {
        return $this->getMockBuilder(Razlog::class)->getMock();
    }
}
