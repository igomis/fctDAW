<?php
// include database and object files
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../objects/Enterprise.php';

// get database connection

$database = new Database();
$db = $database->getConnection();
$enterprise = new Enterprise($db);

// set page headers
$page_title = "Modificar Empresa";
include_once "../layouts/layout_header.php";
if($_POST){


    // set product property values
    $enterprise->cif = $_POST['cif'];
    $enterprise->name = $_POST['name'];
    $enterprise->activity = $_POST['activity'];
    $enterprise->adress = $_POST['adress'];
    $enterprise->location = $_POST['location'];
    $enterprise->email = $_POST['email'];
    $enterprise->phone = $_POST['phone'];
    $enterprise->contact = $_POST['contact'];
    $enterprise->places = $_POST['places'];
    $enterprise->comments = $_POST['comments'];


    // create the product
    if($enterprise->update()){
        echo "<div class='alert alert-success'>L'Empresa ha estat modificada.</div>";
    }

    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>No he pogut modificar l'empresa.</div>";
    }
}
else   {
    // set ID property of product to be edited
    $enterprise->cif = $_GET['cif']??die('ERROR: no hi ha cap empresa amb eixe CIF.');

    // read the details of product to be edited
    $enterprise->readOne();
}
?>
<!-- contents will be here -->
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="cif">CIF</label>
            <input type='text' name='cif' value='<?= $enterprise->cif ?>' class='form-control' id="cif" />
        </div>
        <div class="form-group col-md-4">
            <label for="name">Nom</label>
            <input type='text' name='name' value='<?= $enterprise->name ?>' class='form-control' id="name" />
        </div>
        <div class="form-group col-md-6">
            <label for="activity">Activitat</label>
            <input type='text' name='activity' value='<?= $enterprise->activity ?>' class='form-control' id="activity" />
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="adress">Adreça</label>
            <input type='text' name='adress' value='<?= $enterprise->adress ?>' class='form-control' id="adress" />
        </div>
        <div class="form-group col-md-4">
            <label for="location">Localitat</label>
            <input type='text' name='location' value='<?= $enterprise->location ?>' class='form-control' id="location" />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="contact">Persona de contacte</label>
            <input type='text' name='contact' value='<?= $enterprise->contact ?>' class='form-control' id="contact" />
        </div>
        <div class="form-group col-md-3">
            <label for="email">Email</label>
            <input type='email' name='email' value='<?= $enterprise->email ?>' class='form-control' id="email" />
        </div>
        <div class="form-group col-md-2">
            <label for="phone">Telèfon</label>
            <input type='tel' name='phone' value='<?= $enterprise->phone ?>' class='form-control' id="phone" />
        </div>
        <div class="form-group col-md-2">
            <label for="places">Nombre de places</label>
            <input type='number' name='places' value='<?= $enterprise->places ?>' class='form-control' id="places" />
        </div>
    </div>

    <div class="form-group">
        <label for="comments">Comentaris</label>
        <textarea name='comments' class='form-control' id="coments" ><?= $enterprise->comments ?>'</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Modificar</button>
</form>

<div class='right-button-margin'>
    <a href='index.php' class='btn btn-outline-primary float-right'>Vore Empreses</a>
</div>
<?php
// footer
include_once "../layouts/layout_footer.php";
?>
