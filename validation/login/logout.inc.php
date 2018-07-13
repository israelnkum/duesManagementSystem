<?php
 require_once ('../db_Connection.php');
if (isset($_POST['btn_logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../index.php?logout_success=" . urlencode("Logged out Successfully"));
    exit();
}
