<?php
// include database and object files
include_once dirname(__FILE__) .'/../config/config.php';
include_once dirname(__FILE__) .'/../config/database.php';
include_once dirname(__FILE__) .'/../objects/Enterprise.php';

$page_title = "Importar empreses";
include_once "../layouts/layout_header.php";
?>
<!-- PHP post code will be here -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $database = new Database();
    $db = $database->getConnection();

    $fp = fopen($_FILES['fichero']['tmp_name'], "r");

    while (!feof($fp)){
        $linea = fgets($fp);
        $enterprise = new Enterprise($db);
        list($buid,$enterprise->cif,$enterprise->name,$enterprise->email,$enterprise->adress,$enterprise->location,$enterprise->phone,
            $enterprise->contact,$enterprise->activity,$enterprise->comments,$enterprise->places) = explode('|',$linea);
        // create the product
        if($enterprise->create()){
            echo "<div class='alert alert-success'>L'Empresa $enterprise->name ha estat creada.</div>";
        }
        // if unable to create the product, tell the user
        else{
            echo "<div class='alert alert-danger'>No he pogut crear l'empresa $enterprise->name.</div>";
        }
    }
    fclose($fp);



}
?>

<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="input-group col-sm-6">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="fichero" id="customFile">
                <label class="custom-file-label " for="customFile">Fitxer d'empreses</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Importar</button>
</form>

<?php
// footer
include_once "../layouts/layout_footer.php";
?>

