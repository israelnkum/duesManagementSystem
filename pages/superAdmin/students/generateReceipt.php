<?php
	require_once('../../../validation/db_Connection.php');
	include '../../../includes/superAdmin/header.inc.php';
	
	if (isset($_POST['btn_generate'])) {
		$cStudentId = !empty($_POST['s_id']) ? trim($_POST['s_id']) : null;
		$payment_log_id = !empty($_POST['p_id']) ? trim($_POST['p_id']) : null;
		
		$studentQuery ="SELECT * FROM students WHERE std_id =:std_id";
		$studentStmt = $connection->prepare($studentQuery);
		
		$studentStmt->bindValue(":std_id",$cStudentId);
		$studentStmt->execute();
		
		
		while($stdRow = $studentStmt->fetch(PDO::FETCH_ASSOC)){
			$firstName = $stdRow['firstName'];
			$lastName = $stdRow['lastName'];
			$otherName = $stdRow['otherName'];
			$index_number = $stdRow['index_number'];
			$std_class = $stdRow['std_class'];
			$lacost = $stdRow['lacost'];
		}
		
		$sql = "SELECT * FROM payment_log WHERE payment_id =:payment_id";
		$stmt = $connection->prepare($sql);
		$stmt->bindValue(':payment_id',$payment_log_id);
		$stmt->execute();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
			$amt_paid = $row['amount_paid'];
			$amtInWord = $row['amtInWord'];
			$refDate = $row['refDate'];
			$receipt_id = $row['receipt_id'];
			$currentUser = $row['currentUser'];
			$datePaid=$row['datePaid'];
			$arrears=$row['arrears'];
		}
	}


?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-right mt-md-5">
			<a role="button" href="../paymentLog/paymentLog.inc.php" class="btn btn-warning">Go back</a>
			<button id="btn-print" onclick="printDiv()" class="btn btn-info">Print</button>
		</div>
	</div>
</div>
<div class="container" id="receiptDiv">
	<div class="row">
		<div class="col-md-12 text-center" style="align-items: center; text-align: center">
			<img src="../../../assets/img/header.jpg" style="height: 70px; " >
		</div>
	</div>
	
	
	
	<br>
	<div style="text-align: center">
		Takoradi Technical University<br>
		P.O. Box 256, Takoradi<br>
		Email: itsu@yahoo.com<br>
		<hr>
	</div>
	<div style="text-transform: uppercase; float: left; margin-left: 70px;">
		<p>Name: <span style="text-align: right"><?php
					echo	$firstName." ".$lastName." ".$otherName;
				?></span></p>
		<p>Index Number: <span><?php echo  $index_number;?></span></p>
		<p>Level: <span><?php echo $std_class;?></span></p>
	</div>
	<div style="float: right;margin-right: 70px;">
		<p>Date: <span><?php echo substr($datePaid,"0","10")?></span></p>
		<p>Time: <span><?php echo substr($datePaid,"10")?></span></p>
		<p>Ref. Number: <span><?php echo $refDate.$receipt_id?></span></p>
	</div>
	
	
	
	<br><br><br><br><br><br><br><br>
	<hr>
	<div style="text-transform: uppercase; float: left;margin-left: 70px;">
		<p class="lead">Amount(Figures)</p>
		<p class="lead">Amount in Words</p>
		<p class="lead">Arrears</p>
	</div>
	<div style="float: right;margin-right: 70px;">
		<p class="mt-2">
			<strong>
				<?php
					echo $amt_paid;
				?>
			</strong>
		</p>
		<p class="mt-1">
			<strong>
				<?php
					echo $amtInWord." Ghana Cedis";
				?>
			</strong>
		</p>
		<p class="mt-3">
			<?php
				echo $arrears;
			?>
		</p>
	</div>
	
	<br><br><br><br><br><br><br><br>
	<hr>
	<div style="text-transform: uppercase; float: left;margin-left: 70px;">
		<p class="lead">Lacost</p>
	</div>
	<div style="float: right;margin-right: 70px;">
		<p class="lead">
			<?php
				if( $lacost == 1){
					echo "Received";
				}else{
					echo "Not Received";
				}
			
			?>
		</p>
	</div>
	
	
	<br><br><br><br><br><br><br>
	
	<div style="text-align: center; float: left;margin-left: 70px;">
		<p class="lead mt-1">...........................</p>
		<p class="lead">Student Signature</p>
	</div>
	<div style="float: right; text-align: center; margin-right: 70px;">
		<p class="lead">................................</p>
		<p class="lead">Supervisor's Signature</p>
		<p class="lead">
			<?php
				
				
				require_once "../../../validation/db_Connection.php";
				$sql = "SELECT * FROM users WHERE  username = :username";
				$stmt = $connection->prepare($sql);
				$stmt->bindValue(':username',$currentUser);
				$stmt->execute();
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo $row['firstName']." ".$row['lastName'];
					
				}
			
			
			?>
		</p>
		
	</div>

</div>



</body>
</html>

<script>

    function  printDiv() {
        var divToPrint = document.getElementById("receiptDiv");
        var newWin = window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write(divToPrint.innerHTML.replace("Print Me"))
        // newWin.document.write('<html><body onload="window.print()"> '+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        newWin.print();
        newWin.close();


    }
</script>
