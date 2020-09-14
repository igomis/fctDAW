<?php

namespace Tests;
include_once dirname(__FILE__) . '/../helpers/myHelpers.php';
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private function horaPostaSol(){
        $mes = date('n');
        switch ($mes){
            case 1 : return "18:00";
            case 2 : return "19:00";
            case 3 : return "20:00";
            case 4 : return "20:00";
            case 5 : return "21:00";
            case 6 : return "22:00";
            case 7 : return "22:00";
            case 8 : return "21:00";
            case 9 : return "20:00";
            case 10 : return "20:00";
            case 11 : return "19:00";
            case 12 : return "18:00";
        }
    }

    public function testUcParagraph(){
        $paragraf = "hola amigos.como estan ustedes";
        $this->assertEquals('Hola amigos.Como estan ustedes',ucParagraph($paragraf));
    }
    public function testGreetings(){
        $nit = $this->horaPostaSol();
        for ($i = 18; $i<= 23; $i++){
            $hora = $i.":00";
            if ($hora < $nit) $this->assertEquals(greetins($hora),'Bon dia');
            else $this->assertEquals(greetins($hora),'Bona nit');
        }
        $this->assertEquals(greetins("06:00"),'Bona nit');
        $this->assertEquals(greetins("07:00"),'Bona dia');
        $this->assertEquals(greetins("12:00"),'Bon dia');
    }
    public function testValDate(){
        $this->assertEquals(valDate('2020/10/09'),"9 d'octubre de 2020");
        $this->assertEquals(valDate('2020/09/09'),"9 de setembre de 2020");
        $this->assertEquals(valDate('2020/13/01'),"Bad Format");
    }

    public function testPaintLine(){
        $this->assertEquals("<tr><td>Ignasi</td><td>Home</td><td>Valencià</td></tr>",paintLine(['Ignasi','Home','Valencià']));
    }
}
