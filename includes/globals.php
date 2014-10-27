<?php
/*
 * Copyright Walgreen Co. All rights reserved *
 * Licensed under the Walgreens Developer Program and Portal Terms of Use and API License Agreement.
 * You may not use this file except in compliance with the License.
 * A copy of the API License Agreement can be found on https://developer.walgreens.com.
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing  permissions and limitations under the License.
 */
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