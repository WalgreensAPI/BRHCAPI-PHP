<?php

function createLink($url,$cred_data)
{
	$queryURL = $url.urldecode(http_build_query($cred_data));
	
	echo '<a id="connectLink" class="btn btn-red" href="'.$queryURL.'">Connect to Walgreens</a><br/>';
}

function getToken($url,$headers,$request_data,$code,$state,$transID)
{

	$request_data['code'] = $code;
	$request_data['state'] = $state;
	$request_data['transaction_id'] = $transID;
	
	$response = post($url,$headers,urldecode(http_build_query($request_data)));
	
	return $response;

}

function buildDeactiveLink($response,$remove_data,$transID)
{
	//this has not been built out yet...but a quick hack for now is to return the user to index.php
	//Will be updated in the future, should be a POST to the deactivateToken Method
	echo '<a href="../index.php?action=deactivate" id="deactivate" class="btn btn-red">Deactivate Token</a>';
}

function post($url, $headers, $postfields) 
{
    
    $ci = curl_init($url);
    
    curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ci, CURLOPT_TIMEOUT, 30);
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ci, CURLOPT_POST, TRUE);
    curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
    
    $response = curl_exec($ci);

    curl_close ($ci);
    return $response;
}

function b($str)
{
	$str = str_replace(',',',<br/>', $str);
	$str = str_replace('{','{<br/>', $str);
	$str = str_replace('}','<br/>}', $str);
	return $str;
}

?>