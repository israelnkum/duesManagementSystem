<?php
session_start();
	require_once '../../db_Connection.php';

	$output = array('success' => false, 'messages' => array());

	if ($_POST) {



	//Retrieve the field values from our registration form.

	    $amt = !empty($_POST['amtPaid']) ? trim($_POST['amtPaid']) : null;
	    $std_id = !empty($_POST['std_id']) ? trim($_POST['std_id']) : null;
			$amt_words = !empty($_POST['amt_words']) ? trim($_POST['amt_words']) : null;


			$sql = "SELECT * FROM students WHERE std_id = :std_id";

			$stmt = $connection->prepare($sql);
			$stmt->bindValue(':std_id',$std_id);
			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$oldAmt = $row['amount_paid'];
			}

			$updateAmt = $oldAmt-$amt;

	    $sqlUpdate = "UPDATE `students` SET `amount_paid`=:amount_paid WHERE `std_id` =:std_id";
	    $stmtUpdate = $connection->prepare($sqlUpdate);
	    $stmtUpdate->bindValue(':amount_paid',$updateAmt);
			$stmtUpdate->bindValue(':std_id',$std_id);
	    $result=$stmtUpdate->execute();




			$sql= "SELECT MAX(receipt_id) AS max_id  FROM `payment_log`";

			$stmt = $connection->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			 $rec =$row['max_id'];
			$currentDate =substr(date('Ymd'),2);
			if ($row['max_id'] = ''){
					$newRef=1;
					$RefDate = "iTSU".$currentDate;
			}else{

					$newRef= $rec+=1;

			}
	if($rec < 10){
			$RefDate=  "iTSU".$currentDate."0000"; // value under 10
	}else if($rec >=10 && $rec < 100){
			$RefDate=  "iTSU".$currentDate."000"; // value under 100
	}else if($rec>=100 && $rec < 1000){
			$RefDate = "iTSU".$currentDate."00"; // value under 1000
	}else if($rec >=1000 && $rec < 10000){
			$RefDate = "iTSU".$currentDate."0"; // value under 10000
	}
	else $RefDate = "iTSU".$currentDate; // lebih dari 10000



	// Insert into the students table if index number does not exist
	        $sql = "INSERT INTO `payment_log`(`std_id`, `amount_paid`, `amtInWord`,`receipt_id`,payment_type,refDate,datePaid,currentUser)
	          VALUES (:std_id, :amount_paid,:amtInWord, :receipt_id,:payment_type, :refDate,:datePaid,:currentUser)";

	        $stmt = $connection-> prepare($sql);
	        $stmt->bindValue(':std_id',$std_id);
	        $stmt->bindValue(':amount_paid',$amt);
		    	$stmt->bindValue(':amtInWord',$amt_words);
		    	$stmt->bindValue(':receipt_id',$newRef);
					$stmt->bindValue(':payment_type','Reverse');
		    	$stmt->bindValue(':refDate',$RefDate);
					$stmt->bindValue(':datePaid',date('Y-m-d h:i:s'));
					$stmt->bindValue(':currentUser',$_SESSION['u_name']);


	        $stmt->execute();// execute the statement


	    if($result){
	        $output['success'] = true;

	    }else{
	        $output['success'] = false;
	    }
	    $connection=null;
	    echo json_encode($output);

	}
