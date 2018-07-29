<?php
	include '../db/connect.php';
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];
	$sql="SELECT * FROM `user` WHERE `name` = '$name' AND `password`= '$password'";
	$pdo = Database::connect();
	// $result_arr = $pdo->query($sql);
	$sth = $pdo->prepare($sql);
	$sth->execute();

	/* Fetch all of the remaining rows in the result set */
	$result = $sth->fetchAll();

	if($result){
		// print_r($result);
		$_SESSION['user_id'] = $result[0]['user_id'];
 		$_SESSION['name'] = $result[0]['name'];
 		$_SESSION['image_url'] = $result[0]['image_url'];
 		header('Location: /feedapp/feed/feedform.php');
	}
	else{
		$_SESSION['failed'] = true;
		header('Location: /feedapp/index.php');
		// echo "Login ";
	}
 
