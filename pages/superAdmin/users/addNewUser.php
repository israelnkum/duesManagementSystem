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
				<h3 class="text-themecolor m-b-0 m-t-0">All Users(s)</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../dashboard/dashboard.superAdmin.php">Home</a></li>
					<li class="breadcrumb-item active">Add Users(s)</li>
				</ol>
			</div>
			<div class="col-md-9 col-4 align-self-center">
				<div class="d-flex m-t-10 justify-content-end">
					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>All Users</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';
									$sql= "SELECT COUNT(`user_id`) as num FROM `users`";
									$stmt = $connection->prepare($sql);
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>
							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>Online</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`user_id`) as num FROM `users` WHERE user_id=:user_id";

									$stmt = $connection->prepare($sql);
									$stmt ->bindValue(':user_id',$_SESSION['u_id']);
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




		<a name="addNewUserButton" id="addNewUserButton" style="margin: 2px;" href="allUsers.php" class="btn btn-sm pull-right btn-primary waves-effect waves-light">
			<i class="ti-user"></i> All Users
		</a>

		<hr>
		<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['success'];?>
			</div>
		<?php } ?>


		<!-- Error adding user -->
		<?php if (isset($_GET['user_error'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['user_error'];?>
			</div>
		<?php } ?>

		<!-- File size too large -->
		<?php if (isset($_GET['filesize'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['filesize'];?>
			</div>
		<?php } ?>


		<!-- error uploading image -->
		<?php if (isset($_GET['err'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['err'];?>
			</div>
		<?php } ?>

		<!-- Not jpeg or jpg file -->
		<?php if (isset($_GET['fileType'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['fileType'];?>
			</div>
		<?php } ?>

		<!-- Useraname is already taken -->
		<?php if (isset($_GET['username'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['username'];?>
			</div>
		<?php } ?>

		<!-- Email is aready taken -->
		<?php if (isset($_GET['usermail'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['usermail'];?>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body text-dark">
						<form method="post" enctype="multipart/form-data" action="../../../validation/superAdmin/users/addNewUser.php" class="needs-validation form-material" novalidate>
							<div class="form-row form-material">
								<div class="col-md-6 mb-3">
									<label for="userName">Username</label>
									<div class="input-group">
										<input type="text" class="form-control" id="userName" name="userName" placeholder="Username" aria-describedby="inputGroupPrepend" required>
										<div class="invalid-feedback">
											Username is required!
										</div>
									</div>
								</div>

								<div class="col-md-6 mb-3">
									<label for="userMail">Email</label>
									<div class="input-group">
										<input type="email" class="form-control" id="userMail" name="userMail" placeholder="Email" required>
										<div class="invalid-feedback">
											Email is required!
										</div>
									</div>
								</div>
							</div>

							<div class="form-row form-material">
								<div class="col-md-6 mb-3">
									<label for="firstName">First name</label>
									<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" required>
									<div class="invalid-feedback">
										First Name is required!
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="lastName">Last name</label>
									<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name"  required>
									<div class="invalid-feedback">
										Last Name is required!
									</div>
								</div>
							</div>

<!--							<div class="form-row form-material">-->
<!--								<div class="col-md-6 mb-3">-->
<!--									<label for="secQuestion">Security Question</label>-->
<!--									<select id="secQuestion" name="secQuestion" class="custom-select form-control" required>-->
<!--										<option value="">Security Question</option>-->
<!--										<option value="What is your Mothers Maiden Name">What is your Mothers Maiden Name</option>-->
<!--										<option value="Who is your Best Freind">Who is your Best Freind</option>-->
<!--										<option value="What is the last 4 Digit of your Phone">What is the last 4 Digit of your Phone</option>-->
<!--										<option value="Who is The name of your best Teacher">Who is The name of your best Teacher</option>-->
<!--									</select>-->
<!--									<div class="invalid-feedback">-->
<!--										Question is required-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-6 mb-3">-->
<!--									<label for="secAnswer">Answer</label>-->
<!--									<div class="input-group">-->
<!--										<input type="text" class="form-control" id="secAnswer" name="secAnswer" placeholder="Answer" required>-->
<!--										<div class="invalid-feedback">-->
<!--											Answer is required!-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->

							<div class="form-row form-material">
								<div class="col-md-6 mb-3">
									<label for="userType">User Type</label>
									<select id="userType" name="userType" class="custom-select form-control" required>
										<option value="">User type</option>
										<option value="Super Admin">Super Admin</option>
										<option value="Admin">Admin</option>
									</select>
									<div class="invalid-feedback">
										User type is required
									</div>
								</div>

								<div class="col-md-6 mb-3">
									<label for="phoneNumber">Phone Number</label>
									<div class="input-group">
										<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" minlength="10" maxlength="10" required>
										<div class="invalid-feedback">
											Phone Number is required!
										</div>
									</div>
								</div>
							</div>

							<div class="form-row form-material">
								<div class="form-group ">
									<label class="text-primary" for="imgFile">Picture</label>
									<input type="file" name="imgFile" id="imgFile" class="form-control file" required>
									<div class="invalid-feedback">
										Picture is required
									</div>
								</div>
							</div>
							<div class="form-row form-material">
								<div class="text-right col-md-6 mb-3 offset-md-6">
									<button class="btn btn-primary " name="btn_uploadImage" type="submit">Submit</button>
								</div>
							</div>
						</form>

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
