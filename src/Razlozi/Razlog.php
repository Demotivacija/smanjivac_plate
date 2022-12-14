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
 *
 * Ako hoćeš da kontributuješ, gledaj ovamo! Svi razlozi moraju implementirati ovaj interfejs
 * da bi bili u upotrebi u Smanjivaču plate.
 */
namespace Demotivacija\SmanjivacPlate\Razlozi;

interface Razlog
{
    public function getRazlog(): string;

    public function getSmanjenjePlate(): float;
}