<?php
require_once '../../db_Connection.php';

$output = array('success' => false, 'messages' => array());

$id = $_POST['stds_id'];// getting Current id

// deleting from the new_voting table
//$drpsql = "SET FOREIGN_KEY_CHECKS=0";
//$drpstmt =$connection->prepare($drpsql);
//	$drpstmt->execute();

	
$sql = "DELETE FROM students WHERE std_id = :std_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':std_id', $id);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;
	$drpsql = " SET FOREIGN_KEY_CHECKS=1";
	$drpstmt =$connection->prepare($drpsql);
	$drpstmt->execute();

}else{
    $output['success'] = false;
	$drpsql = " SET FOREIGN_KEY_CHECKS=1";
	$drpstmt =$connection->prepare($drpsql);
	$drpstmt->execute();

}

$connection=null;
echo json_encode($output);
