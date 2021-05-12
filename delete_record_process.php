<?php


$Record_ID = $_GET['Record_ID'];

require_once 'salesRecordDTO.php';
$recorddto = new recordDTO(null,null,null,null,null,null);
$bool = $recorddto->deleterecord($Record_ID);

if(!$bool)
{
    echo ("Record could not be deleted");
}
else
{
    header("Location: recordspage.php", TRUE, 301);
    exit();
}


?>