<?php
	include '../../../includes/superAdmin/header.inc.php';

	require_once('../../../validation/db_Connection.php');
	if(isset($_POST['btn_reversePayment'])){
		$student_id= $_POST['std_id'];
		$sql = "SELECT * FROM students WHERE  std_id = :student_id";
		$stmt = $connection->prepare($sql);
		$stmt->bindValue(':student_id',$student_id);
		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['std_id']=$row['std_id'];
			$_SESSION['firstName']=$row['firstName'];
			$_SESSION['lastName']=$row['lastName'];
			$_SESSION['otherName']=$row['otherName'];
			$_SESSION['std_class']=$row['std_class'];
			$_SESSION['index_number']=$row['index_number'];
			$_SESSION['phone']=$row['phone'];

		}

	}
?>
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" ></circle>
		</svg>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
<?php
	include "../../../includes/superAdmin/topNavs.inc.php";
?>
	<!-- ============================================================== -->
	<!-- End Topbar header -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
<?php
	include '../../../includes/superAdmin/downNavs.inc.php';
?>
	<!-- ============================================================== -->
	<!-- End Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-3 col-8 align-self-center">
				<h3 class="text-themecolor m-b-0 m-t-0">All Student(s)</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../dashboard/dashboard.superAdmin.php">Home</a></li>
					<li class="breadcrumb-item active">Reverse Payment</li>
				</ol>
			</div>



			<div class="col-md-9 col-4 align-self-center">
				<div class="d-flex m-t-10 justify-content-end">
					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>HND LEVEL 100</small></h6>
							<h4 class="m-t-0 text-info">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:hndLeve100";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':hndLeve100', 'HND LEVEL 100');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>
					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>HND LEVEL 200</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:hndLeve200";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':hndLeve200', 'HND LEVEL 200');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>HND LEVEL 300</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:hndLeve300";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':hndLeve300', 'HND LEVEL 300');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>DIPLOMA LEVEL 100</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:diplomaLevel100";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':diplomaLevel100', 'DIPLOMA LEVEL 100');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>DIPLOMA LEVEL 200</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:diplomaLevel200";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':diplomaLevel200', 'DIPLOMA LEVEL 200');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>BTECH LEVEL 100</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:btechLevel100";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':btechLevel100', 'BTECH LEVEL 100');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>BTECH LEVEL 200</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:btechLevel200";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':btechLevel200', 'BTECH LEVEL 200');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>
					<div class="">
						<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->

		<div class="row">
			<div class="col-md-12">
				<?php if (isset($_GET['student_update_success'])) { ?>
					<div class="alert alert-success alert-dismissable col-sm-12 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_GET['student_update_success'];?>
					</div>
				<?php } ?>

				<?php if (isset($_GET['student_update_error'])) { ?>
					<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_GET['student_update_error'];?>
					</div>
				<?php } ?>

				<div class="card">
					<div class="card-body text-dark">
						<div class="container">
							<h5>All Payment by<span class="text-danger"> <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']." ".$_SESSION['otherName'] ?></span></h5>
							<table class="table table-responsive-md table-bordered table-hover"   id="reverseTable" data-tablesaw-mode="swipe">
								<thead>
								<tr>
									<th scope="col" data-tablesaw-sortable-col >#</th>
									<th scope="col" data-tablesaw-sortable-col >Dues Paid</th>
<!--									<th scope="col" data-tablesaw-sortable-col >Lacost</th>-->
									<th scope="col" data-tablesaw-sortable-col >Ref. Number</th>
									<th scope="col" data-tablesaw-sortable-col >Date Time</th>
									<th scope="col" data-tablesaw-sortable-col >Payment Type</th>
									<th scope="col" data-tablesaw-sortable-col >Action</th>
								</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
<?php
	include "../../../includes/superAdmin/footer.inc.php";
?>
