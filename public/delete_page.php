<?php

// include database and object files
include_once '../config/config.php';

if ($_POST) {
    include_once '../config/database.php';
    include_once '../objects/Enterprise.php';

    // get database connection

    $database = new Database();
    $db = $database->getConnection();
    $enterprise = new Enterprise($db);
    $enterprise->cif = $_POST['cif'];


    // delete the product
    if ($enterprise->delete()) {
        echo "Empresa esborrada.";
    } // if unable to delete the product
    else {
        echo "No puc esborrar empresa.";
    }
}
