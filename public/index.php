<?php
// include database and object files
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../objects/Enterprise.php';

// get database connection

$database = new Database();
$db = $database->getConnection();
$enterprise = new Enterprise($db);

$page = $_GET['page']??1;

// nombre de registres per pàgina
$records_per_page = 10;

// càlcul per a la query del valor LIMIT
$from_record_num = $records_per_page * ($page-1);
// retrieve records here
$allEnterprises = $enterprise->readAll($from_record_num, $records_per_page);
$total_rows = count($allEnterprises);

// set page headers
$page_title = "Índex Empreses";
include_once "../layouts/layout_header.php";
// la pàgina és un paràmetres que rebem per URL

if($total_rows>0){
?>
<table class='table table-striped table-hover table-bordered' >
    <caption>Llistat d'empreses</caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Adreça</th>
        <th scope="col">Localitat</th>
        <th scope="col">Activitat</th>
        <th scope="col">Places</th>
        <th scope="col">Accions</th>
    </tr>
    </thead>
    <tbody>
    <?php   foreach($allEnterprises as $item) { ?>
        <tr>
            <td><?= $item->name ?></td>
            <td><?= $item->adress ?></td>
            <td><?= $item->location ?></td>
            <td><?= $item->activity ?></td>
            <td><?= $item->places ?></td>
            <td>
                <!-- read, edit and delete buttons -->
                <a href="read_one.php?cif=<?= $item->cif ?>" class='btn btn-primary left-margin'>
                    <span class='glyphicon glyphicon-list' aria-hidden="true"></span>Mostra
                </a>

                <a href="update_page.php?cif=<?= $item->cif ?>" class='btn btn-info left-margin'>
                    <span class='glyphicon glyphicon-edit'aria-hidden="true"></span> Edita
                </a>

                <a delete-id='<?= $item->cif ?>' class='btn btn-danger delete-object'>
                    <span class='glyphicon glyphicon-remove'aria-hidden="true"></span> Esborra
                </a>
            </td>
        </tr>
        <?php
    }
    }
    ?>
    </tbody>
</table>

<div class='right-button-margin'>
    <a href='create_page.php' class='btn btn-outline-primary float-right'>Crear Empresa</a>
</div>
<?php
// the page where this paging is used
$page_url = "index.php?";

// paging buttons here
include_once '../layouts/layout_paging.php';

include_once "../layouts/layout_footer.php";
?>

