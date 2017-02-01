<?php

require_once("Config.php");

class DatabaseConnection
{
private $mysqli;

public function __construct()
{

	$this->mysqli = new mysqli(DB_HOST,DB_USER, 
		DB_PASSWORD,DB_DATABASE);


}

public function __destruct()
{

	$this->mysqli->close();

	echo"<br><br>";
	echo "--------------------------";
	echo"<br>";

	echo "DESTRUCTOR CALLED";

}

public function getSubject($idVal)
{
	$query = "SELECT * FROM ".TABLE_SUBJECTS." WHERE ".
				TABLE_SUBJECTS_ID."=".$idVal;

	echo $query;

	$resultSet = $this->mysqli->query($query);
	$assocArray = $resultSet->fetch_assoc();

	$resultSet->free();
	return $assocArray;


}

public function getPage($idVal)
{
	$query = "SELECT * FROM ".TABLE_PAGES." WHERE ".
				TABLE_PAGES_ID."=".$idVal;

	echo $query;

	$resultSet = $this->mysqli->query($query);
	$assocArray = $resultSet->fetch_assoc();

	$resultSet->free();
	return $assocArray;


}

public function Get_All_Subjects()
{	
	/* GOOD PRACTICE:
	1) Perform database query
	2) Obtain result set and use it
	3) FREE the result set
	*/

	$query = "SELECT * FROM ".TABLE_SUBJECTS.";";
	$result = $this->mysqli->query($query);

	$assocArray = array();

	while($subject = $result->fetch_assoc())
	{	
		array_push($assocArray,$subject);
		echo $subject[TABLE_SUBJECTS_MENUNAME];
		echo "<br>";
	}



	$result->free();

	return $assocArray;





}



public function Get_All_Pages()
{
	$query = "SELECT * FROM ".TABLE_PAGES.";";
	$result = $this->mysqli->query($query);

	$assocArray = array();

	while($subject = $result->fetch_assoc())
	{	
		array_push($assocArray,$subject);
		echo $subject[TABLE_PAGES_MENUNAME];
		echo "<br>";
	}



	$result->free();

	return $assocArray;
}

public function Create_Subject($subjectName,$subjectPosition,$subjectVisibility)
{
	$query = "INSERT INTO ".TABLE_SUBJECTS."(".
				TABLE_SUBJECTS_MENUNAME.
				", ".TABLE_SUBJECTS_POSITION.", ".
				TABLE_SUBJECTS_VISIBLE.") VALUES ('$subjectName', $subjectPosition, $subjectVisibility)";
	echo $query;

	$this->mysqli->query($query);


}

public function Create_Page($subject_id,$menu_name,$position,
	$visible,$content)
{
	//TODO

	$query = "INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES (NULL, '$subject_id', '$menu_name', '$position', '$visible', '$content');";

	echo $query;
	$this->mysqli->query($query);
}




}

$val = new DatabaseConnection();
$val->Create_Subject("About Us","1","1");

$val->Create_Page(1,"History",1,1,1,"We are awesome");

echo "<br><br>";

$val->Get_All_Pages();

echo "<br><br>";

$val->Get_All_Subjects();





?>