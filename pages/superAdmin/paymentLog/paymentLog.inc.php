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
                <h3 class="text-themecolor m-b-0 m-t-0">Payment Log</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/dashboard.superAdmin.php">Home</a></li>
                    <li class="breadcrumb-item active">Payment Log</li>
                </ol>
            </div>
            <div class="col-md-9 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small class="lead">Total Payment Log</small></h6>
                            <h4 class="m-t-0 text-info">
                                <?php
                                include '../../../validation/db_Connection.php';

                                $sql= "SELECT COUNT(`payment_id`) as num FROM `payment_log`";

                                $stmt = $connection->prepare($sql);
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
                <div class="card">
                    <div class="card-body text-dark">
                        <div class="container-fluid">
                            <table class="tablesaw table-responsive-md table-hover table table-bordered"   id="paymentLogTable" data-tablesaw-mode="swipe">
                                <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col >#</th>
                                    <th scope="col" data-tablesaw-sortable-col >Name</th>
                                    <th scope="col" data-tablesaw-sortable-col >Index Number</th>
                                    <th scope="col" data-tablesaw-sortable-col >Class</th>
                                    <th scope="col" data-tablesaw-sortable-col >Dues Paid</th>
                                    <th scope="col" data-tablesaw-sortable-col >Receipt Number</th>
	                                <th scope="col" data-tablesaw-sortable-col >Payment Type</th>
                                    <th scope="col" data-tablesaw-sortable-col >Date Time</th>
	                                <th scope="col" data-tablesaw-sortable-col >User</th>
                                  <th scope="col" data-tablesaw-sortable-col >Print</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Student Modal -->

        <div class="modal fade" id="addNewStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> <i class="mdi mdi-school"></i> Add New Student(s)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="needs-validation" novalidate method="post" action="../../../validation/superAdmin/students/addNewStudent.php" id="addNewStudentForm">
                        <div class="modal-body">
                            <div class="form-row form-material">
                                <div class="col-md-4 mb-3">
                                    <label for="stdFirstName">First name</label>
                                    <input type="text" class="form-control" id="stdFirstName" name="stdFirstName" placeholder="First name" required>
                                    <div class="invalid-feedback">
                                        First Name is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="stdLastName">Last name</label>
                                    <input type="text" class="form-control " id="stdLastName" name="stdLastName" placeholder="Last name" required>
                                    <div class="invalid-feedback">
                                        Last Name is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="stdOtherName">Other Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-line" id="stdOtherName" name="stdOtherName" placeholder="Othername">
                                        <div class="invalid-feedback">
                                            Othername is required
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-material">
                                <div class="col-md-4 mb-3">
                                    <label for="stdIndexNumber">Index Number</label>
                                    <input type="text" class="form-control" id="stdIndexNumber" name="stdIndexNumber" placeholder="Index Number" maxlength="8" minlength="8" required>
                                    <div class="invalid-feedback">
                                        Index Number is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="stdClass">Class</label>
                                    <select id="stdClass" name="stdClass" class="custom-select form-control" required>
                                        <option value="">Select Class</option>
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
                                <div class="col-md-4 mb-3">
                                    <label for="stdLacost">Lacost</label>
                                    <select id="stdLacost" name="stdLacost" class="custom-select form-control" required>
                                        <option value="">Select</option>
                                        <option value="1">Recieved</option>
                                        <option value="2">Not Recieved</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                            </div>

                            <div class="form-row form-material">
                                <div class="col-md-5 mb-3">
                                    <label for="stdPhoneNumber">Phone</label>
                                    <input type="number" class="form-control" id="stdPhoneNumber" name="stdPhoneNumber" placeholder="Phone Number" maxlength="10" minlength="10" required>
                                    <div class="invalid-feedback">
                                        Phone Number is required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add new Student Modal -->


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
                        <table class="tablesaw table-responsive table-hover table table-bordered" width="100%" cellspacing="0"  id="stdTable" data-tablesaw-mode="swipe">
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col >Name</th>
                                <th scope="col" data-tablesaw-sortable-col >Index No.</th>
                                <th scope="col" data-tablesaw-sortable-col >Class</th>
                                <th scope="col" data-tablesaw-sortable-col >Dues</th>
                                <th scope="col" data-tablesaw-sortable-col >Lacost</th>
                                <th scope="col" data-tablesaw-sortable-col >Status</th>
                                <th scope="col" data-tablesaw-sortable-col >Date</th>
                                <th scope="col" data-tablesaw-sortable-col >Action</th>
                                <th scope="col" data-tablesaw-sortable-col >Payment</th>
                            </tr>
                            </thead>
                        </table>

                        <p class="text-danger" >Arrange the Table using the Format Above</p>
                        <small class="text-danger">only <strong>.csv</strong> files allowed</small>

                        <div class="card float-right ">
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
