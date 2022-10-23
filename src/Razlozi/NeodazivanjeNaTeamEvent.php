<?php

declare(strict_types=1);

namespace Demotivacija\SmanjivacPlate\Razlozi;

class NeodazivanjeNaTeamEvent implements Razlog
{
    private const RAZLOG = 'Neodazivanje na team evente';

    private const SMANJENJE = 0.45;

    public function getRazlog(): string
    {
        return self::RAZLOG;
    }

    public function getSmanjenjePlate(): float
    {
        return self::SMANJENJE;
    }
}