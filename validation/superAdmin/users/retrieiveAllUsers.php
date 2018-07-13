<?php
require_once('../../db_Connection.php');

if (isset($_POST['btn_resetPss'])){
	$user_id= $_POST['user_id'];
	$selectSql ="SELECT * FROM users WHERE user_id =:user_id";
	$selectStm =$connection->prepare($selectSql);
	$selectStm->bindValue('user_id',$user_id);
	$selectStm->execute();
	
	$selectRow=$selectStm->fetch(PDO::FETCH_ASSOC);
	$userName = $selectRow['username'];
	
	$hashPassword = password_hash($userName, PASSWORD_BCRYPT, array("cost" => 12));
	
	$update = "UPDATE users SET user_password=:user_password, updated=:updated WHERE user_id=:user_id";
	$updateStmt =$connection->prepare($update);
	$updateStmt->bindValue('user_password',$hashPassword);
	$updateStmt->bindValue('updated','0');
	$updateStmt->bindValue('user_id',$user_id);
	$result =$updateStmt->execute();
	if($result){
		header("Location: ../../../pages/superAdmin/users/allUsers.php?reset=".urlencode("Password Reset Success"));
		exit();
	}else
	{
		header("Location: ../../../pages/superAdmin/users/allUsers.php?reseterror=".urlencode("Error Resseting Password"));
		exit();
	}
}

$output= array('data' =>array());
$sql = "SELECT * FROM users";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $userType='';
    if ($row['user_type'] == 'Super Admin'){
        $userType = '<label class="badge badge-success">Super Admin</label>';

    }else{

        $userType = '<label class="badge badge-primary">Admin</label>';
    }
    $actionBtn1 = '

<div class="row">
<div class="col-sm-4">
<form action="../../../pages/superAdmin/users/editUserInfo.php" method="POST">
  
        <input type="hidden" name="user_id" value="' .$row['user_id'].'">
		<button type="submit"  name="btn_editUser" class="btn btn-sm btn-success"
		data-toggle="tooltip" data-placement="top" title="Edit User Account">
	        <i class="mdi mdi-account-edit"></i>
	    </button>
     </form>
</div>
<div class="col-sm-6">
		 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
	    data-target="#deleteUserModal" data-toggle="tooltip" data-placement="bottom" title="Delete User Account"
	     onclick="deleteUser('.$row['user_id'].')">
	        <i class="ti ti-trash"></i>
	    </button>
	</div>

</div>


   ';
   
   
	$pssBtn ='
	<div class="row">
<div class="col-sm-4">
<form action="../../../validation/superAdmin/users/retrieiveAllUsers.php" method="POST">
        <input type="hidden" name="user_id" value="' .$row['user_id'].'">
		<button type="submit"  name="btn_resetPss" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Reset User Password">
	        <i class="mdi mdi-lock-open"></i>Reset
	    </button>
		
     </form>
</div>
';

    $output['data'][] = array(
        $x,
        $row['username'],
        $row['firstName'],
        $row['lastName'],
        $row['email'],
        $row['phone'],
        $userType,
        $actionBtn1,
	    $pssBtn
    );
    $x++;
    $connection=null;

}

echo json_encode($output);
