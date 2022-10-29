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
namespace Demotivacija\SmanjivacPlate\Exception;

class IstaPlataException extends \RuntimeException
{
    private const PORUKA = 'Plata ne sme ostati ista, zaposleni se mogu navići na pare';

    public static function throwIstaPlataException()
    {
        throw new self(self::PORUKA);
    }
}