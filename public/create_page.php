<?php
// include database and object files
include_once dirname(__FILE__) .'/../config/config.php';
include_once dirname(__FILE__) .'/../config/database.php';
include_once dirname(__FILE__) .'/../objects/Enterprise.php';


// get database connection

$database = new Database();
$db = $database->getConnection();
$enterprise = new Enterprise($db);

$page_title = "Crear Empresa";
include_once "../layouts/layout_header.php";
?>
// contents will be here
<div class='right-button-margin'>
    <a href='index.php' class='btn btn-outline-primary float-right'>Vore Empreses</a>
</div>
<!-- PHP post code will be here -->
<?php

if($_POST){


    // set product property values
    $enterprise->cif = $_POST['cif'];
    $enterprise->name = $_POST['name'];
    $enterprise->activity = $_POST['activity'];
    $enterprise->adress = $_POST['adress'];
    $enterprise->location = $_POST['location'];
    $enterprise->email = $_POST['email'];
    $enterprise->phone = $_POST['phone'];
    $enterprise->places = $_POST['places'];
    $enterprise->comments = $_POST['comments'];


    // create the product
    if($enterprise->create()){
        echo "<div class='alert alert-success'>L'Empresa ha estat creada.</div>";
    }

    // if unable to create the product, tell the user
    else{

        echo "<div class='alert alert-danger'>No he pogut crear l'empresa.</div>";
    }
}
?>

<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="cif">CIF</label>
            <input type='text' name='cif' class='form-control' id="cif" />
        </div>
        <div class="form-group col-md-4">
            <label for="name">Nom</label>
            <input type='text' name='name' class='form-control' id="name" />
        </div>
        <div class="form-group col-md-6">
            <label for="activity">Activitat</label>
            <input type='text' name='activity' class='form-control' id="activity" />
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="adress">Adreça</label>
            <input type='text' name='adress' class='form-control' id="adress" />
        </div>
        <div class="form-group col-md-4">
            <label for="location">Localitat</label>
            <input type='text' name='location' class='form-control' id="location" />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="contact">Persona de contacte</label>
            <input type='text' name='contact' class='form-control' id="contact" />
        </div>
        <div class="form-group col-md-3">
            <label for="email">Email</label>
            <input type='email' name='email' class='form-control' id="email" />
        </div>
        <div class="form-group col-md-2">
            <label for="phone">Telèfon</label>
            <input type='tel' name='phone' class='form-control' id="phone" />
        </div>
        <div class="form-group col-md-2">
            <label for="places">Nombre de places</label>
            <input type='number' name='places' class='form-control' id="places" />
        </div>
    </div>

    <div class="form-group">
        <label for="comments">Comentaris</label>
        <textarea name='comments' class='form-control' id="coments" ></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

<?php
// footer
include_once "../layouts/layout_footer.php";
?>

