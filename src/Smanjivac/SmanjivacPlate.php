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
 * Smanji platu iznalazi razloge da zaposleni rime što manje para na račun
 * Metod smanjiPlatu vraća kolekciju razloga zbog kojih se zaposlenom smanjuje plata
 * do ili ispod zadate granice
 */
namespace Demotivacija\SmanjivacPlate\Smanjivac;

use Demotivacija\SmanjivacPlate\Exception\IstaPlataException;
use Demotivacija\SmanjivacPlate\Exception\ZabranjenoJePovecavatiPlateException;
use Demotivacija\SmanjivacPlate\Razlozi\Razlog;
use Demotivacija\SmanjivacPlate\Razlozi\RazloziCollection;

class SmanjivacPlate
{
    /** U početku svi po ugovoru primaju 100% plate */
    private const POCETNI_PROCENAT_PLATE = 100;

    /**
     * Do kog procenta želimo da zaposleni primaju platu
     * - Gazda Goran: 0%
     * - Zaposleni: 100%
     * Istina je negde izmedju
     */
    private const GORNA_GRANICA_PROCENTA_PLATE = 50;

    public function smanjiPlatu(
        int $pocetniProcenatPlate = self::POCETNI_PROCENAT_PLATE,
        int $gornjaGranicaProcentaPlate = self::GORNA_GRANICA_PROCENTA_PLATE
    ): RazloziCollection {
        $this->pogledajJelSveURedu($pocetniProcenatPlate, $gornjaGranicaProcentaPlate);

        $trenutniProcenatPlate = $pocetniProcenatPlate;

        $primenjeniRazlozi = $this->izvrtiRazloge($trenutniProcenatPlate, $gornjaGranicaProcentaPlate);

        return $primenjeniRazlozi;
    }

    private function izvrtiRazloge($trenutniProcenatPlate, $gornjaGranicaProcentaPlate): RazloziCollection
    {
        $primenjeniRazlozi = new RazloziCollection();
        $dostupniRazlozi = $this->dajSveRazloge();

        while ($trenutniProcenatPlate > $gornjaGranicaProcentaPlate) {
            $razlog = $dostupniRazlozi->dajNasumicnirazlog();
            $procenatDaSeSkine = $razlog->getSmanjenjePlate() * 100;

            $primenjeniRazlozi->dodajRazlog($razlog);

            $trenutniProcenatPlate = $trenutniProcenatPlate - $procenatDaSeSkine;
        }

        return $primenjeniRazlozi;
    }

    private function dajSveRazloge(): RazloziCollection
    {
        $razlozi = new RazloziCollection();

        $razloziNiz = $this->dajSveKlaseRazloga();

        foreach ($razloziNiz as $razlog) {
            $razlozi->dodajRazlog(new $razlog());
        }

        return $razlozi;
    }

    private function dajSveKlaseRazloga(): array
    {
        return array_filter(
            get_declared_classes(),
            function ($className) {
                return in_array(Razlog::class, class_implements($className));
            }
        );
    }

    private function pogledajJelSveURedu(int $pocetniProcenatPlate, int $gornjaGranicaProcentaPlate): void
    {
        if ($gornjaGranicaProcentaPlate > $pocetniProcenatPlate) {
            ZabranjenoJePovecavatiPlateException::throwZabranjenoJePovecavatiPlateException();
        }

        if ($pocetniProcenatPlate === $gornjaGranicaProcentaPlate) {
            IstaPlataException::throwIstaPlataException();
        }
    }
}