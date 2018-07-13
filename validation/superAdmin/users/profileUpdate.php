<?php
	session_start();
// database Connection
	require_once '../../db_Connection.php';
// if button is actually clicked
	if (isset($_POST['btn_profileUpdate'])) {
		
		$validator = array('success' => false, 'messages' => array());

//Retrieve the values from our registration form.
		
		$u_id = !empty($_POST['u_id']) ? trim($_POST['u_id']) : null;
		$editUsername = !empty($_POST['editUsername']) ? trim($_POST['editUsername']) : null;
		$editUserMail = !empty($_POST['editUserMail']) ? trim($_POST['editUserMail']) : null;
		$editFirstName = !empty($_POST['editFirstName']) ? trim($_POST['editFirstName']) : null;
		$editLastName = !empty($_POST['editLastName']) ? trim($_POST['editLastName']) : null;
		$editUserType = !empty($_POST['editUserType']) ? trim($_POST['editUserType']) : null;
		$editPhoneNumber = !empty($_POST['editPhoneNumber']) ? trim($_POST['editPhoneNumber']) : null;
		
		$sql = "UPDATE `users` SET `username`=:username,`email`=:email,`firstName`=:firstName,
					`lastName`=:lastName,`phone`=:phone,`user_type`=:user_type WHERE user_id =:user_id";
		
		$stmt = $connection->prepare($sql);
		
		$stmt->bindValue(':username',$editUsername);
		$stmt->bindValue(':email',$editUserMail);
		$stmt->bindValue(':firstName',$editFirstName);
		$stmt->bindValue(':lastName',$editLastName);
		$stmt->bindValue(':phone',$editPhoneNumber);
		$stmt->bindValue(':user_type',$editUserType);
		$stmt->bindValue(':user_id',$u_id);
		
		$result=$stmt->execute();
		if($result){
			$validator['success'] = true;
			unset($_SESSION['u_name']);
			$_SESSION['u_name']=$editUsername;
			
			$file_name = "../../../assets/img/uploads/profile".$editUsername."*";
			$file_info = glob($file_name);
			$file_ext = explode(".",$file_info[0]);
			$file_acutal_ext = $file_ext[3];
			$file = "../../../assets/img/uploads/profile".$_SESSION['username'].".jpg";
			//die (substr($file,25));
			//die($_SESSION['username']);
			$fileNameNew = "../../../assets/img/uploads/profile".$_SESSION['u_name'].".jpg";
			
			rename($file,$fileNameNew);
			
			header("Location: ../../../pages/superAdmin/users/allUsers.php?user_update_success=".urlencode("Successfully updated"));
			exit();
			
		}else{
			header("Location: ../../../pages/superAdmin/users/allUsers.php?user_update_error=".urlencode("Error While Updating"));
			exit();
		}
		$connection=null;
		echo json_encode($validator);
		
	}