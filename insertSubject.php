<?php
/**
 * Created by PhpStorm.
 * User: santh
 * Date: 2/11/2017
 * Time: 5:14 PM
 */
require_once("DatabaseClass.php");

if(isset($_POST["submit"]))
{

    $menuName = $_POST["menuname"];
    $positionVal = $_POST["positionval"];
    $visibleVal = $_POST["visibleval"];


    $db = new DatabaseConnection();
    $db->Create_Subject($menuName,$positionVal,$visibleVal);
    echo "Form Submitted";
    header("Location: DisplaySubjects.php");


}
else
{
    echo "Error in submitting form";
}





?>

<form action="insertSubject.php" method="post">


    Menu Name:    <input type="text" name="menuname" value=""/><br>
    Position:     <input type="number" name="positionval"  value=""/><br>
    Visible:      <input type="number" name="visibleval" value=""/><br>

    <input type="submit" name="submit" value="Submit"/>





</form>
