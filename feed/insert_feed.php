<?php
include '../db/connect.php';
// print_r($_POST);
$userid = $_POST['userval'];
$feedmsg = $_POST['feedmsg'];
$created_date = date("Y-m-d H:M");
$sql="INSERT INTO `feed` (`user_id`, `message`, `created_date`) VALUES (?, ?, ?)";
$pdo = Database::connect();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $pdo->prepare($sql);
 $result = $sth->execute(array($userid, $feedmsg, $created_date));
Database::disconnect();

// print_r($result);
?>