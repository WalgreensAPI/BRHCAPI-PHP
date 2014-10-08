Balance Rewards HC API PHP
=========

The Balance® Rewards API enables pre-qualified partners to connect into Walgreens to share 
individual member health and wellness information to be eligible to receive Balance Rewards points 
for healthy activity like walking, running, and weight management.
The API is designed to enable partners to seamlessly share individual health and lifestyle activity (Data 
Sharing), and create or validate user memberships. In order for individuals to receive points for health 
and wellness activity, they must be a Balance Rewards member and have successfully completed a 
Walgreens OAuth login or registration.
In order for Balance Rewards members to receive points for data recorded using pre-qualified partners 
applications, devices, or platform, partners must share full activity information with Walgreens. In no 
way is Walgreens able to reward activity without supporting aggregate or transaction level information.

> The flow of an integration:
  * Setup your Global Environment File
  * Gain access to the Balance Rewards API via oAuth code/callback
  * Get/Save oAuth Token from auth code
  * Post qualifying activity data to Walgreens
  * Unsubscribe users oAuth Token from posting data to Walgreens

###Setup your Global Environment File
Look at the *globals.php* file that stores all of the important string/arrays needed for the app and edit the ones below:

    $affiliateId = "YOUR AFFILIATE ID";
    $apiKey = "YOUR API KEY";
    $redirectURI = "YOUR REDIRECT URI";
   
###Gain access to the Balance Rewards API via oAuth code/callback
A function can be used to create the oAuth URL from the array of *$cred_data* from your *globals.php* file. Once the user clicks the link they will login with their Walgreens account and be sent back to your specified *$redirectURI*

	function createLink($url,$cred_data)
	{
		$queryURL = $url.urldecode(http_build_query($cred_data));
		
		echo '<a id="connectLink" class="btn btn-red" href="'.$queryURL.'">Connect to Walgreens</a><br/>';
	}
    
###Get/Save oAuth Token from auth code
Your page at the location of your *$redirectURI* should contain something like this:
    
	include("./functions.php");
	include("./globals.php");
				
	$scope = $_REQUEST['scope'];
	$state = $_REQUEST['state'];
	$code = $_REQUEST['code'];
	$transID = $_REQUEST['transaction_id'];
	
	$response = getToken($oAuthRequestEndpoint,$headers,$request_data,$code,$state,$transID);

###Post qualifying activity data to Walgreens
You can post all kinds of data, please read the [documentation](https://github.com/WalgreensAPI/BRHCAPI-PHP/raw/master/Documentation.pdf) on this as it can be very extensive.
	

###Unsubscribe users oAuth Token from posting data to Walgreens
Deleting the token from your users database is laid out in depth in the [documentation](https://github.com/WalgreensAPI/BRHCAPI-PHP/raw/master/Documentation.pdf).
	
