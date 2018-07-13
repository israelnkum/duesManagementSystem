<?php
require_once '../../db_Connection.php';

$currentUser = $_POST['users_id'];

$sql = "SELECT * FROM users WHERE user_id = :user_id";

$stmt = $connection->prepare($sql);
$stmt->bindValue(':user_id',$currentUser);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);


