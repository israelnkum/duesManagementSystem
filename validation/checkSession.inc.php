<?php
if (!isset($_SESSION['u_id'])){
	
	header("Location: ../../../index.php");
}