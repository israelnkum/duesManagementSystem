<?php
	include '../../../includes/superAdmin/header.inc.php';

	require_once('../../../validation/db_Connection.php');
	if(isset($_POST['btn_makePayment'])){
		 $student_id= $_POST['student_id'];
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
			$_SESSION['amount_paid']=$row['amount_paid'];
			$_SESSION['lacost']=$row['lacost'];
		}

		if ($_SESSION['lacost']==1){
			$lac ="Received";
		}else{
			$lac ="Not Received";
		}

	}


	$sql = "SELECT MAX(duesAmt) as maximum FROM preferences";
	$stmt = $connection->prepare($sql);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$maximum = $row['maximum'];
	$limit = $maximum-$_SESSION['amount_paid'];
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
					<li class="breadcrumb-item active">All Student(s)</li>
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
						<div class="container-fluid">
							<form id="makePaymentForm" name="makePaymentForm" method="post" action="../../../validation/superAdmin/students/makePayment.php" class="needs-validation " novalidate>
								<div class="form-row form-material">
									<div class="col-md-4 mb-3">
<!--										<label for="fname">First name</label>-->
										<input type="hidden" class="form-control" id="fname" name="fname" placeholder="First name"  value="<?php echo $_SESSION['firstName']?>" required>
										<div class="invalid-feedback">
											First Name is required!
										</div>
									</div>
									<div class="col-md-4 mb-3">
<!--										<label for="lname">Last name</label>-->
										<input type="hidden" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?php echo $_SESSION['lastName']?>"  required>
										<div class="invalid-feedback">
											Last Name is required!
										</div>
									</div>
									<div class="col-md-4 mb-3">
<!--										<label for="otherName">Last name</label>-->
										<input type="hidden" class="form-control" id="otherName" name="otherName" placeholder="Last name" value="<?php echo $_SESSION['otherName']?>"  required>
										<div class="invalid-feedback">
											Last Name is required!
										</div>
									</div>
								</div>

								<div class="form-row form-material">
									<input type="hidden" class="form-control" id="std_id" name="std_id" value="<?php echo $_SESSION['std_id']?>" required>


									<div class="col-md-6 mb-3">
<!--										<label for="std_class">Class</label>-->
										<div class="input-group">
											<input type="hidden" class="form-control" id="std_class" name="std_class" value="<?php echo $_SESSION['std_class']?>" required>
											<div class="invalid-feedback">
												Class is required!
											</div>
										</div>
									</div>

									<div class="col-md-6 mb-3">
<!--										<label for="phone">Phone Number</label>-->
										<div class="input-group">
											<input type="hidden" class="form-control" id="phone" name="phone" placeholder="Phone Number"  minlength="10" maxlength="10" value="<?php echo $_SESSION['phone']?>" required>
											<div class="invalid-feedback">
												Phone Number is required!
											</div>
										</div>
									</div>

									<div class="form-row form-material">
										<?php

											if ($_SESSION['amount_paid']==$maximum && $_SESSION['lacost'] ==0){


												echo '
													<div class="row">
													<div class="col-md-8">
													<h1 class="display-4 text-capitalize" style="font-size:30px; font-weight: 200">Not oweing</h1>
													<h1 class=" text-capitalize" style="font-size: 30px; font-weight: 200">Lacost Not Received</h1>
													<a role="button" class="btn btn-warning" href="../students/allStudents.php">Go Back</a>
													</div>

													<form method="POST" action="../../../validation/superAdmin/students/makePayment.php">
														<div class="col-md-4 mb-3 mt-3">
															<label for="lacost">Lacost</label>
																<select id="lacost" name="lacost" class="custom-select form-control" readonly required>
																	<option value="">Select</option>
																	<option value="1">Received</option>
																	<option value="0">Not Received</option>
																</select>
																<div class="invalid-feedback">
																	This field is required
																</div>
																
																<button class="btn btn-sm btn-primary mt-2" type="submit" name="btn_issueLacost">Submit</button>
														</div>
													</form>
													</div>

												';
											}
											elseif ($_SESSION['amount_paid']==$maximum && $_SESSION['lacost'] ==1){

												echo '
													<div class="col-md-12">
													<h1 class="display-4 text-capitalize" style="font-size: 50px; font-weight: 500">Not oweing</h1>
													<a role="button" class="btn btn-warning" href="../students/allStudents.php">Go Back</a>
													</div>
												';
											}else{
												if ($_SESSION['amount_paid']>0){
													echo '
											<div class="col-md-4 mb-3">
													<label for="amtPaid">Amount Paid</label>
													<input type="number" class="form-control" id="amtPaid" name="amtPaid"  readonly value="'.$_SESSION['amount_paid'].'">

												</div>
												<div class="col-md-4 mb-3">
													<label for="amtPaying">Amount</label>
													<input type="number" class="form-control" id="amtPaying" name="amtPaying" placeholder="Amount Paying"  min="1" max="'.$limit.'" required >
													<div class="invalid-feedback">
														Amount is invalid
													</div>
												</div>

											';
												}else{
													echo '
												<div class="col-md-4 mb-3">
													<label for="amtPaying">Amount</label>
													<input type="number" class="form-control" id="amtPaying" name="amtPaying" placeholder="Amount Paying"  min="1" max="'.$maximum.'" required>
													<div class="invalid-feedback">
														Amount is invalid
													</div>
												</div>

											';
												}

										echo '
												

												<div class="col-md-4 mb-3">
												<label for="lacost">Lacost</label>
												<select id="lacost" name="lacost" class="custom-select form-control" readonly required>
													<option value="'.$_SESSION['lacost'].'">'. $lac. '</option>
													<option value="1">Received</option>
													<option value="0">Not Received</option>
												</select>
												<div class="invalid-feedback">
													This field is required
												</div>
									</div>



									</div>

								</div>
								<div class="text-right">
									<a role="button" class="btn btn-danger" href="../students/allStudents.php">Cancel</a>
									<button type="submit" name="makePaymentBtn" id="makePaymentBtn" class="btn btn-primary">Make Payment</button>
								</div>
											';
											}



										?>


							</form>
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
