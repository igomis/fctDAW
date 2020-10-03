<?php

include_once '../config/testDatabase.php';
include_once '../objects/Enterprise.php';

use PHPUnit\Framework\TestCase;

class DeleteEnterpriseTest extends TestCase
{
    const CIF = '12345678A';
    const ADRESS = 'Societat Unio Musical';
    const NAME = "CIPFP BATOI";
    const EMAIL = "intranet@cipfpbatoi.es";
    const LOCATION = 'ALCOI';


    public function testDeleteReturnTrue()
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
        $this->assertSame($enterprise->delete(), true);
        $enterprise->cif = self::CIF;
        $this->assertSame($enterprise->readOne(), false);

    }

}

