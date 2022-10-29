<?php
/**
 * +++++++++++++++++++++++ D E M O T I V A C I J A® +++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++ SOFTWARES INC. GMBH. DOO. ++++++++++++++++++++++++++++++++++++
 *
 * ====================================================================================
 * =                                                                                  =
 * =  Open sors, može da se kontributuje al ako gazda Goran potvrdi                   =
 * =  Nemate nikakva prava, mi imamo sva prava                                        =
 * =  Aj uzdravlje 🍻🍻                                                                =
 * =                                                                                  =
 * ====================================================================================
 */
namespace Demotivacija\SmanjivacPlate\Razlozi;

class RazloziCollection implements \IteratorAggregate
{
    private $razlozi = [];

    public function getIterator() : RazloziIterator
    {
        return new RazloziIterator($this);
    }

    public function dajRazlog($position): ?Razlog
    {
        if (isset($this->razlozi[$position])) {
            return $this->razlozi[$position];
        }

        return null;
    }

    public function count() : int
    {
        return count($this->razlozi);
    }

    public function dodajRazlog(Razlog $razlog)
    {
        $this->razlozi[] = $razlog;
    }

    public function dajNasumicnirazlog(): Razlog
    {
        return $this->razlozi[array_rand($this->razlozi)];
    }
}