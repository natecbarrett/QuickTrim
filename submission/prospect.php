<?php
require_once "../classes/curl.inc.php";

session_start();

//The url to post the prospect to.
$limelight_api_url = "https://shoponlinesecure.com/admin/transact.php";

//the method we are using.
$method = "NewProspect";

//The api username.
$api_username = "quicktrim";

//The api password.
$api_password = "sJx74979xguQrV";

//The campaign id.
$campaign_id = "23";

//Build the limilight api params array.
$params = array(
	
	//The api username.
	"username" 		=> $api_username,
		
	//The api password
	"password" 		=> $api_password,

	//the method we want to use (New Prospect)
	"method" 		=> $method,
		
	//the limelight campaign id.
	"campaignId"	=> $campaign_id,
		
	//The prospects first name.
	"firstName"		=> $_POST['first_name'],
		
	//The prospects last name.
	"lastName"		=> $_POST['last_name'],
		
	//The prospects street address.
	"address1"		=> $_POST['address_1'],
		
	//The prospects city
	"city"			=> $_POST['city'],
		
	//The prospecs state
	"state" 		=> $_POST['state'],
		
	//the prospects zip code.
	"zip"			=> $_POST['zip'],

	//The prospects country
	"country"		=> $_POST['country'],
		
	//The prospects phone number.
	"phone"			=> $_POST['phone'],
		
	//The prospects email address.
	"email"			=> $_POST['email'],
		
	//The affiliate id.
	"AFFID"			=>$_POST['aff_id'],
		
	//Subid 1
	"C1"			=>$_POST['s1'],
	
	//Subid 2
	"C2"			=>$_POST['s2'],
	
	//Subid 3
	"C3"			=>$_POST['s3'],
	
	//The unique click id.
	"click_id"		=>$_POST['click_id'],

	//The req id.
	"OPT"			=> $_POST['request']
);

$param_string = $limelight_api_url . "?";

foreach($params as $key=>$value)
{
	$param_string .= $key . "=" . $value . "&";
}

rtrim($param_string, "&");

//Create the curl object.
$curl = new CURL();

//Set the curl options.
$opts = array( CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => true, CURLOPT_SSL_VERIFYPEER => false );

//Add the request to the curl sessions.
$curl->addSession( $param_string, $opts );

//Execute the request.
$result = $curl->exec();

//Clear the curl sessions.
$curl->clear();

$result = array("success" => "false", "message" => "$result");
echo json_encode($result);

?>