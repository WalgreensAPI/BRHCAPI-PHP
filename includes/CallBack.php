<!DOCTYPE html>
<html>
<head>
	<title>
		TestBR
	</title>
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
	<link href="../css/styles.css" rel="stylesheet" media="screen" />
</head>
<body>
	<div class="header ac">
		<h1 class="title">Balance Rewards</h1>
	</div>
	<div class="scroll">
		<div class="content ac">
			<?php	
				include("./functions.php");
				include("./globals.php");
							
				$scope = $_REQUEST['scope'];
				$state = $_REQUEST['state'];
				$code = $_REQUEST['code'];
				$transID = $_REQUEST['transaction_id'];
				
				$response = getToken($oAuthRequestEndpoint,$headers,$request_data,$code,$state,$transID);
				echo '<div class="response"><b>Response:</b><br/>'.b($response).'</div>';
				
				$response = json_decode($response,true);
				
				if(!isset($response['error']))
				{
			?>
					<a href="#postSteps" id="postSteps" class="btn btn-grn">Post Steps</a>
					<a href="#postWeight" id="postSteps" class="btn btn-grn">Post Weight</a>
					<a href="#postSleep" id="postSteps" class="btn btn-grn">Post Sleep</a>
					<hr/>
			<?php
				}
				else
				{
					echo '<br/><a href="../index.php?action=error" id="error" class="btn btn-red">Error: '.$response['error_description'].'</a><hr/>';
				}
			?>
		</div>
		<div class="footer">
			<div class="ac">
				<?php 
					buildDeactiveLink($response, $remove_data, $transID);
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../jquery-latest.min.js"></script>
	<script type="text/javascript">
		$('#postSteps').on('click', function(e){
			e.preventDefault();
			var conf = confirm("This functionality can be reviewed in the documentation!\n Click 'OK' to look at the documetation.\n Click 'Cancel' to do nothing.");
			if (conf) {
			    window.location ='https://github.com/WalgreensAPI/BRHCAPI-PHP';
			} else {
				return false;
			}
		});
		
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
			