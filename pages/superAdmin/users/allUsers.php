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
                        <li class="breadcrumb-item active">All Users(s)</li>
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
					                    $stmt ->bindValue(':user_type','Super Admin');
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

<!--                        <div class="">-->
<!--                            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-success alert-dismissable col-sm-12 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $_GET['msg'];?>
                </div>
            <?php } ?>
            <a name="addNewUserButton" id="addNewUserButton" style="margin: 2px;" href="addNewUser.php" class="btn btn-sm pull-right btn-primary waves-effect waves-light">
                <i class="ti-plus"></i> Add User
            </a>

            <hr>
	        <?php if (isset($_GET['user_update_success'])) { ?>
		        <div class="alert alert-success alert-dismissable col-sm-12 text-center">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <?php echo $_GET['user_update_success'];?>
		        </div>
	        <?php } ?>

	        <?php if (isset($_GET['user_update_error'])) { ?>
		        <div class="alert alert-danger alert-dismissable col-sm-12 text-center">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <?php echo $_GET['user_update_error'];?>
		        </div>
	        <?php } ?>
	
	        <?php if (isset($_GET['reset'])) { ?>
		        <div class="alert alert-success alert-dismissable col-sm-12 text-center">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <?php echo $_GET['reset'];?>
		        </div>
	        <?php } ?>
	
	        <?php if (isset($_GET['reseterror'])) { ?>
		        <div class="alert alert-success alert-dismissable col-sm-12 text-center">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <?php echo $_GET['reseterror'];?>
		        </div>
	        <?php } ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-dark">
                                <table class="table table-responsive-md table-hover" id="usersTable" width="100%" cellspacing="0"  data-tablesaw-mode="swipe">
                                    <thead>
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col >#</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Username</th>
                                        <th scope="col" data-tablesaw-sortable-col >First Name</th>
                                        <th scope="col" data-tablesaw-sortable-col >Last Name</th>
                                        <th scope="col" data-tablesaw-sortable-col >Email</th>
                                        <th scope="col" data-tablesaw-sortable-col >Phone</th>
                                        <th scope="col" data-tablesaw-sortable-col >User Type</th>
                                        <th scope="col" data-tablesaw-sortable-col >Action</th>
	                                    <th scope="col" data-tablesaw-sortable-col >Reset Password</th>

                                    </tr>
                                    </thead>

                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <div class="modal none-border" id="my-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Add New User Modal -->
            <div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> <i class="mdi mdi-account"></i> Add New User(s)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blog-widget blog-image">
                                        <div class="card-body" style="background: url('../../../assets/img/back.png') center center no-repeat">
                                            <div class="text-center  blog-image">
                                                <img class="el-card-avatar" style="border-radius: 50px;" src="../../../assets/img/profiledefault.png">
                                            </div>
                                            <form method="post" class="text-left" enctype="multipart/form-data" action="../../../validation/superAdmin/users/uploadUserProfileImage.php">
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control-file " id="imgFile" name="imgFile">
                                                    </div>
                                                </div>
                                                <button class="btn btn-success" name="btn_upload" id="btn_upload" type="submit">Upload</button>
                                                <button class="btn btn-danger" name="btn_remove" id="btn_remove" type="submit">Remove</button>
                                            </form>
                                        </div> <!-- Card body -->
                                    </div><!-- card -->
                                </div><!-- col-md-4 -->

                                <div class="col-md-1">
                                </div>
                                <div class="col-md-7">
                                    <form id="addNewUserForm" name="addNewUserForm" method="post" action="../../../validation/superAdmin/users/addNewUser.php" class="needs-validation " novalidate>
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

                                        <div class="form-row form-material">
                                            <div class="col-md-6 mb-3">
                                                <label for="secQuestion">Security Question</label>
                                                <select id="secQuestion" name="secQuestion" class="custom-select form-control" required>
                                                    <option value="">Security Question</option>
                                                    <option value="What is your Mothers Maiden Name">What is your Mothers Maiden Name</option>
                                                    <option value="Who is your Best Freind">Who is your Best Freind</option>
                                                    <option value="What is the last 4 Digit of your Phone">What is the last 4 Digit of your Phone</option>
                                                    <option value="Who is The name of your best Teacher">Who is The name of your best Teacher</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Question is required
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="secAnswer">Answer</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="secAnswer" name="secAnswer" placeholder="Answer" required>
                                                    <div class="invalid-feedback">
                                                        Answer is required!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-6 mb-3">
                                                <label for="userType">User Type</label>
                                                <select id="userType" name="userType" class="custom-select form-control" required>
                                                    <option value="">User type</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="btn_addUser" id="btn_addUser" class="btn btn-primary">Add User</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- row -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Add new User Modal -->



            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
<?php
include "../../../includes/superAdmin/footer.inc.php";
?>
