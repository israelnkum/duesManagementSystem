<?php
	require_once '../../db_Connection.php';
	$payment_id= $_POST['payment_id'];
	
	
	$selectAmt ="SELECT * FROM `payment_log` WHERE payment_id =:payment_id";
	$selectStmt =$connection->prepare($selectAmt);
	$selectStmt->bindValue(':payment_id',$payment_id);
	$selectStmt->execute();
	
	$row = $selectStmt->fetch(PDO::FETCH_ASSOC);
	
	$connection=null;
	echo json_encode($row);
