<?php

$sort_array = $_COOKIE[sort_array];

require_once 'salesRecordDTO.php';
$recorddto = new recordDTO(null,null,null,null,null,null,null);
$recorddto->make_csv($sort_array);


echo "<a href="csv_files\file.csv" download>Download csv file here</a>;



?>