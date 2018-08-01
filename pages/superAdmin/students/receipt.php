<?php
	require_once('../../../validation/db_Connection.php');
		include '../../../includes/superAdmin/header.inc.php';
	
	$maxSql = "SELECT MAX(duesAmt) as maximum FROM preferences";
	$maxStmt = $connection->prepare($maxSql);
	$maxStmt->execute();
	
	$maxRow = $maxStmt->fetch(PDO::FETCH_ASSOC);
	$maximum = $maxRow['maximum'];

?>
<div class="container" >
	<div class="row">
		<div class="col-md-12 text-right mt-md-5">
			<a role="button" href="../students/allStudents.php" class="btn btn-warning">Go back</a>
			<button id="btn-print" onclick="printDiv()" class="btn btn-info">Print</button>
		</div>
	</div>
</div>
<div class="container" id="receiptDiv" style="font-family: arial, sans-serif">
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
                if( $_SESSION['lacost'] == 1){
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
                if( $_SESSION['lacost'] == 1){
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
