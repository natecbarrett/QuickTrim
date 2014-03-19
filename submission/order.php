<?php 
session_start();
require_once "../classes/curl.inc.php";

//The url to post the prospect to.
$limelight_api_url = "https://shoponlinesecure.com/admin/transact.php";

//the method we are using.
$method = "NewOrderWithProspect";

//The api username.
$api_username = "quicktrim";

//The api password.
$api_password = "sJx74979xguQrV";

//The campaign id.
$campaign_id = "23";

$params = array(
		
	//The api username.
	"username" 		=> $api_username,
	
	//The api password
	"password" 		=> $api_password,
	
	//the method we want to use (New Prospect)
	"method" 		=> $method,
	
	"creditCardType"	=> $_POST['cc_type'],
	"creditCardNumber"	=> $_POST['cc_number'],
	"expirationDate"	=> $_POST['cc_expires'],
	"CVV"				=> $_POST['cc_cvv'],
	"tranType"			=> "Sale",
	
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
	"OPT"			=> $_POST['req_id'],
	
	//Notes
	"notes"			=> '',
	
	//Ip Address
	"ipAddress"		=> $_POST['ip'],
		
	//The limelight product id.
	"productId"		=> $_POST["custom_product"],
		
	//The limelight campaign id.
	"campaignId"	=> $campaign_id,
		
	//The shipping id
	"shippingId"	=> "1",
	
	//Number of upsells.
	"upsellCount"	=> 0,
	
	//The partial prospect id.
	"prospectId"	=> $_POST['prospectId'],
		
	//the quantity of the product.
	"product_qty_" . $_POST['custom_product'] => 1,
			
		
);


$param_string = $limelight_api_url . "?";

foreach($params as $key=>$value)
{
	$param_string .= $key . "=" . urlencode($value) . "&";
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

$response_parts = array();
parse_str($result, $response_parts);

if ($response_parts["errorFound"] == 0)
{
	$_SESSION['qt_orderid'] = $response_parts["orderId"];
	$result = array("success" => "true", "message" => $response_parts["orderId"]);
	$_SESSION['qt_fp'] = 1;
	setcookie('qt_order',true,time() + (86400 * 30)); // 86400 = 1 day
}

else 
{
	$result = array("success" => "false", "message" => $response_parts["responseCode"]);
}


echo json_encode($result);

?>