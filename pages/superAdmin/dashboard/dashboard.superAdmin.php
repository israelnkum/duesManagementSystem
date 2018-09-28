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
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.superAdmin.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>


                <div class="col-md-9 col-4 align-self-center">
                    <div class="d-flex m-t-10 justify-content-end">
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0"><small class="text-uppercase">Today's Collection</small></h6>
                                <h4 class="m-t-0 text-info">
                                    <?php
                                    include '../../../validation/db_Connection.php';

                                    //$sql= "SELECT COUNT(`std_class`) as num FROM `students` WHERE std_class=:hndLeve100";
                                    $sql = "SELECT SUM(`amount_paid`) as amt FROM payment_log WHERE currentUser =:currentUser AND DATE(datePaid)= :datePaid";

                                    $stmt = $connection->prepare($sql);
                                    $stmt->bindValue(':currentUser', $_SESSION['u_name']);
                                    $stmt->bindValue(':datePaid', date('Y-m-d'));
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    echo $row['amt'];
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

            <!-- Row -->

            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Total Students</h3>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 text-right">
                                    <h5 class="font-light text-white">
                                        <?php
                                        include '../../../validation/db_Connection.php';

                                        $sql= "SELECT COUNT(std_id) as num FROM `students`";

                                        $stmt = $connection->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                        echo $row['num'];
                                        ?>
                                    </h5>

                                    <h6 class="font-weight-light text-white">Updated Now</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->

                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Total Dues Paid</h3>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 text-right">
                                    <h5 class="font-light text-white">

                                        <?php
                                        include '../../../validation/db_Connection.php';

                                        $sql= "SELECT SUM(`amount_paid`) as num FROM `students`";

                                        $stmt = $connection->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                        echo $row['num'];
                                        ?>
                                    </h5>

                                    <h6 class="font-weight-light text-white">Updated Now</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-warning">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Total Dues </h3>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 text-right">
                                    <h5 class="font-light text-white">
                                        <?php
                                        include '../../../validation/db_Connection.php';

                                        $sql= "SELECT COUNT(std_id) as num FROM `students`";

                                        $stmt = $connection->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	                                        $sql1 = "SELECT MAX(duesAmt) as maximum FROM preferences";
	                                        $stmt1 = $connection->prepare($sql1);
	                                        //$stmt->bindValue(':student_id',$student_id);
	                                        $stmt1->execute();
	
	                                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	                                        $maximum = $row1['maximum'];
                                        echo $row['num']*=$maximum;
                                        ?>
                                    </h5>

                                    <h6 class="font-weight-light text-white">Updated Now</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-info">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                <div>
                                    <h3 class="card-title">All Users</h3>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 text-right">
                                    <h4 class="font-light text-white">
	                                    <?php
		                                    include '../../../validation/db_Connection.php';
		
		                                    $sql= "SELECT COUNT(`user_id`) as num FROM `users`";
		
		                                    $stmt = $connection->prepare($sql);
		                                    $stmt->execute();
		                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		                                    echo $row['num'];
	                                    ?>
                                    </h4>

                                    <h6 class="font-weight-light text-white">Updated Now</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card blog-widget">
                        <div class="card-body">
                            <div class="blog-image"><img src="../../../assets/img/22.jpg" alt="img" class="img-responsive" /></div>
                            <h3>Information Technology Student Union</h3>
                            
                            <div class="d-flex">
                                <div class="text-center">
	                                Innovation Via Technology
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div >
                                    <h3 class="card-title">Users Online</h3>
                                    <h6 class="card-subtitle">Current Users Logged in And Their Login Time</h6>
                                </div>
                            </div>
                            <table class="tablesaw table-responsive-md table-hover table text-dark" id="onlineUsersTable" width="100%" cellspacing="0"  data-tablesaw-mode="swipe">
                                <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col >#</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Username</th>
	                                <th scope="col" data-tablesaw-sortable-col >Full Name</th>
                                    <th scope="col" data-tablesaw-sortable-col >Email</th>
                                    <th scope="col" data-tablesaw-sortable-col >User type</th>
                                    <th scope="col" data-tablesaw-sortable-col >Login time</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
</div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
 <?php
include "../../../includes/superAdmin/footer.inc.php";
?>