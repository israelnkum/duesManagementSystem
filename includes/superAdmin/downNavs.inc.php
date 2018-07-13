<aside class="left-sidebar text-center">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="../../../pages/superAdmin/dashboard/dashboard.superAdmin.php" aria-expanded="false">
                      <i class="mdi mdi-gauge"></i>
                      <span class="hide-menu">Dashboard </span></a>
                </li>
                <li>
                    <a href="../../../pages/superAdmin/students/allStudents.php" >
	                    <i class="mdi mdi-school"></i>
	                    <span >All Student(s)</span>
                    </a>
                </li>
	            <?php
		            if ($_SESSION['user_type']=="Super Admin"){
		            	echo '
		            	    <li>
                    <a href="../../../pages/superAdmin/users/allUsers.php">
	                    <i class="mdi mdi-account"></i>
	                    <span>All Users</span>
                    </a>

                </li>
		            	';
		            }else{
		            	echo '';
		            }
	            ?>


<!--                <li>-->
<!--                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Reports</span></a>-->
<!--                    <ul aria-expanded="false" class="collapse text-left">-->
<!--                        <li><a href="#">Generate Report(s)</a></li>-->
<!--                        <li><a href="#">All Generated Report(s)</a></li>-->
<!--                    </ul>-->
<!--                </li>-->

	            <li>
		            <a href="../../../pages/superAdmin/paymentLog/paymentLog.inc.php?duesPayment=all dues payment log" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Dues Log</span></a>
	            </li>
<!--                <li>-->
<!--                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Log(s)</span></a>-->
<!--                    <ul aria-expanded="false" class="collapse text-left">-->
<!--                        <li><a href="../../../pages/superAdmin/paymentLog/paymentLog.inc.php?duesPayment=all dues payment log">Dues Payment Log</a></li>-->
<!--<!--	                    --><?php
////		                    if ($_SESSION['user_type']=='Super Admin'){
////		                    	echo '
////		                    	 <li><a href="#">User Log</a></li>
////		                    	';
////		                    }else{
////		                    	echo '';
////		                    }
////	                    ?>
<!--                    </ul>-->
<!--                </li>-->

	            <?php
		            if ($_SESSION['user_type']=='Super Admin'){
			            echo '
		                    	 <li>
						            <a  href="../../../pages/superAdmin/preferences/preferences.inc.php?preferences"><i class="mdi mdi-file"></i><span>Dues Preference</span></a>
					            </li>
		                    	';
		            }else{
			            echo '';
		            }
	            ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
