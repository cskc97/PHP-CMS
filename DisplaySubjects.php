<?php

require_once('DatabaseClass.php');


$hyperlink = "localhost/PHP-CMS/DisplayPagesList.php?subID=";

$database = new DatabaseConnection();

$assocArray = $database->Get_All_Subjects();

$numElements = count($assocArray);

for($counter = 0;$counter<$numElements;$counter++)
{

?>

<li> 

<a href= <?php echo $hyperlink.$assocArray[$counter][TABLE_SUBJECTS_ID]; ?>>


<?php echo $assocArray[$counter][TABLE_SUBJECTS_MENUNAME] ?>
</a>

 </li>
<br>


<?php 

}




 ?>