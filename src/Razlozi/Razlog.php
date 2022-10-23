<?php

namespace Demotivacija\SmanjivacPlate\Razlozi;

interface Razlog
{
    public function getRazlog(): string;

    public function getSmanjenjePlate(): float;
}