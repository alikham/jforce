<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$username = $_SESSION['name'];
$user_val = $_SESSION['user_id'];
$image = "../images/".$_SESSION['image_url'];
	
?>
<head>
	<meta charset="UTF-8">
	<title>Feed</title>
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
		<div class="message_header">	    
		    <h3>Enter Thoughts! <?php echo $username;?></h3>
			  <textarea name="feed_msg" id="feedmsg"  rows="3" class="form-control"></textarea>
			 <br>
			 <span id="message_error" style="color:red;display: block;"></span>
			  <button type="submit" class="btn btn-lg btn-primary"  name="post_feed" id="post_feed_btn">Post</button>  			
		<hr>
		<br>
		</div>
		<div class="feed_messages">
			<?php
                include '../db/connect.php';
               $pdo = Database::connect();
               $sql = 'SELECT feed.message,user.image_url, user.name  FROM feed LEFT JOIN user ON feed.user_id = user.user_id ORDER BY feed.feed_id DESC';
               foreach ($pdo->query($sql) as $row) {
                        echo '<div class="row ">';
						echo '<div class="col-md-4 col-sm-4 col-xs-2">';
						echo '<img src="../images/'.$row['image_url'].'" alt="user_image" class="img-responsive">';
						echo '</div>';
						echo '<div class="col-md-8 col-sm-6 col-xs-8">';
						echo '<div class="row">';
						echo '<b>'.$row['name'];
						echo '</b>';
						echo '</div>';
						echo '<div class="row">';
						echo '<span>'.$row['message'];
						echo '</span>';
						echo '</div>';
						echo '</div>';
						echo '<br>';
						echo '</div>';
						echo '<hr>';
               }
               Database::disconnect();
              ?>
			
		</div>
		<a href="../auth/logout.php" class="btn btn-danger" style="position: fixed; bottom: 5%; right: 5%; ">Logout</a>
		</div>			
	</div>
</div>
</body>
<script>

	$('#post_feed_btn').on('click', function(){

	let feedmsg = $('#feedmsg').val();
	let html = '';
	$('#feedmsg').on('keyup', function(){
		
		$('#message_error').html('');
		html = '';
	});
	if(feedmsg !== ''){
		html += '<div class="row">';
		html += '<div class="col-md-4 col-sm-4 col-xs-2">';
		html += '<img src='+'<?php echo $image; ?>'+' alt="user_image" class="img-responsive">';
		html += '</div>';
		html += '<div class="col-md-8 col-sm-6 col-xs-8">';
		html += '<div class="row">';
		html += '<b>'+'<?php echo $_SESSION['name'];?>';
		html += '</b>';
		html += '</div>';
		html += '<div class="row">';
		html += '<span>'+feedmsg;
		html += '</span>';
		html += '</div>';
		html += '</div>';
		html += '<br>';
		html += '</div>';
		html += '<hr >';
		$(html).insertAfter('.message_header');
		console.log("after function \n"+html); 
		html = '';
		console.log("after clearing \n"+html); 
		$.ajax({
			url: 'insert_feed.php',
			type: 'post',
			data:({"userval":"<?php echo $user_val;?>", "feedmsg":feedmsg}),
			success : function(e){
			console.log(e);
			}
		});
	}
	else{
		$('#message_error').html('Please enter text!');
	}
	html ='';
	});

</script>
</html>