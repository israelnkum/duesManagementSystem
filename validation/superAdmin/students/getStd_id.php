<?php
require_once '../../db_Connection.php';

$currentStd = $_GET['std_iD'];

$sql = "SELECT * FROM students WHERE std_id = :std_id";

$stmt = $connection->prepare($sql);
$stmt->bindValue(':std_id',$currentStd);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);
