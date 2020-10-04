<?php
// include database and object files
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../objects/Enterprise.php';
include_once '../config/core.php';


// get database connection

$database = new Database();
$db = $database->getConnection();
$enterprise = new Enterprise($db);

// retrieve records here
$allEnterprises = $enterprise->readAll($from_record_num, $records_per_page);
$total_rows = $enterprise->countAll();

// set page headers
$page_title = "Índex Empreses";


include_once "../layouts/layout_header.php";

// read_template.php controls how the product list will be rendered
include_once "../layouts/layout_read.php";

// layout_footer.php holds our javascript and closing html tags
include_once "../layouts/layout_footer.php";


include_once "../layouts/layout_footer.php";
?>

