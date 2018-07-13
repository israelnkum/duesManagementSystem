<?php
	
	include '../../../includes/superAdmin/header.inc.php';
	
	require_once('../../../validation/db_Connection.php');
	if(isset($_POST['btn_userId'])){
		$user_id = $_POST['student_id'];
		$sql = "SELECT * FROM students WHERE  std_id = :std_id";
		$stmt = $connection->prepare($sql);
		$stmt->bindValue(':std_id',$user_id);
		$stmt->execute();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['id']=$row['std_id'];
			$_SESSION['firstName']=$row['firstName'];
			$_SESSION['lastName']=$row['lastName'];
			$_SESSION['otherName']=$row['otherName'];
			$_SESSION['index_number']=$row['index_number'];
			$_SESSION['std_class']=$row['std_class'];
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
		<a style="margin: 2px;" href="uploadStudent.php" class="btn btn-sm pull-right btn-danger text-white waves-effect waves-light">
			<i class="ti-upload"></i> Upload
		</a>
		<button style="margin: 2px;" data-toggle="modal" data-target="#addNewStudentModal" id="addNewStudentBtn" class="btn btn-sm pull-right btn-primary waves-effect waves-light">
			<i class="ti-plus"></i> Add Student
		</button>
		
		<hr>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body text-dark">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-8 offset-md-2">
									
									<form class="needs-validation" novalidate method="post" action="../../../validation/superAdmin/students/editStudent.php" id="editStdForm">
										
										<input type="hidden" class="form-control" id="stds_id" name="stds_id" placeholder="First name" required value="<?php echo $_SESSION['id']?>">
										
										<div class="form-row form-material">
											<div class="col-md-4 mb-3">
												<label for="editStdFirstName">First name</label>
												<input type="text" class="form-control" id="editStdFirstName" name="editStdFirstName" placeholder="First name" required value="<?php echo $_SESSION['firstName']?>">
												<div class="invalid-feedback">
													First Name is required
												</div>
											</div>
											<div class="col-md-4 mb-3">
												<label for="editStdLastName">Last name</label>
												<input type="text" class="form-control " id="editStdLastName" name="editStdLastName" placeholder="Last name" required value="<?php echo $_SESSION['lastName']?>">
												<div class="invalid-feedback">
													Last Name is required
												</div>
											</div>
											<div class="col-md-4 mb-3">
												<label for="editStdOtherName">Other Name</label>
												<div class="input-group">
													<input type="text" class="form-control form-control-line" id="editStdOtherName" name="editStdOtherName" placeholder="Othername" value="<?php echo $_SESSION['otherName']?>">
													<div class="invalid-feedback">
														Othername is required
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-row form-material">
											<div class="col-md-4 mb-3">
												<label for="editStdIndexNumber">Index Number</label>
												<input type="text" class="form-control" id="editStdIndexNumber" name="editStdIndexNumber" placeholder="Index Number" maxlength="8" minlength="8" required value="<?php echo $_SESSION['index_number']?>">
												<div class="invalid-feedback">
													Index Number is required
												</div>
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="editStdPhoneNumber">Phone</label>
												<input type="number" class="form-control" id="editStdPhoneNumber" name="editStdPhoneNumber" placeholder="Phone Number" maxlength="10" minlength="10" required value="<?php echo $_SESSION['phone']?>">
												<div class="invalid-feedback">
													Phone Number is required
												</div>
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="editStdClass">Select Class</label>
												<select id="editStdClass" name="editStdClass" class="custom-select form-control text-uppercase" required>
													<option value="<?php echo $_SESSION['std_class']?>"><?php echo $_SESSION['std_class']?></option>
													<option value="HND Level 100">HND Level 100</option>
													<option value="HND Level 200">HND Level 200</option>
													<option value="HND Level 300">HND Level 300</option>
													<option value="Diploma Level 100">Diploma Level 100</option>
													<option value="Diploma Level 200">Diploma Level 200</option>
													<option value="BTECH Level 100">BTECH Level 100</option>
													<option value="BTECH Level 200">BTECH Level 200</option>
												</select>
												<div class="invalid-feedback">
													Class is required
												</div>
											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</form>
								</div>
							</div>
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