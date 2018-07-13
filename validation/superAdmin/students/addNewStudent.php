<?php
session_start();
// database Connection
require_once ('../../db_Connection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.

    $stdFirstName = !empty($_POST['stdFirstName']) ? trim($_POST['stdFirstName']) : null;
    $stdLastName = !empty($_POST['stdLastName']) ? trim($_POST['stdLastName']) : null;
    $stdOtherName = !empty($_POST['stdOtherName']) ? trim($_POST['stdOtherName']) : null;
    $stdIndexNumber  = !empty($_POST['stdIndexNumber']) ? trim($_POST['stdIndexNumber']) : null;
    $stdClass = !empty($_POST['stdClass']) ? trim($_POST['stdClass']) : null;
    $stdPhoneNumber = !empty($_POST['stdPhoneNumber']) ? trim($_POST['stdPhoneNumber']) : null;



//checking if the supplied index number already exists.
    $sql = "SELECT COUNT(index_number) AS num FROM students WHERE index_number = :index_number AND std_class=:std_class";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':index_number', $stdIndexNumber);
	$stmt->bindValue(':std_class', $stdClass);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {

// Insert into the students table if index number does not exist
        $sql = "INSERT INTO `students`(`firstName`, `lastName`, `otherName`,
              `index_number`, `std_class`,phone)
             VALUES (:firstName, :lastName, :otherName, :indexNumber, :std_class,:phone)";

        $stmt = $connection-> prepare($sql);
        $stmt->bindValue(':firstName',$stdFirstName);
        $stmt->bindValue(':lastName',$stdLastName);
        $stmt->bindValue(':otherName',$stdOtherName);
        $stmt->bindValue(':indexNumber',$stdIndexNumber);
        $stmt->bindValue(':std_class',$stdClass);
        $stmt->bindValue(':phone',$stdPhoneNumber);

        $result = $stmt->execute();// execute the statement


        if($result === true){

            $validator['success'] = true;

        }else{

            $validator['success'] = false;
        }// else echo validator
    }// else --> username validation

    $connection=null;
    echo json_encode($validator);

}
