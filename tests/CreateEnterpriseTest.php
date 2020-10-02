<?php
include_once dirname(__FILE__) .'/../config/testDatabase.php';
include_once dirname(__FILE__) .'/../objects/Enterprise.php';
use PHPUnit\Framework\TestCase;

class CreateEnterpriseTest extends TestCase
{
    public function testCreateNewReturnTrue()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();
        $database->truncate('enterprises');


        // pass connection to objects
        $enterprise = new Enterprise($db);
        $enterprise->cif ='12345678A';
        $enterprise->adress = 'Societat Unio Musical';
        $enterprise->name = 'CIPFP Batoi';
        $enterprise->email = 'intranet@cipfpbatoi.es';
        $enterprise->location = 'Alcoi';
        $this->assertSame($enterprise->create(),true);

    }

    public function testCreateDuplicateReturnFalse()
    {
        // get database connection
        $database = new testDatabase();
        $db = $database->getConnection();



        // pass connection to objects
        $enterprise = new Enterprise($db);
        $enterprise->cif ='12345678A';
        $enterprise->adress = 'Societat Unio Musical';
        $enterprise->name = 'CIPFP Batoi';
        $enterprise->email = 'intranet@cipfpbatoi.es';
        $enterprise->location = 'Alcoi';
        $this->assertSame($enterprise->create(),false);

    }
}

