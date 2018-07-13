<?php
	session_start();
	require_once('../../db_Connection.php');

	$output= array('data' =>array());

	$count = "SELECT COUNT(std_id) as num FROM `payment_log` WHERE std_id = :std_id";
	$countStmt =$connection->prepare($count);
	$countStmt->bindValue('std_id',$_SESSION['std_id']);

	$countStmt->execute();
	
	$countRow = $countStmt->fetch(PDO::FETCH_ASSOC);

	$counted = $countRow['num'];

	$sql = "SELECT students.firstName, students.lastName,  students.otherName, students.std_class,
                students.index_number,payment_log.payment_id, payment_log.amount_paid, payment_log.datePaid,payment_log.refDate,
                 payment_log.receipt_id,payment_log.payment_type,payment_log.payment_id
        FROM payment_log
        INNER JOIN students ON payment_log.std_id = :current_std LIMIT :limit";
	$stmt = $connection->prepare($sql);
	$stmt->bindValue('current_std',$_SESSION['std_id']);
	$stmt->bindValue('limit',$counted);
	$stmt->execute();
	$x =1;

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

if ($row['payment_type']== 'New Payment') {
	$actionBtn ='
		<a role="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal"
		data-target="#reversePayment" onclick="reversePayment('.$row['payment_id'].')">
				<i class="ti ti-money"></i> Reverse
		</a>
		';
}else {
	$actionBtn ='
		<button type="button" disabled class="btn btn-sm btn-danger" href="#" data-toggle="modal"
		data-target="#reversePayment" onclick="reversePayment('.$row['payment_id'].')">
				<i class="ti ti-money"></i> Reverse
		</button>
		';
}


			$payment_type ='';
			if ($row['payment_type'] == 'New Payment'){
				$payment_type = '<label class="badge badge-primary">New Payment</label>';

			}else {

				$payment_type = '<label class="badge badge-danger">Reversed</label>';
		}
		$output['data'][] = array(
			$x,
			$row['amount_paid'],
			$row['refDate'].$row['receipt_id'],
			$row['datePaid'],
			$payment_type,
			$actionBtn
		);
		$x++;
		$connection=null;

	}

	echo json_encode($output);
