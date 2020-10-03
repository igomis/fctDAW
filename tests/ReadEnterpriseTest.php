<?php

include_once '../config/testDatabase.php';
include_once '../objects/Enterprise.php';

use PHPUnit\Framework\TestCase;

class ReadEnterpriseTest extends TestCase
{
    const CIF = '12345678A';
    const ADRESS = 'Societat Unio Musical';
    const NAME = "CIPFP BATOI";
    const EMAIL = "intranet@cipfpbatoi.es";
    const LOCATION = 'ALCOI';
    const NEWCIF = "23456789Z";
    const SEARCH = "Unio";


    public function testReadReturnTrue()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();
        $db->exec('TRUNCATE TABLE enterprises');


        // pass connection to objects
        $enterprise = new Enterprise($db);
        $enterprise->cif = self::CIF;
        $enterprise->adress = self::ADRESS;
        $enterprise->name = self::NAME;
        $enterprise->email = self::EMAIL;
        $enterprise->location = self::LOCATION;
        $this->assertSame($enterprise->create($db), true);
        $enterprise->cif = self::CIF;
        $this->assertSame($enterprise->readOne(), true);
    }

    public function testReadReturnFalse()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();

        // pass connection to objects
        $enterprise = new Enterprise($db);
        $enterprise->cif = self::NEWCIF;
        $this->assertSame($enterprise->readOne(), false);
    }

    public function testSearchByContext()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();

        // pass connection to objects
        $enterprise = new Enterprise($db);
        $this->assertSame(count($enterprise->search(self::SEARCH,0,10)),1);
    }


}
