<?php

//For processing GET requests and displaying contents of one particular page.

require_once('DatabaseClass.php');

$data = new DatabaseConnection();

$displaypage_id = $_GET[PAGE_ID];


$assocArray = $data->getPage($displaypage_id);

echo $assocArray["menu_name"];

echo"<br><br>";

echo $assocArray["content"];




?>

