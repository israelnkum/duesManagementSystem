<?php
	require_once '../../db_Connection.php';
	
	$output = array('success' => false, 'messages' => array());
	
	$id = $_POST['users_id'];// getting Current id

// deleting from the new_voting table
	$sql = "DELETE FROM users WHERE user_id = :user_id";
	$stmt =$connection->prepare($sql);
	$stmt->bindValue(':user_id', $id);
	$result = $stmt->execute();
	if($result === TRUE){
		$output['success'] = true;
		
	}else{
		$output['success'] = false;
		
	}
	
	$connection=null;
	echo json_encode($output);
