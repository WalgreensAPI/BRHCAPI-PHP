<!DOCTYPE html>
<html>
<head>
	<title>
		TestBR
	</title>
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
	<link href="./css/styles.css" rel="stylesheet" media="screen" />
</head>
<body>
	<div class="header ac">
		<h1 class="title">Balance Rewards</h1>
	</div>
	<div class="scroll">
		<div class="content ac">
			<h1>
				<?php 
					if(isset($_GET['action']))
					{
						$get = $_GET['action'];
						
						if($get == 'error')
							echo 'You got an Error! Try again by clicking Connect to Walgreens below...';
						elseif($get == 'deactivate')
							echo 'You are deactivated! Try again by clicking Connect to Walgreens below...';
						else
							echo 'This is a sample app using the Balance Rewards for Healthy Choices API.';
					}
					else
						echo 'This is a sample app using the Balance Rewards for Healthy Choices API.';		
				?>
			</h1>
		</div>
		<div class="footer">
			<div class="ac">
				<?php
					include("./includes/functions.php");
					include("./includes/globals.php");
					
					createLink($apiEndPoint, $cred_data);
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./jquery-latest.min.js"></script>
	<script type="text/javascript">
		$(window).scroll(function(){
			var header = $('.header'),
			scroll = $(window).scrollTop();
			console.log(scroll);
			if (scroll >= 1) header.addClass('fixed');
			else header.removeClass('fixed');
		});
	</script>
</body>
</html>