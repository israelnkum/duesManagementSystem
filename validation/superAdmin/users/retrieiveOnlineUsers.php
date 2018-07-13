<?php
session_start();
	require_once('../../db_Connection.php');
	$output= array('data' =>array());
	$sql = "SELECT * FROM users WHERE user_id =:user_id";
	$stmt = $connection->prepare($sql);
	$stmt->bindValue('user_id',$_SESSION['u_id']);
	$stmt->execute();
	$x =1;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		$userType='';
		if ($row['user_type'] == 'Super Admin'){
			$userType = '<label class="badge badge-success">Super Admin</label>';

		}else{

			$userType = '<label class="badge badge-primary">Admin</label>';
		}




		$output['data'][] = array(
			$x,
			$row['username'],
			$row['firstName']." ".$row['lastName'],
			$row['email'],
			$userType,
			$_SESSION['logged_in_time'] ,

	
		);
		$x++;
		$connection=null;

	}

	echo json_encode($output);
