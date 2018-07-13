<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header ">
            <a class="navbar-brand " href="#">

                  <img src="../../../assets/img/itsu.jpeg" alt="iTSU" class="dark-logo" style="height: auto; width: 35px;"/>
                  <span class="text-white" style="letter-spacing:1px; font-weight:500;">i.T.S.U</span>


                </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">

                <!-- This is  -->
                <li class="nav-item">
                  <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                    <i class="mdi mdi-menu"></i>
                  </a>
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box">

                  <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                    <!-- <img src="../../../assets/img/itsu.jpeg" class="rounded-circle" style="height:auto; width:60px;"> -->
                    <span style="font-size:22px;">Dues Management System</span>
                </a>

                </li>

            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

	                    <?php
		                    include '../../../validation/db_Connection.php';
		                    $sql= "SELECT * FROM `users` WHERE user_id=:user_id";

		                    $stmt = $connection->prepare($sql);
		                    $stmt->bindValue(':user_id', $_SESSION['u_id']);
		                    $stmt->execute();
		                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			                    if ($row['profileImg'] == '1'){
				                    echo "Hi ".$_SESSION['u_name'];
			                    }else{
				                    echo "Hi ".$_SESSION['u_name'];
			                    }
		                    }


	                    ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box text-center">
                                    <div class="u-img">
	                                    <?php
		                                    include '../../../validation/db_Connection.php';
		                                    $sql= "SELECT * FROM `users` WHERE user_id=:user_id";

		                                    $stmt = $connection->prepare($sql);
		                                    $stmt->bindValue(':user_id', $_SESSION['u_id']);
		                                    $stmt->execute();
		                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			                                   if ($row['profileImg'] == '1'){
			                                   	echo "<img class='rounded-circle' style='height: 50px; width:55px;' src='../../../assets/img/uploads/profile".$_SESSION['u_name'].".jpg?'".mt_rand().">";
			                                   }else{
				                                   echo "<img class='rounded-circle style='height: 50px; width:55px;' src='../../../assets/img/uploads/profiledefault.png'>";
			                                   }
		                                    }


	                                    ?>

                                    </div>
                                    <div class="u-text">
                                        <h4>
	                                        <?php
                                           echo $_SESSION['u_name'];
                                            ?>
                                        </h4>
                                        <p class="text-muted"><?php
                                            echo $_SESSION['u_mail'];
                                            ?>
                                        </p>
	                                    <form method="post" action="../../../pages/superAdmin/users/updatePofile.php">
		                                    <input type="hidden" name="current_user" value="<?php echo $_SESSION['u_id']?>">
		                                    <button type="submit" class="btn btn-danger btn-sm" name="btn_current_user">View Profile</button>
	                                    </form>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form class="text-center" method="post" action="../../../validation/login/logout.inc.php">
                                    <button class="btn btn-primary btn-sm" style="padding: 5px;" name="btn_logout" type="submit">
	                                    <i class="fa fa-power-off"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
