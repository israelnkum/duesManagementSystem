<div id="receiptDiv" style="display: none; ">
	<div style="text-align: center; align-items: center">
		<img src="../../../assets/img/header.jpg" style="height: 70px; " >
	</div>

	<div style="text-align: center">
		Takoradi Technical University<br>
		P.O. Box 256, Takoradi<br>
		Email: itsu@yahoo.com<br>
		<hr>
	</div>
	<div style="text-transform: uppercase; float: left">
		<p>Name: <span style="text-align: right"></span></p>
		<p>Index Number: <span>07162734</span></p>
		<p>Level: <span>HND level 200</span></p>
	</div>
	<div style="float: right">
		<p>Date: <span>2018-05-25</span></p>
		<p>Time: <span>17:02:3</span></p>
		<p>Ref. Number: <span>iTSU18052500001</span></p>
	</div>



	<br><br><br><br><br><br><br><br>
	<hr>
	<div style="text-transform: uppercase; float: left">
		<p class="lead">Amount(Figures)</p>
		<p class="lead">Amount in Words</p>
		<p class="lead">Arrears</p>
	</div>
	<div style="float: right">
		<p class="mt-2">
			<strong>
				<?php
					echo $_SESSION['amtPaying'];
				?>
			</strong>
		</p>
		<p class="mt-1">
			<strong>

			</strong>
		</p>
		<p class="mt-3">-</p>
	</div>
	<br><br><br><br><br><br><br><br>
	<hr>

	<div style="text-transform: uppercase; float: left">
		<p class="lead">Lacost</p>
	</div>
	<div style="float: right">
		<p class="lead">Received</p>
	</div>

	<hr>
	<br><br><br><br><br><br><br>
	<div style="text-transform: uppercase; float: left">
		<p class="lead mt-1">...........................</p>
		<p class="lead">Student Signature</p>
	</div>
	<div style="float: right">
		<p class="lead">................................</p>
		<p class="lead">Amos Appiah Nkum</p>
		<p class="lead">Supervisor's Signature</p>
	</div>
</div>


<!-- reverse payment modal -->
<div class="modal fade" id="reversePayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="reversePaymentForm" method="post" action="../../../validation/superAdmin/students/reversePayment.php">
			<div class="modal-body">
					      <!-- <label for="amtPaid">amt</label> -->
					      <input type="hidden" class="form-control" id="amtPaid" name="amtPaid">
					      <!-- <label for="std_id">std_id</label> -->
					      <input type="hidden" class="form-control" id="std_id" name="std_id">
					      <!-- <label for="amt_words">amt_word</label> -->
					      <input type="hidden" class="form-control" id="amt_words" name="amt_words">


Do you <span class="lead text-danger">really</span> want to reverse
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">NO</button>
				<button type="submit" id="bntConfirmReverse" class="btn btn-danger">YES</button>
			</div>
				</form>
		</div>
	</div>
</div><!--  revere payment modal -->


<!-- Delete student modal-->
<div class="modal fade" id="deleteStdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="myModalLabel"><i class="fa fa-trash"></i> Delete Student</h4>
            </div>
            <div class="modal-body">
                <h5 class="text-primary">Do You Really Want to Delete This Student</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
                <button  id="deleteStdBtn" type="button" class="btn btn-primary"> <i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</div><!-- Delete Students Modal -->


<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-danger" id="myModalLabel"><i class="fa fa-trash"></i> Delete User</h4>
			</div>
			<div class="modal-body">
				<h5 class="text-primary">Do You Really Want to Delete This User?</h5>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
				<button  id="deleteUsrBtn" type="button" class="btn btn-primary"> <i class="fa fa-trash"></i> Delete</button>
			</div>
		</div>
	</div>
</div><!-- Delete User Modal -->





