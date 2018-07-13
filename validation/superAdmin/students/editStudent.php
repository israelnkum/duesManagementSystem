<?php
// database Connection
require_once '../../db_Connection.php';
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.

    $stds_id = !empty($_POST['stds_id']) ? trim($_POST['stds_id']) : null;
    $editStdFirstName = !empty($_POST['editStdFirstName']) ? trim($_POST['editStdFirstName']) : null;
    $editStdLastName = !empty($_POST['editStdLastName']) ? trim($_POST['editStdLastName']) : null;
    $editStdOtherName = !empty($_POST['editStdOtherName']) ? trim($_POST['editStdOtherName']) : null;
    $editStdIndexNumber = !empty($_POST['editStdIndexNumber']) ? trim($_POST['editStdIndexNumber']) : null;
    $editStdClass = !empty($_POST['editStdClass']) ? trim($_POST['editStdClass']) : null;
    $editStdPhoneNumber = !empty($_POST['editStdPhoneNumber']) ? trim($_POST['editStdPhoneNumber']) : null;
	
	
	
	//checking if the supplied index number already exists.
	$sql = "SELECT COUNT(index_number) AS num FROM students WHERE index_number = :index_number AND std_class =:std_class";
	$stmt = $connection->prepare($sql);
	//Bind the provided username to our prepared statement.
	$stmt->bindValue(':index_number', $editStdIndexNumber);
	$stmt->bindValue(':std_class',$editStdClass);
	//Execute.
	$stmt->execute();
	//Fetch the row.
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($row['num'] > 1){
		header("Location: ../../../pages/superAdmin/students/allStudents.php?student_update_error=".urlencode("Oops! There was an Error Updating Stduent Information"));
		exit();
	}else {
		
		$sql = "UPDATE `students` SET
            `firstName`=:firstName,`lastName`=:lastName,`otherName`=:otherName,
            `index_number`=:index_number,`std_class`=:std_class,
            `phone`=:phone WHERE std_id=:std_id";
		
		$stmt = $connection->prepare($sql);
		
		$stmt->bindValue(':firstName',$editStdFirstName);
		$stmt->bindValue(':lastName',$editStdLastName);
		$stmt->bindValue(':otherName',$editStdOtherName);
		$stmt->bindValue(':index_number',$editStdIndexNumber);
		$stmt->bindValue(':std_class',$editStdClass);
		$stmt->bindValue(':phone',$editStdPhoneNumber);
		$stmt->bindValue(':std_id',$stds_id);
		
		$result=$stmt->execute();
		if($result){
			
			header("Location: ../../../pages/superAdmin/students/allStudents.php?student_update_success=".urlencode("Stduent Information Updated Successfully"));
			exit();
			
		}else{
			
			header("Location: ../../../pages/superAdmin/students/allStudents.php?student_update_error=".urlencode("Oops! There was an Error Updating Stduent Information"));
			exit();
		}
		$connection=null;
		echo json_encode($validator);
	}
	
	
 

}