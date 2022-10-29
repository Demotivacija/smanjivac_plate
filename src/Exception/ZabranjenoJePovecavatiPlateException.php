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

class ZabranjenoJePovecavatiPlateException extends \RuntimeException
{
    private const PORUKE = [
        'Ne može to tako gazda, zaposleni se ne smeju navikavati na povišice',
        'Šta će im više para, ionako ne bi znali šta sa tim da rade'
    ];

    public static function throwZabranjenoJePovecavatiPlateException()
    {
        $message = self::PORUKE[array_rand(self::PORUKE)];

        throw new self($message);
    }
}