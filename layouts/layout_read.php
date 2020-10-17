<!-- contents will be here -->
<!-- search form -->
<form role='search' action='search.php'>
    <div class='input-group col-md-3 margin-right-1em'>
        <?php $search_value=isset($search_term) ? "value='{$search_term}'" :"" ?>
        <input type='text' class='form-control' placeholder='Que vols cercar?' name='s' id='srch-term' required <?= $search_value ?> />
        <div class='input-group-btn'>
            <button class='btn btn-primary' type='submit'><span class='fas fa-search'></span></button>
        </div>
    </div>
</form>

<div class='right-button-margin'>
    <a href='create_page.php' class='btn btn-outline-primary float-right'><span class="fas fa-plus"></span> Crear Empresa</a>
</div>


<!-- display the products if there are any -->
<?php
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
                    <span class='fas fa-search' aria-hidden="true"></span>
                </a>

                <a href="update_page.php?cif=<?= $item->cif ?>" class='btn btn-info left-margin'>
                    <span class='fas fa-edit' aria-hidden="true"></span>
                </a>

                <a delete-id='<?= $item->cif ?>' class='btn btn-danger delete-object'>
                    <span class='fas fa-trash' aria-hidden="true"></span>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>

    <?php
    // the page where this paging is used
    $page_url = "index.php?";

    // paging buttons here
    include_once '../layouts/layout_paging.php';
} else {
    echo "<div class='alert alert-info'>No hi ha empreses que mostrar.</div>";
}
?>

