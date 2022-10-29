<?php

namespace Tests\Demotivacija\SmanjivacPlate\Smanjivac;

use Demotivacija\SmanjivacPlate\Exception\IstaPlataException;
use Demotivacija\SmanjivacPlate\Exception\ZabranjenoJePovecavatiPlateException;
use Demotivacija\SmanjivacPlate\Smanjivac\SmanjivacPlate;
use PHPUnit\Framework\TestCase;

class SmanjivacPlateTest extends TestCase
{
    /**
     * @dataProvider procentiProvider
     */
    public function testSmanjiPlatu(int $pocetniProcenat, int $gornjaGranica)
    {
        $smanjivac = new SmanjivacPlate();
        $razlozi = $smanjivac->smanjiPlatu($pocetniProcenat,$gornjaGranica);

        $oduzetiProcenat = 0;
        foreach($razlozi as $razlog) {
            $oduzetiProcenat += $razlog->getSmanjenjePlate() * 100;
        }

        $this->assertLessThanOrEqual($gornjaGranica, $pocetniProcenat - $oduzetiProcenat);
    }

    public function testNeMozeVecaPlata(): void
    {
        $this->expectException(ZabranjenoJePovecavatiPlateException::class);

        $smanjivac = new SmanjivacPlate();

        $smanjivac->smanjiPlatu(50,60);
    }

    public function testPlataNeSmeOstatiIsta(): void
    {
        $this->expectException(IstaPlataException::class);

        $smanjivac = new SmanjivacPlate();

        $smanjivac->smanjiPlatu(98,98);
    }

    public function procentiProvider(): array
    {
        return [
            [
                'pocetniProcenat' => 100,
                'gornjaGranica' => 10
            ],
            [
                'pocetniProcenat' => 50,
                'gornjaGranica' => 0
            ],
            [
                'pocetniProcenat' => 100,
                'gornjaGranica' => -20
            ],
        ];
    }
}
