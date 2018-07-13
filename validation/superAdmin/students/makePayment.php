
<?php
session_start();

// database Connection
require_once ('../../db_Connection.php');
// if button is actually clicked
if (isset($_POST['makePaymentBtn'])) {
	
	
	$maxSql = "SELECT MAX(duesAmt) as maximum FROM preferences";
	$maxStmt = $connection->prepare($maxSql);
	$maxStmt->execute();
	
	$maxRow = $maxStmt->fetch(PDO::FETCH_ASSOC);
	$maximum = $maxRow['maximum'];
	
	
    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.
	
	 $std_id =!empty($_POST['std_id']) ? trim($_POST['std_id']) : null;
	$amtPaid = !empty($_POST['amtPaid']) ? trim($_POST['amtPaid']) : null;
   $amtPaying = !empty($_POST['amtPaying']) ? trim($_POST['amtPaying']) : null;
	 $amtInWords = !empty($_POST['amtInWords']) ? trim($_POST['amtInWords']) : null;
	$lacost = !empty($_POST['lacost']) ? trim($_POST['lacost']) : null;
	$arrears = $maximum- ($amtPaying + $amtPaid);
	
	$_SESSION['amtPaying'] = $amtPaying;
	$_SESSION['amtInWords'] = $amtInWords;
	$_SESSION['lacost'] = $lacost;

	$newAmtPaying = $amtPaid +$amtPaying;

	$sql1 = "SELECT * FROM students WHERE  std_id = :std_id";
	$stmt1 = $connection->prepare($sql1);
	$stmt1->bindValue('std_id',$std_id);
	$stmt1->execute();

	while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){

		$_SESSION['id']=$row['std_id'];
		$_SESSION['std_fname'] = $row['firstName'];
		$_SESSION['std_lname'] = $row['lastName'];
		$_SESSION['std_oname'] = $row['otherName'];
		$_SESSION['std_indexNumber'] = $row['index_number'];
		$_SESSION['std_Class'] = $row['std_class'];
		$_SESSION['amtPaid'] = $row['amount_paid'];



	}



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


	// update student table and set lacost =1 after payment is done
	$updateLacost = "UPDATE `students` SET `lacost`=:lacost, amount_paid=:amount_paid
 	WHERE `std_id` =:std_id";

	$LacostStmt = $connection-> prepare($updateLacost);
	$LacostStmt->bindValue(':lacost',$lacost);
	$LacostStmt->bindValue(':amount_paid',$newAmtPaying);
	$LacostStmt->bindValue(':std_id',$std_id);

	$LacostStmt->execute();

// Insert into the students table if index number does not exist
        $sql = "INSERT INTO `payment_log`(`std_id`, `amount_paid`,arrears, `amtInWord`,`receipt_id`,payment_type,refDate,datePaid,currentUser)
          VALUES (:std_id, :amount_paid,:arrears, :amtInWord, :receipt_id,:payment_type, :refDate,:datePaid,:currentUser)";
	
	 
        $stmt = $connection-> prepare($sql);
        $stmt->bindValue(':std_id',$std_id);
        $stmt->bindValue(':amount_paid',$amtPaying);
        $stmt->bindValue(':arrears',$arrears);
	    $stmt->bindValue(':amtInWord',$amtInWords);
	    $stmt->bindValue(':receipt_id',$newRef);
		$stmt->bindValue(':payment_type','New Payment');
	    $stmt->bindValue(':refDate',$RefDate);
		$stmt->bindValue(':datePaid',date('Y-m-d h:i:s'));
		$stmt->bindValue(':currentUser',$_SESSION['u_name']);


        $result = $stmt->execute();// execute the statement


	$_SESSION['refNumber']=$RefDate.$newRef;
        if($result === true){
           // $validator['success'] = true;
           header("Location: ../../../pages/superAdmin/students/receipt.php?printReceipt");
           exit();

        }else{

            $validator['success'] = false;
        }// else echo validator


    $connection=null;
    echo json_encode($validator);

}elseif(isset($_POST['btn_issueLacost'])){
	
	$lac = $_POST['lacost'];
	
	$sql = "UPDATE `students` SET `lacost`=:lacost WHERE std_id=:std_id";
	$stmt=$connection->prepare($sql);
	$stmt->bindValue(":lacost",$lac);
	$stmt->bindValue(":std_id",$_SESSION['std_id']);
	
	$result=$stmt->execute();
	if($result){
		
		header("Location: ../../../pages/superAdmin/students/allStudents.php?lacost=".urlencode("Lacost Issued Successfully"));
		exit();
		
	}else{
		
		header("Location: ../../../pages/superAdmin/students/allStudents.php?lacost_error=".urlencode("Oops! There was an Error, Please try again"));
		exit();
	}
}
