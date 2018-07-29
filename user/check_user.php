<?php
	include '../db/connect.php';
	$pdo = Database::connect();
	$name = $_POST['name'];
	$check_user = "SELECT * FROM user WHERE name='$name'";
	$check_user_qr = $pdo->prepare($check_user);
		$check_user_qr->execute();

	/* Fetch all of the remaining rows in the result set */
	$result = $check_user_qr->fetchAll();

	if($result){
		echo 'exists';
	}
	else{
		echo "absent";
	}
	?>