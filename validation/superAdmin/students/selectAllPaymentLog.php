<?php

require_once('../../db_Connection.php');
$output= array('data' =>array());
$sql = "SELECT students.std_id, students.firstName, students.lastName,  students.otherName, students.std_class,
                students.index_number,payment_log.payment_id, payment_log.amount_paid, payment_log.datePaid,payment_log.refDate,
                 payment_log.receipt_id,payment_log.payment_type,payment_log.currentUser
        FROM payment_log
        INNER JOIN students ON payment_log.std_id = students.std_id ORDER BY  payment_log.datePaid";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $printBtn ='
  <form action="../../../pages/superAdmin/students/generateReceipt.php" method="POST">
	<input type="hidden" name="s_id" value="' .$row['std_id'].'">
    <input type="hidden" name="p_id" value="' .$row['payment_id'].'">
    <button type="submit" name="btn_generate" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Generate Receipt">
       <i class="mdi mdi-printer"></i> Receipt
   </button>
  </form>';
	$payment_type ='';
	if ($row['payment_type'] == 'New Payment'){
		$payment_type = '<label class="badge badge-primary">New Payment</label>';

	}else {

		$payment_type = '<label class="badge badge-danger">Reversed</label>';
}

    $output['data'][] = array(
        $x,
        $row['lastName']." ".$row['firstName']." ".$row['otherName'],
        $row['index_number'],
        $row['std_class'],
        $row['amount_paid'],
        $row['refDate'].$row['receipt_id'],
	    $payment_type,
        $row['datePaid'],
	    $row['currentUser'],
      $printBtn

    );
    $x++;
    $connection=null;

}

echo json_encode($output);