<!-- edit user Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-account-edit"></i> Edit User Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="blog-widget blog-image">
							<div class="card-body" style="background: url('../../assets/img/back.png') center center no-repeat">

								<?php
									include '../../../validation/db_Connection.php';
									$sql= "SELECT * FROM `users` WHERE user_id=:user_id";

									$stmt = $connection->prepare($sql);
									$stmt->bindValue(':user_id', $_SESSION['u_id']);
									$stmt->execute();
									while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

										if ($row['profileImg'] == '1'){
											echo "
											<div class='text-center  blog-image'>
												<img class='el-card-avatar rounded-circle' style='height: auto; width: 150px;' src='../../../assets/img/uploads/profile".$_SESSION['u_name'].".jpg?'".mt_rand().">
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
					</div><!-- col-md-4 -->

					<div class="col-md-1">
					</div>
					<div class="col-md-7">
						<form id="editUserForm" name="editUserForm" method="post" action="../../../validation/admin/users/editUserInfo.php" class="needs-validation " novalidate>
							<div class="form-row form-material">
								<div class="col-md-6 mb-3">

									<input type="hidden" class="form-control" id="u_id" name="u_id" placeholder="Username" aria-describedby="inputGroupPrepend" required>

									<label for="editUsername">Username</label>
									<div class="input-group">
										<input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
										<div class="invalid-feedback">
											Username is required!
										</div>
									</div>
								</div>

								<div class="col-md-6 mb-3">
									<label for="editUserMail">Email</label>
									<div class="input-group">
										<input type="email" class="form-control" id="editUserMail" name="editUserMail" placeholder="Email" required>
										<div class="invalid-feedback">
											Email is required!
										</div>
									</div>
								</div>
							</div>

							<div class="form-row form-material">
								<div class="col-md-6 mb-3">
									<label for="editFirstName">First name</label>
									<input type="text" class="form-control" id="editFirstName" name="editFirstName" placeholder="First name" required>
									<div class="invalid-feedback">
										First Name is required!
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="editLastName">Last name</label>
									<input type="text" class="form-control" id="editLastName" name="editLastName" placeholder="Last name"  required>
									<div class="invalid-feedback">
										Last Name is required!
									</div>
								</div>
							</div>

							<div class="form-row form-material">
								<div class="col-md-6 mb-3">
									<label for="editUserType">User Type</label>
									<select id="editUserType" name="editUserType" class="custom-select form-control" required>
										<option value="">User type</option>
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
										<input type="text" class="form-control" id="editPhoneNumber" name="editPhoneNumber" placeholder="Phone Number" minlength="10" maxlength="10" required>
										<div class="invalid-feedback">
											Phone Number is required!
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="btn_addUser" id="btn_addUser" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div><!-- row -->
			</div>
		</div>
	</div>
</div><!-- Edit User Modal -->






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
						<div class="col-md-8 mb-3">
							<input type="text" class="form-control" id="stdFirstName" name="stdFirstName" placeholder="First name" required>
							<div class="invalid-feedback">
								First Name is required
							</div>
						</div>
                    </div>
                    <div class="form-row form-material">
						<div class="col-md-8 mb-3">
							<input type="text" class="form-control " id="stdLastName" name="stdLastName" placeholder="Last name" required>
							<div class="invalid-feedback">
								Last Name is required
							</div>
						</div>
                    </div>
                    <div class="form-row form-material">
						<div class="col-md-8 mb-3">
							<div class="input-group">
								<input type="text" class="form-control form-control-line" id="stdOtherName" name="stdOtherName" placeholder="Othername">
								<div class="invalid-feedback">
									Othername is required
								</div>
							</div>
						</div>
					</div>
					<div class="form-row form-material">
						<div class="col-md-8 mb-3">
							<input type="text" class="form-control" id="stdIndexNumber" name="stdIndexNumber" placeholder="Index Number" maxlength="20" minlength="8" required>
							<div class="invalid-feedback">
								Index Number is required
							</div>
						</div>
                    </div>
                    <div class="form-row form-material">
						<div class="col-md-8 mb-3">
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

                    </div>
                    <div class="form-row form-material">
						<div  class="col-md-8 mb-3">
							<input type="number" class="form-control" id="stdPhoneNumber" name="stdPhoneNumber" placeholder="Phone Number" maxlength="10" minlength="10"  required>
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


<!-- Make payment -->
<div class="modal fade" id="makePaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="makePaymentModal"> <i class="mdi mdi-cash"></i> Make Payment </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate method="get" action="../../../validation/admin/students/makePayment.php" id="makePaymentForm">
                <div class="modal-body">
                    <input type="text" class="form-control" id="std_id" name="std_id" >

                    <div class="form-row form-material">
                        <div class="col-md-4 mb-3">
                            <label for="amtPaying">Amount</label>
                            <input type="number" class="form-control" id="amtPaying" name="amtPaying" placeholder="Amount Paying"  min="1" required>
                            <div class="invalid-feedback">
                                Amount is invalid
                            </div>
                        </div>

	                    <div class="col-md-6 mb-3">
		                    <label for="lacost">Lacost</label>
		                    <select id="lacost" name="lacost" class="custom-select form-control" required>
			                    <option value="">Select</option>
			                    <option value="1">Received</option>
			                    <option value="0">Not Received</option>
		                    </select>
		                    <div class="invalid-feedback">
			                    This field is required
		                    </div>
	                    </div>
                    </div>

                    <div class="form-row form-material">
                        <div class="col-md-12 mb-3">
                            <label for="amtInWords">Amount In Words</label>
                            <input type="text" class="form-control" id="amtInWords" name="amtInWords" placeholder="Amount in Words" required>
                            <div class="invalid-feedback">
                                This Field is required
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnMakePayment"  id="btnMakePayment" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- Make payment Modal -->

<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer"> © 2018 Information Technology Student Union </footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>


<script>

    // function  printlayer(k) {
    //     var generator = window.open(",'name,");
    //     var layetext = document.getElementById(k);
    //     generator.document.write(layetext.innerHTML.replace("Print Me"));
    //     generator.document.close();
    //     generator.print();
    //     generator.close();
    //
    // }

    function  printDiv() {
        var divToPrint = document.getElementById("receiptDiv");
        var newWin = window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write(divToPrint.innerHTML.replace("Print Me"))
       // newWin.document.write('<html><body onload="window.print()"> '+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        newWin.print();
        newWin.close();
    }
</script>

<script>
    $(document).ready(function () {
        $("#amtPaying").prop('disabled', true);
    });
</script>
<script src="../../../assets/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../../assets/popper/popper.min.js"></script>
<script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../../assets/custom/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../../../assets/custom/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../../assets/custom/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../../../assets/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../../../assets/sparkline/jquery.sparkline.min.js"></script>
<script src="../../../assets/sparkline/jquery.sparkline1.min.js"></script>
<!--Custom JavaScript -->
<script src="../../../assets/custom/js/custom.min.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart
<script src="../../../assets/chartist-js/dist/js/chartist.min.js"></script>
<script src="../../../assets/chartist-js/dist/js/chartist-plugin-tooltip.min.js"></script>-->
<!--c3 JavaScript -->
<script src="../../../assets/c3-master/d3.min.js"></script>
<script src="../../../assets/c3-master/c3.min.js"></script>
<!-- Chart JS -->
<script src="../../../assets/custom/js/dashboard1.js"></script>
<script src="../../../assets/custom/js/students/student.js"></script>
<script src="../../../assets/custom/js/users/users.js"></script>

<script src="../../../assets/dataTables/datatables.min.js"></script>
<script src="../../../assets/dataTables/dataTables.buttons.min.js"></script>
<script src="../../../assets/dataTables/buttons.flash.min.js"></script>
<script src="../../../assets/dataTables/jszip.min.js"></script>
<script src="../../../assets/dataTables/pdfmake.min.js"></script>
<script src="../../../assets/dataTables/vfs_fonts.js"></script>
<script src="../../../assets/dataTables/buttons.html5.min.js"></script>
<script src="../../../assets/dataTables/buttons.print.min.js"></script>
<script src="../../../assets/dataTables/buttons.colVis.min.js"></script>
<script src="../../../assets/custom/js/sweetalert.min.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="../../../assets/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
