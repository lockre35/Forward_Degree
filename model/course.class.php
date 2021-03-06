<?php
class course{
	var $courseID;
	var $collegeID;//
	var $name;
	var $number;//
	var $section;//
	var $description;
	var $seats;
	
	function get($department, $number, $section){
		//require_once('../Infastructure/db_access.php');
		$db = new db();
		$sql = "Select * from tbl_course where CollegeID='$department' and CourseNumber='$number' and CourseSection='$section'";
		$db->query($sql);
		$db->nextRecord();

		$this->courseID=$db->record['CourseID'];
		$this->name=$db->record['CourseName'];
		$this->number=$db->record['CourseNumber'];
		
		return $db->numRows();
	}
	
	function getSingle($id){
		//require_once('../Infastructure/db_access.php');
		$db = new db();
		$sql = "Select * from tbl_course where CourseID='$id'";
		$db->query($sql);
		$db->nextRecord();

		$this->courseID=$db->record['CourseID'];
		$this->name=$db->record['CourseName'];
		$this->number=$db->record['CourseNumber'];
		$this->section=$db->record['CourseSection'];
		$this->description=$db->record['CourseDescription'];
		$this->seats=$db->record['SeatsRemaining'];
		$this->collegeID=$db->record['CollegeID'];
		
		return $db->numRows();
	}
	
	function set($department, $number, $section, $name, $description, $seats){
	
		//require_once('../Infastructure/db_access.php');
		
		$db = new db();
		$sql = "Insert into tbl_course (CollegeID, CourseNumber, CourseSection, CourseName, CourseDescription, SeatsRemaining) values ('$department', '$number', '$section', '$name', '$description', '$seats')";
		$db->query($sql);
		$sql = "Select * from tbl_course where CollegeID='$department' and CourseNumber='$number' and CourseSection='$section'";
		$db->query($sql);
		//echo "Here";
		if($db->numRows()==1){
			$this->courseID=$db->record['CourseID'];
			$this->name=$db->record['CourseName'];
			$this->number=$db->record['CourseNumber'];
		}
		return $db->numRows();
	}
	
	function getAll($department){
		//require_once('../Infastructure/db_access.php');
		$db = new db();
		$sql = "Select CollegeAbr,CourseID,CourseNumber,CourseName from tbl_college,tbl_course WHERE tbl_college.CollegeID='$department' AND tbl_course.CollegeID='$department'";
		$db->query($sql);
		$returnArray = array();
		while($db->nextRecord()){
			$id=$db->record['CourseID'];
			$name=$db->record['CourseName'];
			$abr=$db->record['CollegeAbr'];
			$number=$db->record['CourseNumber'];
			$array = array("CourseID"=>$id,"CourseName"=>$name,"CollegeAbr"=>$abr,"CourseNumber"=>$number);

			array_push($returnArray,$array);
		}
		return $returnArray;
	}
}
?>