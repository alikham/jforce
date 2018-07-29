<?php
session_start();
if(isset($_SESSION['failed'])){
$status = $_SESSION['failed'];
session_destroy();
}
else{
	$status = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login	</title>
	<!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class = "container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
		<form action="auth\login.php" method="post" name="Login_Form" class="form-signin" >       
		    <h3 class="form-signin-heading">Welcome!</h3>
		    <div class="alert alert-danger fade in">
			    <a href="#" class="close" data-dismiss="alert">&times;</a>
			    <strong>Error!</strong> Wrong Username or Password
			</div>
			  <hr><br>
			  
			  <input type="text" class="form-control" name="name" placeholder="Username" required="" autofocus="" />
			  <br>
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
			 	<br>
			  <button class="btn btn-lg btn-primary text-center"  name="Submit" value="Login" type="Submit">Login</button>  
			  <a href="user\register.php" >New Registration</a>			
		</form>
		</div>			
	</div>
</div>
</body>
<script>
	$(document).ready(function(){
		let status  = <?php echo $status;?>;
		if(status){
			$('.alert-danger').show();
		}
		else{
			$('.alert-danger').hide();

		}
	});
	setTimeout(function(){ $('.alert-danger').fadeOut() }, 5000);
</script>
</html>