<?php
//© Walgreen Co.  All rights reserved.
	$affiliateId = "YOUR AFFILIATE ID";
    
    $apiKey = "YOUR API KEY";
    
    $apiEndPoint = "https://m-qa2.walgreens.com/oauth/authorize.jsp?";
	
	$redirectURI = "YOUR REDIRECT URI";
	
	$transID = substr((time().rand(0,time())), 0,16);
	
	$state = substr((time().rand(0,time())), 0,16);

    $cred_data = array(
                    "client_id"=>$affiliateId,
                    "response_type"=>"code",
                    "scope"=> "steps",
                    "channel"=>"5",
                    "redirect_uri"=>$redirectURI,
                    "transaction_id"=>$transID,
                    "state"=>$state
                  );       
    
    $oAuthRequestEndpoint = "https://services-qa.walgreens.com/api/oauthtoken/v1";
    
    $headers = array('Content-Type: application/x-www-form-urlencoded');
    
    $request_data = array(
			"grant_type" => "authorization_code",
			"client_id" => $affiliateId,
			"client_secret" => $apiKey,
			"code" => "",
			"redirect_uri" => $redirectURI,
			"transaction_id" => "",
			"channel" => "5",
			"act" => "getOAuthToken",
			"state" => ""
		  );
		  
	
    $oAuthRemoveEndpoint = "https://services-qa.walgreens.com/api/oauthtoken/delete/v1";
    
    $remove_data = array(
			"client_id" => $affiliateId,
			"client_secret" => $apiKey,
			"token" => "",
			"redirect_uri" => $redirectURI,
			"transaction_id" => "",
			"channel" => "5",
			"act" => "deactivateToken"
		  );
		  
?>