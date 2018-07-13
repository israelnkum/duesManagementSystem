<?php
	require_once('../../../validation/db_Connection.php');
		include '../../../includes/superAdmin/header.inc.php';
	
	$maxSql = "SELECT MAX(duesAmt) as maximum FROM preferences";
	$maxStmt = $connection->prepare($maxSql);
	$maxStmt->execute();
	
	$maxRow = $maxStmt->fetch(PDO::FETCH_ASSOC);
	$maximum = $maxRow['maximum'];

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-right mt-md-5">
			<a role="button" href="../students/allStudents.php" class="btn btn-warning">Go back</a>
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
<!--	<div style="text-align: center; height: 200px; width: 100%; align-items: center; background: url('../../../assets/img/header.png') center center no-repeat">-->
<!--	</div>-->


	<br>
	<div style="text-align: center">
		Takoradi Technical University<br>
		P.O. Box 256, Takoradi<br>
		Email: itsu@yahoo.com<br>
		<hr>
	</div>
	<div style="text-transform: uppercase; float: left; margin-left: 70px;">
		<p>Name: <span style="text-align: right"><?php
					echo $_SESSION['firstName']." ".$_SESSION['lastName']." ".$_SESSION['otherName'];
				?></span></p>
		<p>Index Number: <span><?php echo $_SESSION['index_number'];?></span></p>
		<p>Level: <span><?php echo $_SESSION['std_class'];?></span></p>
	</div>
	<div style="float: right;margin-right: 70px;">
		<p>Date: <span><?php echo date('Y-m-d')?></span></p>
		<p>Time: <span><?php echo date('h:i a')?></span></p>
		<p>Ref. Number: <span><?php echo $_SESSION['refNumber'];?></span></p>
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
					echo $_SESSION['amtPaying'];
				?>
			</strong>
		</p>
		<p class="mt-1">
			<strong>
				<?php
					echo $_SESSION['amtInWords']." Ghana Cedis";
				?>
			</strong>
		</p>
		<p class="mt-3">
			<?php
				
				echo $maximum- ($_SESSION['amtPaying'] + $_SESSION['amtPaid']);
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
				if( $_SESSION['lacost'] == 1){
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
		<p class="lead">
			<?php


				require_once "../../../validation/db_Connection.php";
				$sql = "SELECT * FROM users WHERE  username = :username";
				$stmt = $connection->prepare($sql);
				$stmt->bindValue(':username',$_SESSION['u_name']);
				$stmt->execute();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					echo $row['firstName']." ".$row['lastName'];

				}


			?>
		</p>
		<p class="lead">Supervisor's Signature</p>
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
