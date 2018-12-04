<?php


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email News Letter</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		html{
	background: url(images/wallpaper.png) no-repeat center center;
	background-size: cover;
	}
	</style>
</head>
<body>

<div class="outside-container">
	<div class="newsletter-area">
		<div class="newsletter-top">
			<div class="newsletter-logo">
				<img src="images/email.png" alt="newsletter-logo" title="newsletter" class="img-responsive">
			</div>
		</div>
		<h1 class="subscribe-title">Subscribe !</h1>
		<p class="subscribe-text">Join over 500,000 information security professionals — Get the best of our cyber security coverage delivered to your inbox every morning.</p>
		<form method="post">
			<input type="email" name="useremail" placeholder="YourEmail@email.com" class="email-box" maxlength="60" id="email_data">
			<span class="email-message" id="email_msg"></span>
			<button class="submit-button" type="button" id="email_submit">Send</button>
		</form>
	</div>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
	
$(document).ready(function (){

	$("#email_submit").click(function (){

		var $email_data_var;
		$email_data_var = $("#email_data").val();
		if($email_data_var == ''){
			$("#email_msg").html("Please Enter a Email Address");
		}
		else{

			$.ajax({

				type:'POST',
				url:"ajax/email-submit.php",
				data:{email_data_values : $email_data_var},
				success:function(response){
					$("#email_msg").html(response);
				}

			});

		}

	});

});

</script>
