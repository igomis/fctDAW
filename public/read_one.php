<?php
// include database and object files
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../objects/Enterprise.php';

// get database connection

$database = new Database();
$db = $database->getConnection();
$enterprise = new Enterprise($db);


// set ID property of enterprise to be edited
$enterprise->cif = $_GET['cif']??die('ERROR: no hi ha cap empresa amb eixe CIF.');
// read the details of enterprise to be edited
$enterprise->readOne();

// set page headers
$page_title = "Vore dades empresa";
include_once "../layouts/layout_header.php";



?>
    <!-- HTML table for displaying an enterprise  details -->
    <table class='table table-hover table-responsive table-bordered'>
        <caption>Dades empresa</caption>
        <tr>
            <th scope="row">CIF</th>
            <td><?= $enterprise->cif ?></td>
            <th scope="row">Nom</th>
            <td><?= $enterprise->name ?></td>
            <th scope="row">Activitat</th>
            <td colspan="3"><?= $enterprise->activity ?></td>
        </tr>
        <tr>
            <th scope="row">Adreça</th>
            <td colspan="3"><?= $enterprise->adress ?></td>
            <th scope="row">Localitat</th>
            <td colspan="3"><?= $enterprise->location ?></td>
        </tr>
        <tr>
            <th scope="row">Persona de contacte</th>
            <td><?= $enterprise->contact ?></td>
            <th scope="row">Email</th>
            <td><?= $enterprise->email ?></td>
            <th scope="row">Telèfon</th>
            <td><?= $enterprise->phone ?></td>
            <th scope="row">Nombre de places</th>
            <td><?= $enterprise->places ?></td>
        </tr>
        <tr>
            <th scope="row">Comentaris</th>
            <td colspan="7"><?= $enterprise->comments ?></td>
        </tr>
    </table>

    <div class='right-button-margin'>
        <a href='index.php' class='btn btn-outline-primary float-right'>Vore Empreses</a>
    </div>
<?php
// footer
include_once "../layouts/layout_footer.php";
?>