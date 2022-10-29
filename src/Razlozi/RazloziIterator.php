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

class RazloziIterator implements \Iterator
{

    private $position = 0;

    private $razloziCollection;

    public function __construct(RazloziCollection $razloziCollection)
    {
        $this->razloziCollection = $razloziCollection;
    }

    public function current() : Razlog
    {
        return $this->razloziCollection->dajRazlog($this->position);
    }

    public function next()
    {
        $this->position++;
    }

    public function key() : int
    {
        return $this->position;
    }

    public function valid() : bool
    {
        return !is_null($this->razloziCollection->dajRazlog($this->position));
    }

    public function rewind()
    {
        $this->position = 0;
    }
}