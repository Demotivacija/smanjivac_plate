<?php

declare(strict_types=1);

namespace Demotivacija\SmanjivacPlate\Razlozi;

class KasnjenjeNaDejli implements Razlog
{
    private const RAZLOG = 'Zašnjenje na daily standup';

    private const SMANJENJE = 0.3;

    public function getRazlog(): string
    {
        return self::RAZLOG;
    }

    public function getSmanjenjePlate(): float
    {
        return self::SMANJENJE;
    }
}