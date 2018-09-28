<?php
	require_once('../../../validation/db_Connection.php');
	include '../../../includes/superAdmin/header.inc.php';
    include '../../../money.php';
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
<div class="container" id="receiptDiv" style="font-family: arial, sans-serif">
    <div style="; padding: 10px">
        <div class="row">
            <div class="col-md-12 text-center" style="align-items: center; text-align: center">
                <img src="../../../assets/img/header.jpg" style="height: 70px; ">
            </div>
        </div>

        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p>Name: <span style="text-align: right"><?php
                        echo $_SESSION['firstName']." ".$_SESSION['lastName']." ".$_SESSION['otherName'];
                        ?></span></p>
                <p>Index Number: <span><?php echo $_SESSION['index_number'];?></span></p>
                <p>Level: <span><?php echo $_SESSION['std_class'];?></span></p>
            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p>Date: <span><?php echo date('Y-m-d')?></span></p>
                <p>Time: <span><?php echo date('h:i a')?></span></p>
                <p>Ref. Number: <span><?php echo $_SESSION['refNumber'];?></span></p>
            </div>
        </div>

        <br><br><br><br><br><br>
        <hr>
        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p>Amount(Figures)</p>
                <p >Amount in Words</p>
                <p >Arrears</p>

            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p class="mt-2">
                    <?php
                    echo $amt_paid;
                    ?>
                </p>
                <p class="mt-1">
                    <?php
                    echo convert($amt_paid);
                    ?>
                </p>
                <p class="mt-3">
                    <?php
                    echo $arrears;
                    ?>
                </p>
            </div>
        </div>

        <br><br><br><br><br><br>
        <hr>
        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p >Lacost</p>
            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p>
                    <?php
                    if( $lacost == 1){
                        echo "Received";
                    }else{
                        echo "Not Allowed";
                    }
                    ?>
                </p>
            </div>
        </div>
        <br><br><br>
        <div style=" float: left; text-align: justify">
            <p class="lead">...........................</p>
            <p class="lead">Student Signature</p>
        </div>
        <div style="margin-left: 70px; float: right; text-align: justify;">
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
        </div>
    </div>
    <br><br><br>
    <!-- ------------------------------------------------------>
<div>
    -------------------------------------------------------------------------------------------------------------------------------------------------
</div>
    <br>
        <div class="row">
            <div class="col-md-12 text-center" style="align-items: center; text-align: center">
                <img src="../../../assets/img/header.jpg" style="height: 70px; " >
            </div>
        </div>

        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p>Name: <span style="text-align: right"><?php
                        echo $_SESSION['firstName']." ".$_SESSION['lastName']." ".$_SESSION['otherName'];
                        ?></span></p>
                <p>Index Number: <span><?php echo $_SESSION['index_number'];?></span></p>
                <p>Level: <span><?php echo $_SESSION['std_class'];?></span></p>
            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p>Date: <span><?php echo date('Y-m-d')?></span></p>
                <p>Time: <span><?php echo date('h:i a')?></span></p>
                <p>Ref. Number: <span><?php echo $_SESSION['refNumber'];?></span></p>
            </div>
        </div>

        <br><br><br><br><br><br>
        <hr>
        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p>Amount(Figures)</p>
                <p >Amount in Words</p>
                <p >Arrears</p>

            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p class="mt-2">
                    <?php
                    echo $amt_paid;
                    ?>
                </p>
                <p class="mt-1">
                    <?php
                    echo convert($amt_paid);
                    ?>
                </p>
                <p class="mt-3">
                    <?php

                    echo $arrears;
                    ?>
                </p>
            </div>
        </div>

        <br><br><br><br><br><br>
        <hr>
        <div style="font-size: 15px;">
            <div style=" float: left; text-align: justify">
                <p >Lacost</p>
            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
                <p>
                    <?php
                    if( $lacost == 1){
                        echo "Received";
                    }else{
                        echo "Not Received";
                    }
                    ?>
                </p>
            </div>
        </div>
        <br><br><br>
        <div>
            <div style=" float: left; text-align: justify">
                <p class="lead">...........................</p>
                <p class="lead">Student Signature</p>
            </div>
            <div style="margin-left: 70px; float: right; text-align: justify">
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
                <!--            <p class="lead">Supervisor's Signature</p>-->
            </div>
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

