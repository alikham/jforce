<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
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
		<form action="insert_user.php" method="post"  enctype="multipart/form-data" >       
		    <h3 class="form-signin-heading">Hello New User</h3>
			  <hr>
			  <br>
			  <input type="text"  class="form-control" id="name" name="name" placeholder="Enter Username" required="" autofocus="" />
			  <span id="name_span" style="color:red;"></span>	  
			  <br>
			  <input type="password" id="pass" class="form-control" name="password" placeholder="Password" required=""/>     		  
			  <br>
			  <input type="password" id="confpass" class="form-control" name="confirmpassword" placeholder="Confirm Password" required=""/>
			  <span id="confirmpass" style="color:red;"></span>	  
			  <br>
			  <input type="file" class="form-control" name="file"/>     		  
			  <br>
			  <button class="btn btn-lg btn-primary"  name="Submit" value="Register" type="Submit">Submit</button>  
		</form>
		</div>			
	</div>
</div>
</body>
<script>
	$('#confpass').on('keyup', function(){
		$('#confirmpass').html('');
	});
	$('#name').on('keyup', function(){
		$('#name_span').html('');
	});

	$('button').on('click', function(){
	if($('#pass').val()!== $('#confpass').val()){
		$('#confirmpass').html('Password Not Matching');
		return false;
	}
	else{
		return true;
	}
	});
	$('#name').on('blur', function(){
		$.ajax({
			url: 'check_user.php',
			type: 'post',
			data:({"name":$('#name').val()}),
			success : function(e){
				if(e === 'exists'){
					$('#name_span').html("User Name Already Exists Please choose another");
				}
			}
		});
	});

	
</script>
</html>