<?php
session_start();
// database Connection
require_once ('../../db_Connection.php');
// if button is actually clicked
if ($_POST) {
	
	//Retrieve the field values from our registration form.
	
	$userName = !empty($_POST['userName']) ? trim($_POST['userName']) : null;
	$userMail = !empty($_POST['userMail']) ? trim($_POST['userMail']) : null;
	$firstName = !empty($_POST['firstName']) ? trim($_POST['firstName']) : null;
	$lastName  = !empty($_POST['lastName']) ? trim($_POST['lastName']) : null;
	$phoneNumber = !empty($_POST['phoneNumber']) ? trim($_POST['phoneNumber']) : null;
	$userType = !empty($_POST['userType']) ? trim($_POST['userType']) : null;
	
	
	
	$file = $_FILES['imgFile'];
	
	$fileName = $_FILES['imgFile']['name'];
	$fileTmpName = $_FILES['imgFile']['tmp_name'];
	$fileSize = $_FILES['imgFile']['size'];
	$fileError = $_FILES['imgFile']['error'];
	$fileType= $_FILES['imgFile']['name'];
	
	$fileExt = explode('.',$fileName);
	$fileAcutalExt = strtolower(end($fileExt));
	
	$allowed = array('jpg','jpeg');
	
	
	
	if (in_array($fileAcutalExt, $allowed)){
		if ($fileError === 0){
			if ($fileSize < 1000000){
				
				$validator = array('success' => false,'messages' => array());
				
				//checking if the supplied username already exists.
				// SQL statement and prepare it.
				$sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
				$stmt = $connection->prepare($sql);
				//Bind the provided username to our prepared statement.
				$stmt->bindValue(':username', $userName);
				//Execute.
				$stmt->execute();
				//Fetch the row.
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if($row['num'] > 0){
					header("Location: ../../../pages/superAdmin/users/addNewUser.php?username=".urlencode("Sorry! Username is already taken"));
					exit();
				}else {
					//checking if the supplied Email already exists.
					// SQL statement and prepare it.
					$sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
					$stmt = $connection->prepare($sql);
					//Bind the provided username to our prepared statement.
					$stmt->bindValue(':email', $userMail);
					//Execute.
					$stmt->execute();
					//Fetch the row.
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if ($row['num'] > 0) {
						header("Location: ../../../pages/superAdmin/users/addNewUser.php?usermail=".urlencode("Sorry! Email is already taken"));
						exit();
					} else {
						$hashPassword = password_hash($userName, PASSWORD_BCRYPT, array("cost" => 12));
						
						$sql = "INSERT INTO users(
      username, email, user_password, firstName, lastName,
      phone,user_type,profileImg)
      VALUES (:username, :email, :user_password, :firstName, :lastName,
              :phone, :user_type,:profileImg)";
						
						$stmt = $connection -> prepare($sql);
						$stmt->bindValue(':username',$userName);
						$stmt->bindValue(':email',$userMail);
						$stmt->bindValue(':user_password',$hashPassword);
						$stmt->bindValue(':firstName',$firstName);
						$stmt->bindValue(':lastName',$lastName);
						$stmt->bindValue(':phone',$phoneNumber);
					
						$stmt->bindValue(':user_type',$userType);
						$stmt->bindValue(':profileImg','1');
						
						$result = $stmt->execute();
						
						$fileNameNew = "profile".$userName.".".$fileAcutalExt;
						
						
						$fileDestination = '../../../assets/img/uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName,$fileDestination);
						
						if($result ===true){
							
							header("Location: ../../../pages/superAdmin/users/addNewUser.php?success=".urlencode("User Added Successfully"));
							exit();
							
						}else{
							header("Location: ../../../pages/superAdmin/users/addNewUser.php?user_error=".urlencode("There was an error Ading User"));
							exit();
						
						}// else echo validator
					}//else --> email validation
				}// else --> username validation// else --> username validation
				
				
			}else{
				
				header("Location: ../../../pages/superAdmin/users/addNewUser.php?filesize=".urlencode("File size it too big"));
				exit();
			}
		}else{
			header("Location: ../../../pages/superAdmin/users/addNewUser.php?err=".urlencode("There was an error uploading image"));
			exit();
		}
	}else{
		header("Location: ../../../pages/superAdmin/users/addNewUser.php?fileType=".urlencode("Please select an image file"));
		exit();
	}

    $connection=null;
    echo json_encode($validator);

}// post

