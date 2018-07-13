<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/itsu.jpeg">
	<link rel="icon" type="image/png" sizes="96x96" href="../../../assets/img/itsu.jpeg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>iTSU Department</title>
	<link href="../../../assets/custom/css/style.css" rel="stylesheet">
	
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	
	<!-- Bootstrap core CSS     -->
	<link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	
	<link href="../../../assets/custom/css/login.css" rel="stylesheet" />
	<!--  Fonts and icons     -->
	<link href="../../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../../assets/bootstrap/css/animate.min.css">
	<link href="../../../assets/bootstrap/css/demo.css">
	<link href="../../../assets/bootstrap/css/themify-icons.css">


</head>
<body>

<section id="wrapper" class="login-register login-sidebar">
	<div class="container-fluid">
		<!-- File type not Accepted -->
		<?php if (isset($_GET['err'])) { ?>
			<div class="alert alert-danger alert-dismissable col-sm-12 text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['err'];?>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-8 text-center ">
				<h1 class="display-1 text-primary" style="padding-top: 150px; max-font-size: 120px;">i.T.S.U</h1>
				<small class="text-danger lead">Information Technology Students Union</small>
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


</body>

<!--   Core JS Files   -->
<script src="assets/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/custom/js/login.js"></script>
<script src="assets/bootstrap/js/bootstrap-notify.js"></script>

<script src="assets/bootstrap/js/notify.min.js"></script>
<script src="assets/bootstrap/js/paper-dashboard.js"></script>
<script src="assets/bootstrap/js/jquery-1.10.2.js"></script>
<script src="assets/bootstrap/js/chartist.min.js"></script>

<script src="assets/bootstrap/js/demo.js"></script>

<script src="assets/custom/js/sweetalert.min.js"></script>
</html>
