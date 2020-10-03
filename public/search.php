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

// get search term
$search_term=isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "Estas cercant per  \"{$search_term}\"";
include_once "../layouts/layout_header.php";

// query products
$allEnterprises = $enterprise->search($search_term, $from_record_num, $records_per_page);

// specify the page where paging is used
$page_url="search.php?s={$search_term}&";

// count total rows - used for pagination
$total_rows = count($allEnterprises);

// read_template.php controls how the product list will be rendered
include_once "../layouts/layout_read.php";

// layout_footer.php holds our javascript and closing html tags
include_once "../layouts/layout_footer.php";
