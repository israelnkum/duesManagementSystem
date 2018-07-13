

<?php
	
	include '../../../includes/superAdmin/header.inc.php';
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
			include "uploadStudent.code.php";
			$uploadStudent = new uploadStudent();
			if (isset($_POST['btn_uploadStudent'])) {
				$fileName =$_FILES['file']['name'];
				$fileExt = explode('.',$fileName);
				$fileAcutalExt = strtolower(end($fileExt));
				
				$allowed = array('csv');
				
				if (!in_array($fileAcutalExt, $allowed)){
					?>
					<script type="text/javascript">
                        window.location.assign("http://localhost/projectAshonFinalWork/pages/superAdmin/students/uploadStudent.php?fileTypeError=".concat("Please Select a .csv File"));
					</script>
					<?php
				}else{
					$uploadStudent->import($_FILES['file']['tmp_name']);
				}
			}
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
							</h4></div>
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
							<table class="tablesaw table-responsive table-hover table table-bordered" width="100%" cellspacing="0" data-tablesaw-mode="swipe">
								<thead>
								<tr>
									<!--	                                `firstName`, `lastName`, `otherName`, `index_number`, `class`, `lacost`, `amount_paid`, `payment_status`, `phone-->
									<th scope="col" data-tablesaw-sortable-col >First Name</th>
									<th scope="col" data-tablesaw-sortable-col >Last Name</th>
									<th scope="col" data-tablesaw-sortable-col >otherName</th>
									<th scope="col" data-tablesaw-sortable-col >Index Number</th>
									<th scope="col" data-tablesaw-sortable-col >Class</th>
									<th scope="col" data-tablesaw-sortable-col >Phone number</th>
								</tr>
								</thead>
							</table>
						</div>
						
						<div class="row">
							<div class="col-sm-5">
								<p class="text-danger" >Arrange the Table using the Format Above </p>
								<small class="lead text-danger">only <strong>.csv</strong> files allowed</small>
							
							</div>
							<div class="col-sm-7">
								<div class="card-title bg-primary text-center text-white " style="border-radius: 20px; width: 200px; box-shadow: #17a2b8">
									Browse to Select File
								</div>
								<div class="card-body" style="border-style: none;">
									<form enctype="multipart/form-data" action="uploadStudent.php" method="post">
										<div class="form-group m-t-30">
											<input type="file" name="file" id="file" class="form-control-file">
										</div>
										
										<div class="form-material">
											<button class="btn btn-danger" name="btn_remove" id="btn_remove">Remove</button>
											<button class="btn btn-success" type="submit" name="btn_uploadStudent" id="btn_uploadStudent">Upload</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php if (isset($_GET['fileTypeError'])) { ?>
							<div class="alert alert-danger alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $_GET['fileTypeError'];?>
							</div>
						<?php }?>
						
						<?php if (isset($_GET['file_uploadSuccess'])) { ?>
							<div class="alert alert-success alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $_GET['file_uploadSuccess'];?>
							</div>
						<?php }?>
						
						
						<?php if (isset($_GET['file_not_uploaded'])) { ?>
							<div class="alert alert-danger alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $_GET['file_not_uploaded'];?>
							</div>
						<?php }?>
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add New Student Modal -->
		
<!--		<div class="modal fade" id="addNewStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
<!--			<div class="modal-dialog modal-dialog-centered" role="document">-->
<!--				<div class="modal-content ">-->
<!--					<div class="modal-header">-->
<!--						<h5 class="modal-title" id="exampleModalLongTitle"> <i class="mdi mdi-school"></i> Add New Student(s)</h5>-->
<!--						<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--							<span aria-hidden="true">&times;</span>-->
<!--						</button>-->
<!--					</div>-->
<!--					<form class="needs-validation" novalidate method="post" action="../../../validation/admin/students/addNewStudent.php" id="addNewStudentForm">-->
<!--						<div class="modal-body">-->
<!--							<div class="form-row form-material">-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdFirstName">First name</label>-->
<!--									<input type="text" class="form-control" id="stdFirstName" name="stdFirstName" placeholder="First name" required>-->
<!--									<div class="invalid-feedback">-->
<!--										First Name is required-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdLastName">Last name</label>-->
<!--									<input type="text" class="form-control " id="stdLastName" name="stdLastName" placeholder="Last name" required>-->
<!--									<div class="invalid-feedback">-->
<!--										Last Name is required-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdOtherName">Other Name</label>-->
<!--									<div class="input-group">-->
<!--										<input type="text" class="form-control form-control-line" id="stdOtherName" name="stdOtherName" placeholder="Othername">-->
<!--										<div class="invalid-feedback">-->
<!--											Othername is required-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="form-row form-material">-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdIndexNumber">Index Number</label>-->
<!--									<input type="text" class="form-control" id="stdIndexNumber" name="stdIndexNumber" placeholder="Index Number" maxlength="8" minlength="8" required>-->
<!--									<div class="invalid-feedback">-->
<!--										Index Number is required-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdClass">Class</label>-->
<!--									<select id="stdClass" name="stdClass" class="custom-select form-control" required>-->
<!--										<option value="">Select Class</option>-->
<!--										<option value="HND Level 100">HND Level 100</option>-->
<!--										<option value="HND Level 200">HND Level 200</option>-->
<!--										<option value="HND Level 300">HND Level 300</option>-->
<!--										<option value="Diploma Level 100">Diploma Level 100</option>-->
<!--										<option value="Diploma Level 200">Diploma Level 200</option>-->
<!--										<option value="BTECH Level 100">BTECH Level 100</option>-->
<!--										<option value="BTECH Level 200">BTECH Level 200</option>-->
<!--									</select>-->
<!--									<div class="invalid-feedback">-->
<!--										Class is required-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-4 mb-3">-->
<!--									<label for="stdLacost">Lacost</label>-->
<!--									<select id="stdLacost" name="stdLacost" class="custom-select form-control" required>-->
<!--										<option value="">Select</option>-->
<!--										<option value="1">Recieved</option>-->
<!--										<option value="2">Not Recieved</option>-->
<!--									</select>-->
<!--									<div class="invalid-feedback">-->
<!--										This field is required-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="form-row form-material">-->
<!--								<div class="col-md-5 mb-3">-->
<!--									<label for="stdPhoneNumber">Phone</label>-->
<!--									<input type="number" class="form-control" id="stdPhoneNumber" name="stdPhoneNumber" placeholder="Phone Number" maxlength="10" minlength="10" required>-->
<!--									<div class="invalid-feedback">-->
<!--										Phone Number is required-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="modal-footer">-->
<!--							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--							<button type="submit" class="btn btn-primary">Add Student</button>-->
<!--						</div>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
		<!-- Add new Student Modal -->
		
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
<?php
	include "../../../includes/superAdmin/footer.inc.php";
?>