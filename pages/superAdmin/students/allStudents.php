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
<!--					<div class="">-->
<!--						<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>-->
<!--					</div>-->
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
				
				
				<?php if (isset($_GET['lacost_error'])) { ?>
					<div class="alert alert-success alert-dismissable col-sm-12 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_GET['lacost_error'];?>
					</div>
				<?php } ?>
				<?php if (isset($_GET['lacost'])) { ?>
					<div class="alert alert-success alert-dismissable col-sm-12 text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_GET['lacost'];?>
					</div>
				<?php } ?>
				
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
							<table class="tablesaw table-responsive-md table-hover table table-bordered"   id="stdTable" data-tablesaw-mode="swipe">
								<thead>
								<tr>
									<th scope="col" data-tablesaw-sortable-col >#</th>
									<th scope="col" data-tablesaw-sortable-col >Name</th>
									<th scope="col" data-tablesaw-sortable-col >Index Number</th>
									<th scope="col" data-tablesaw-sortable-col >Class</th>
									<th scope="col" data-tablesaw-sortable-col >Dues Paid</th>
									<th scope="col" data-tablesaw-sortable-col >Lacost</th>
									<th scope="col" data-tablesaw-sortable-col >Status</th>
									<th scope="col" data-tablesaw-sortable-col >Phone</th>
									<th scope="col" data-tablesaw-sortable-col >Action</th>
									<th scope="col" data-tablesaw-sortable-col >Payment</th>
								</tr>
								</thead>
							
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		<!-- Upload Sudent Modal -->
		<div class="modal fade" id="uploadStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"> <i class="mdi mdi-upload"></i> UploadUser(s)</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
						
						<p class="text-danger" >Arrange the Table using the Format Above</p>
						<small class="text-danger">only <strong>.csv</strong> files allowed</small>
						
						<div class="card float-right ">
							<table class="tablesaw table-responsive table-hover table table-bordered" width="100%" cellspacing="0"  id="stdTable" data-tablesaw-mode="swipe">
								<thead>
								<tr>
									<!--	                                `firstName`, `lastName`, `otherName`, `index_number`, `class`, `lacost`, `amount_paid`, `payment_status`, `phone-->
									<th scope="col" data-tablesaw-sortable-col >First Name</th>
									<th scope="col" data-tablesaw-sortable-col >Last Name</th>
									<th scope="col" data-tablesaw-sortable-col >otherName</th>
									<th scope="col" data-tablesaw-sortable-col >Index Number</th>
									<th scope="col" data-tablesaw-sortable-col >Class</th>
									<th scope="col" data-tablesaw-sortable-col >Lacost</th>
									<th scope="col" data-tablesaw-sortable-col >Phone number</th>
								</tr>
								</thead>
							</table>
							<div class="card-header-pills bg-primary text-center text-white " style="border-radius: 20px; width: 200px; box-shadow: #17a2b8">
								Browse to Select File
							</div>
							<div class="card-body" style="border-style: none;">
								<form enctype="multipart/form-data" class="form-material">
									<input type="file">
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" >Upload</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Upload Student Modal -->
		
		
		
		
		
		
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
<?php
	include "../../../includes/superAdmin/footer.inc.php";
?>