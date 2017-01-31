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



?>