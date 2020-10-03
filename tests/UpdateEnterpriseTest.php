<?php
include_once dirname(__FILE__) .'/../config/testDatabase.php';
include_once dirname(__FILE__) .'/../objects/enterprise.php';
use PHPUnit\Framework\TestCase;

class UpdateEnterpriseTest extends TestCase
{
    const CIF = '12345678A';
    const ADRESS = 'Societat Unio Musical';
    const NAME = "CIPFP BATOI";
    const EMAIL = "intranet@cipfpbatoi.es";
    const LOCATION  = 'ALCOI';
    const NEWADRESS = "Societat Unio Musical 4";


    public function testUpdateReturnTrue()
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
        $this->assertSame($enterprise->create($db),true);
        $enterprise->adress = self::NEWADRESS;
        $this->assertSame($enterprise->update(),true);
    }

    public function testUpdateWorksProperly()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();
        $enterprise = new Enterprise($db);
        $enterprise->cif = self::CIF;
        $enterprise->readOne();
        $this->assertSame($enterprise->adress,self::NEWADRESS);

    }
}
