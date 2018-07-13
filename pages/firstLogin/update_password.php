<?php
session_start();
	if (!isset($_SESSION['u_id'])){
		
		header("Location: ../../index.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/itsu.jpeg">
    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/itsu.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>iTSU Department</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../../assets/bootstrap/css/animate.min.css" rel="stylesheet" />

    <!-- Bootstrap core CSS     -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/custom/css/style.css" rel="stylesheet">
    <!--  Paper Dashboard core CSS    -->

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/custom/css/login.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<section id="wrapper" class="login-register login-sidebar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 text-center ">
                <h1 class="display-1 text-primary" style="padding-top: 150px; max-font-size: 120px;">i.T.S.U</h1>
                <small class="text-danger lead">Information Technology Students Union</small>
	            
	            <marquee>
		            <h1 class="text-capitalize text-danger display-4" style="font-weight: 300; font-size: 30px;">
			            Please Change your password before you continue
		            </h1>
	            </marquee>
            </div>
            <div class="col-xs-4 m-t-40">
                <div class=" card login-box  bg-transparent"  >
                    <div class="card-body">
                        <form class="needs-validation form-horizontal" method="post" action="../../validation/login/firstLoginUpdate.php" novalidate>
                            <a class="text-center db "><img style="width: 100px; height: auto;" src="../../assets/img/itsu.jpeg" /></a>

                            <div class="form-row form-material">
                                <div class="col-md-12 m-t-40">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" class="form-control " id="newPassword" name="newPassword" placeholder="New Password" minlength="8"  required>
                                    <small class="text-danger">Minimum lenght should be 8</small>
                                    <div class="invalid-feedback">
                                        New Password is required
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-material">
                                <div class="col-md-12 m-t-40">
                                    <label for="confirmPassword">Password</label>
                                    <input type="password" class="form-control " id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" minlength="8"  required>
                                    <div class="invalid-feedback">
                                        Please Confirm your Password
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 m-t-10 text-right">
                                <a href="#"><small class="text-danger">Forgot Password?</small></a>
                            </div>


                            <div class="form-group text-center">
                                <div class="col-xs-12 m-t-20">
                                    <button class="btn btn-primary" name="changePassword" type="submit" >Change Password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script type="text/javascript">

    $(".changePassword").notify("Hello Box");

</script>
<!--   Core JS Files   -->
<script src="../../assets/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>



<script src="../../assets/custom/js/login/password_update.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/bootstrap/js/bootstrap-notify.min.js"></script>
<script src="../../assets/bootstrap/js/notify.min.js"></script>

</body>
</html>
