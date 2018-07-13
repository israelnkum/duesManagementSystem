<?php
session_start();
require_once('../../db_Connection.php');
	$maxSql = "SELECT MAX(duesAmt) as maximum FROM preferences";
	$maxStmt = $connection->prepare($maxSql);
	$maxStmt->execute();

	$maxRow = $maxStmt->fetch(PDO::FETCH_ASSOC);
	$maximum = $maxRow['maximum'];

$output= array('data' =>array());
$sql = "SELECT * FROM students";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$stdClass =$row['std_class'];

    $lacost='';
    if ($row['lacost'] == '1'){
        $lacost = '<label class="label label-success" ><i class="fa  fa-check "></i></label>';

    }else{

        $lacost = '<label class="label label-danger"  ><i class="fa fa-close"></i></a>';
    }

    $amtPaid = $row['amount_paid'];

    $fiftyPercent = ($maximum/100)*50;

    $payment_stats ='';
    if ($amtPaid > 0 && $amtPaid < $maximum){
        $payment_stats = '<label class="badge badge-primary">Part Payment</label>';

    }else if ($amtPaid <=0){

        $payment_stats = '<label class="badge badge-danger">Owing</label>';
    }else {
        $payment_stats = '<label class="badge badge-success" >Full Payment</label>';

    }


    if ($_SESSION['user_type']=='Super Admin') {
			$actionBtn = '

		<div class="row">
			<div class="col-sm-4">
			 <form action="../../../pages/superAdmin/students/editStudentInfo.inc.php" method="POST">

	        <input type="hidden" name="student_id" value="' .$row['std_id'].'">
			<button type="submit"  name="btn_userId" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Student Info">
		        <i class="mdi mdi-account-edit"></i>
		    </button>
			</div>
	     </form>
		<div class="col-sm-6">
			 <a role="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal"
		    data-target="#deleteStdModal" onclick="deleteStudent('.$row['std_id'].')" data-toggle="tooltip" data-placement="top" title="Delete Students Info">
		        <i class="ti ti-trash"></i>
		    </a>
		</div>
	</div>

	     ';
    }else {
			$actionBtn = '

		<div class="row">
			<div class="col-sm-4">
			 <form action="../../../pages/superAdmin/students/editStudentInfo.inc.php" method="POST">

	        <input type="hidden" name="student_id" value="' .$row['std_id'].'">
			<button type="submit"  name="btn_userId" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Student Info">
		        <i class="mdi mdi-account-edit"></i>Edit
		    </button>
			</div>
	     </form>
	</div>

	     ';
    }

    if($amtPaid == $maximum && $row['lacost'] == 1){
    	$pAction='
    	    <div class="row">
		<div class="col-sm-4">
		 <form action="../../../pages/superAdmin/students/makePayment.inc.php" method="POST">

        <input type="hidden" name="student_id" value="' .$row['std_id']. '">
		<button type="submit"  name="btn_makePayment" class="btn btn-sm btn-info" disabled data-toggle="tooltip" data-placement="top" title="Make Payment">
	        <i class="mdi mdi-cash-multiple"></i>
	    </button>
		</div>
     </form>
	<div class="col-sm-6">
		<form action="../../../pages/superAdmin/students/reversePayment.inc.php" method="POST">

        <input type="hidden" name="std_id" value="' .$row['std_id'].'">
		<button type="submit"  name="btn_reversePayment" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Reverse Payment">
	        <i class="mdi mdi-recycle"></i>
	    </button>
		</div>
     </form>
</div>
    	';
    }else{
	    $pAction = '

<div class="row">
		<div class="col-sm-4">
		 <form action="../../../pages/superAdmin/students/makePayment.inc.php" method="POST">

        <input type="hidden" name="student_id" value="' .$row['std_id']. '">
		<button type="submit"  name="btn_makePayment" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Make Payment">
	        <i class="mdi mdi-cash-multiple"></i>
	    </button>
		</div>
     </form>
	<div class="col-sm-6">
		<form action="../../../pages/superAdmin/students/reversePayment.inc.php" method="POST">

        <input type="hidden" name="std_id" value="' .$row['std_id'].'">
		<button type="submit"  name="btn_reversePayment" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Reverse Payment">
	        <i class="mdi mdi-recycle"></i>
	    </button>
		</div>
     </form>
</div>


     ';
    }
   

    $output['data'][] = array(
        $x,
        $row['lastName']." ".$row['firstName']." ".$row['otherName'],
        $row['index_number'],
        $row['std_class'],
        $row['amount_paid'],
        $lacost,
        $payment_stats,
        $row['phone'],
        $actionBtn,
        $pAction
    );
    $x++;
    $connection=null;

}

echo json_encode($output);
