<?php
	session_start();
	include_once '../../db_Connection.php';
	
	if (isset($_POST['btnUpload'])){
		$c_userName =$_POST['c_userName'];
		$c_userId =$_POST['c_userId'];
		$file = $_FILES['file'];
		
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType= $_FILES['file']['name'];
		
		$fileExt = explode('.',$fileName);
		$fileAcutalExt = strtolower(end($fileExt));
		
		$allowed = array('jpg','jpeg');
		
		if (in_array($fileAcutalExt, $allowed)){
			if ($fileError === 0){
				if ($fileSize < 1000000){
					$fileNameNew = "profile".$_SESSION['username'].".".$fileAcutalExt;
					
					
					$fileDestination = '../../../assets/img/uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName,$fileDestination);
					
					$sql = "UPDATE users SET  	profileImg = :one WHERE user_id = :user_id";
					$stmt = $connection->prepare($sql);
					
					$stmt->bindValue(':one','1');
					$stmt->bindValue(':user_id',$_SESSION['user_id']);
					$result=$stmt->execute();
					
					header("Location: ../../../pages/superAdmin/users/editUserInfo.php?img_success=".urlencode("Image Upload Success"));
					exit();
				}else{
					header("Location: ../../../pages/superAdmin/users/editUserInfo.php?file_size=".urlencode("File size is more than 500kb"));
					exit();
				}
			}else{
				header("Location: ../../../pages/superAdmin/users/editUserInfo.php?error_uploading=".urlencode("Sorry! There was an Error whiles uploading your image"));
				exit();
			}
		}else{
			header("Location: ../../../pages/superAdmin/users/editUserInfo.php?file_type=".urlencode("Sorry! You cant Upload Files of This Type. Only jpg is allowed"));
			exit();
		}
		
		
		/*
		 * Delete Profile Image When the REmove button is Cliked
		*/
	}elseif (isset($_POST['deleteProfileImage'])) {
		$c_userName =$_POST['c_userName'];
		$c_userId =$_POST['c_userId'];
		$file_name = "../../../assets/img/uploads/profile".$c_userName."*";
		$file_info = glob($file_name);
		$file_ext = explode(".",$file_info[0]);
		$file_acutal_ext = $file_ext[3];
	
		$file = "../../../assets/img/uploads/profile".$c_userName.".jpg";
		
		if (!unlink($file)) {
			header("Location: ../../../pages/superAdmin/users/editUserInfo.php?empty_file=".urlencode("Sorry! No Image to Delete"));
			exit();
		}else {
			$sql = "UPDATE users SET profileImg = :one WHERE user_id = :user_id";
			$stmt = $connection->prepare($sql);
			
			$stmt->bindValue(':one','0');
			$stmt->bindValue(':user_id',$c_userId);
			$result=$stmt->execute();
			header("Location: ../../../pages/superAdmin/users/editUserInfo.php?image_delete=".urlencode("Image Deleted Successfully"));
			exit();
		}
		
	}