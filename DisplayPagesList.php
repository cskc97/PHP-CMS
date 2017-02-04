<?php

require_once("DatabaseClass.php");


$hyperlink = "localhost/PHP-CMS/DisplayPage.php?id=";

$subID = $_GET["subID"];

$database = new DatabaseConnection();

$assocArray = $database->Get_All_Pages();

$numElements = count($assocArray);






for($counter = 0;$counter<$numElements;$counter++)
{

?>

<li> 

<a href= <?php echo $hyperlink.$assocArray[$counter][TABLE_PAGES_ID]; ?>>


<?php echo $assocArray[$counter][TABLE_PAGES_MENUNAME] ?>
</a>

 </li>
<br>


<?php 

}




 ?>