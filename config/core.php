<?php

// la pàgina és un paràmetres que rebem per URL
$page = $_GET['page']??1;

// nombre de registres per pàgina
$records_per_page = 10;

// càlcul per a la query del valor LIMIT
$from_record_num = $records_per_page * ($page-1);

