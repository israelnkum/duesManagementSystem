<?php
	include '../../../includes/superAdmin/header.inc.php';

	require_once('../../../validation/db_Connection.php');
	if(isset($_POST['btn_current_user'])){
		$user_id = $_POST['current_user'];
		$sql = "SELECT * FROM users WHERE  user_id = :user_id";
		$stmt = $connection->prepare($sql);
		$stmt->bindValue(':user_id',$user_id);
		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			$_SESSION['firstName']=$row['firstName'];
			$_SESSION['lastName']=$row['lastName'];
			$_SESSION['email']=$row['email'];
			$_SESSION['user_type']=$row['user_type'];
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
				<h3 class="text-themecolor m-b-0 m-t-0">Users</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../dashboard/dashboard.superAdmin.php">Home</a></li>
					<li class="breadcrumb-item active">Update Info</li>
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
							<h6 class="m-b-0"><small>Super Admin(s)</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`user_id`) as num FROM `users` WHERE user_type =:user_type";

									$stmt = $connection->prepare($sql);
									$stmt ->bindValue(':user_type','Admin');
									$stmt->execute();
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									echo $row['num'];
								?>

							</h4>
						</div>
					</div>

					<div class="d-flex m-r-20 m-l-10 hidden-md-down">
						<div class="chart-text m-r-10">
							<h6 class="m-b-0"><small>Admin(s)</small></h6>
							<h4 class="m-t-0 text-primary">
								<?php
									include '../../../validation/db_Connection.php';

									$sql= "SELECT COUNT(`user_id`) as num FROM `users` WHERE user_type =:user_type";

									$stmt = $connection->prepare($sql);
									$stmt ->bindValue(':user_type','Admin');
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

		<hr>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body text-dark">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-4">
									<div class="blog-widget blog-image">
										<div class="card-body" style="background: url('../../../assets/img/back.png') center center no-repeat">

											<?php
												include '../../../validation/db_Connection.php';
												$sql= "SELECT * FROM `users` WHERE user_id=:user_id";

												$stmt = $connection->prepare($sql);
												$stmt->bindValue(':user_id', $_SESSION['user_id']);
												$stmt->execute();
												while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

													if ($row['profileImg'] == '1'){
														echo "
											<div class='text-center  blog-image'>
												<img class='el-card-avatar rounded-circle' style='height: 150px; width: 150px;' src='../../../assets/img/uploads/profile".$_SESSION['username'].".jpg?'".mt_rand().">
											</div>
											<form method='post' class='text-left' enctype='multipart/form-data' action='../../../validation/superAdmin/users/deleteProfileImage.php'>
												<div class='col-md-12 '>
													<div class='form-group '>
														<input type='file' class='btn btn-outline-secondary form-control-file'  name='file'>
													</div>
												</div>
												<div class='text-center'>
												<button class='btn btn-success' name='btnUpload' id='btnUpload' type='submit'>Upload</button>
												<button class='btn btn-danger' name='deleteProfileImage' id='deleteProfileImage' type='submit'>Remove</button>
												</div>
											</form>
											";
													}else{
														echo "

												<div class='text-center  blog-image'>
												<img class='el-card-avatar rounded-circle' style='height: auto; width: 150px;' src='../../../assets/img/uploads/profiledefault.png'>
											</div>
											<form method='post' class='text-left' enctype='multipart/form-data' action='../../../validation/superAdmin/users/deleteProfileImage.php'>
												<div class='col-md-12 '>
													<div class='form-group'>
														<input type='file' class='form-control-file'  name='file'>
													</div>
												</div>
												<button class='btn btn-success' name='btnUpload' id='btnUpload' type='submit'>Upload</button>
												<button class='btn btn-danger' name='deleteProfileImage' id='deleteProfileImage' type='submit'>Remove</button>
											</form>
											";
													}
												}


											?>


										</div> <!-- Card body -->
									</div><!-- card -->
								</div>
								<div class="col-md-8">
									<form id="editUserForm" name="editUserForm" method="post" action="../../../validation/superAdmin/users/profileUpdate.php" class="needs-validation " novalidate>
										<div class="form-row form-material">
											<div class="col-md-6 mb-3">

												<input type="hidden" class="form-control" id="u_id" name="u_id" placeholder="Username" aria-describedby="inputGroupPrepend" required value="<?php echo $_SESSION['u_id']?>">

												<label for="editUsername">Username</label>
												<div class="input-group">
													<input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" value="<?php echo $_SESSION['username']?>" required>
													<div class="invalid-feedback">
														Username is required!
													</div>
												</div>
											</div>

											<div class="col-md-6 mb-3">
												<label for="editUserMail">Email</label>
												<div class="input-group">
													<input type="email" class="form-control" id="editUserMail" name="editUserMail" placeholder="Email" value="<?php echo $_SESSION['email']?>" required>
													<div class="invalid-feedback">
														Email is required!
													</div>
												</div>
											</div>
										</div>

										<div class="form-row form-material">
											<div class="col-md-6 mb-3">
												<label for="editFirstName">First name</label>
												<input type="text" class="form-control" id="editFirstName" name="editFirstName" placeholder="First name"  value="<?php echo $_SESSION['firstName']?>" required>
												<div class="invalid-feedback">
													First Name is required!
												</div>
											</div>
											<div class="col-md-6 mb-3">
												<label for="editLastName">Last name</label>
												<input type="text" class="form-control" id="editLastName" name="editLastName" placeholder="Last name" value="<?php echo $_SESSION['lastName']?>"  required>
												<div class="invalid-feedback">
													Last Name is required!
												</div>
											</div>
										</div>

										<div class="form-row form-material">
											<div class="col-md-6 mb-3">
												<label for="editUserType">User Type</label>
												<select id="editUserType" name="editUserType" class="custom-select form-control"  required>
													<option value="<?php echo $_SESSION['user_type']?>"><?php echo $_SESSION['user_type']?></option>
													<option value="Admin">Admin</option>
													<option value="User">User</option>
												</select>
												<div class="invalid-feedback">
													User type is required
												</div>
											</div>

											<div class="col-md-6 mb-3">
												<label for="editPhoneNumber">Phone Number</label>
												<div class="input-group">
													<input type="text" class="form-control" id="editPhoneNumber" name="editPhoneNumber" placeholder="Phone Number"  minlength="10" maxlength="10" value="<?php echo $_SESSION['phone']?>" required>
													<div class="invalid-feedback">
														Phone Number is required!
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" name="btn_profileUpdate" id="btn_profileUpdate" class="btn btn-primary">Update</button>
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
