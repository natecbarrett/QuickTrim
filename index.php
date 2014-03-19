<?php
//start the php session.
session_start();

//Get the affiliate id from the link.
$aff_id = isset($_GET['affid']) ? $_GET['affid'] : '';

//Get the campaign id from the link.
$campaign_id = isset($_GET['sid']) ? $_GET['sid'] : '';

//Get the subids from the link.
$s1 = isset($_GET['s1']) ? $_GET['s1'] : '';
$s2 = isset($_GET['s1']) ? $_GET['s2'] : '';
$s3 = isset($_GET['s1']) ? $_GET['s3'] : '';

//Store the stuff we need in the session.
$_SESSION['qt_aid'] = $aff_id;
$_SESSION['qt_cid'] = $campaign_id;


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en" lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
<title>Extreme Burn | QuickTrim Diet and Beauty</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/validator.css" type="text/css">
<link rel="stylesheet" href="css/media.css" type="text/css">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 8]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script>
$( document ).ready(function() {
    $(".clickhere").click(function(event){
    	event.preventDefault();
    	$('html, body').animate({
            scrollTop: $("#page").offset().top
        }, 1000);
    });

    $(".red-button").click(function(event) {
    	event.preventDefault();
    	var check = $("#prospectform :input").validator();
    	if (check.data("validator").checkValidity()==true)
    	{

    		$.ajax({
  			  type: "POST",
  			  url: "submission/prospect.php",
  			  data: $("#prospectform").serialize()
  			}).done(function (response, textStatus, jqXHR){
				var response = jQuery.parseJSON(response);
				if (response.success == "true")
				{
					window.location = "checkout.php";
				}

				else
				{
					alert(response.message);
				}
  	  		});
    	}
    });
});
</script>
</head>


<body>
	<div id="page">
		<div id="header">
			<div class="head clearfix">
				<div class="head-left">
					<img src="images/girl-group-head.png" alt="girl-group-head">
				</div>
				<div class="head-mid">
					<div class="logo">
						<img src="images/logo-img.png" alt="logo-img">
					</div>
					<div class="head-main-text">
						<img src="images/head-main-txt.png" alt="head-main-txt">
					</div>
				</div>
				<div class="head-right head-right2">
					<div class="product-group-img">
						<img src="images/form-top-group-product2.png" alt="group-product">
					</div>
					<div class="headform-main">
						<div class="headform-title headform-title2">
							<span>Tell us where to send</span> Your Special Offer
						</div>
						<div class="head-form">
							<form id="prospectform">
								<div class="formfeilds">
									<input name="fields_fname" id="fname" type="text" placeholder="First Name" pattern="[a-zA-Z ]{2,}" maxlength="30" required="required">
									<input name="fields_lname" id="lname" type="text" placeholder="Last Name" pattern="[a-zA-Z ]{2,}" maxlength="30" required="required">
									<input name="fields_address1" id="address" type="text" placeholder="Address" required="required">
									<input name="fields_city" id="city" type="text" placeholder="City" pattern="[a-zA-Z ]{2,}" maxlength="50" required="required">
									<input name="fields_state" id="state" type="text" placeholder="State" pattern="[a-zA-Z ]{2,}" maxlength="50" required="required">
									<input name="fields_zip" id="zipcode" type="text" placeholder="Zip" required="required">
									<input name="fields_phone" id="phone" type="text" placeholder="Phone" required="required">
									<input name="fields_email" id="email" type="email" placeholder="Email" required="required">
									<input type="hidden" name="s1" value="<?php echo $s1; ?>">
									<input type="hidden" name="s2" value="<?php echo $s2; ?>">
									<input type="hidden" name="s3" value="<?php echo $s3; ?>">
									<input type="hidden" name="aid" value="<?php echo $aff_id;?>">
									<input type="hidden" name="cid" value="<?php echo $campaign_id; ?>">
								</div>
								<div class="red-button">
									<a class="details_transaction" href="#">Rush
										My Order <span>Same Day Shipping!</span>
									</a>
								</div>
							</form>
							<small>By clicking above, I agree to and understand the terms and
								conditions outlined in our privacy policy and disclaimer of the
								bottom of the page.</small>
						</div>
					</div>
				</div>
			</div>
			<div class="claim-head-button claim-head-button2">
				<img src="images/claimarrow2.png" alt="claim">
			</div>
		</div>
		<div class="row">
			<div class="prog">
				<div class="makeiteasy">
					<span>THE KARDASHIAN APPROVED QUICKTRIM EXTREME BURN KIT</span>
					MAKES IT EASIER FOR YOU
				</div>
				<div class="stack">lose weight & start working towards your goal
					today*</div>
			</div>
			<div class="product-box-main">
				<div class="model-img model-img2">
					<img src="images/model-img.png" alt="model">
				</div>
				<div class="product-box product-box2 clearfix">
					<div class="clearfix">
						<div class="check-img">
							<img src="images/check-img.png" alt="check-img">
						</div>
						<div class="offer-txt">
							QuickTrim® Extreme Burn™ <br />offers advanced
						</div>
					</div>
					<div class="clearfix">
						<div class="extreme-burn">
							<img src="images/extreme-burn-img.png" alt="extreme">
						</div>
						<div class="loss-support">
							<strong> weight loss support.*</strong>
							<p>Using research proven ingredients, Extreme Burn™ safely works
								to help burn calories, curb cravings and increase energy levels!
								This sustained release formula allows for greater absorption and
								controlled release of nutrients providing optimum calorie
								burning.*</p>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<h1>QuickTrim® Extreme Burn™</h1>
				<div class="clearfix">
					<div class="two-third">
						<h2>
							Let QuickTrim®'s Extreme Burn™ <br />be your secret weapon to
							help <span>maximize your weight loss goals.</span>
						</h2>
						<span>Get extreme results and extreme energy with Extreme Burn™!*</span>
						<p>This supplement is a powerful weight loss formula. Using
							research proven ingredients, it safely works to help burn
							calories, curb cravings and increase energy levels. This
							sustained release formula allows for greater absorption and
							controlled release of nutrients providing optimum calorie
							burning.*</p>
					</div>
					<!-- two-third ends here-->
					<div class="one-third">
						<span class="highlight">Supports energy and metabolism*</span> <span
							class="highlight">Powered by nature's super fruits*</span> <span
							class="highlight">Burn more calories than diet & exercise alone*</span>
						<div class="client-img clearfix">
							<img src="images/client-img1.jpg" alt="client-img">
							<img src="images/client-img2.jpg" alt="client-img">
						</div>
					</div>
				</div>
				<div class="solution clearfix">
					<div class="left-img">
						<img src="images/two-model-img.png" alt="model">
					</div>
					<div class="solution-txt">
						<span>QuickTrim may provide results with simplified solutions, to
							help you get the body you desire!</span>
						<p>All QuickTrim® formulas have been synergistically designed to
							work together and complement your lifestyle. Whether you are
							seeking to shed a few vanity pounds, drop a dress size for a
							special occasion or are seeking a long term lifestyle program,
							QuickTrim® formulas are your slimming solutions.*</p>
					</div>
				</div>
				<div class="makethechange">
					Want to accelerate your Weight Loss Program? Combine with healthy
					diet and exercise and <br />
					<strong>MAKE THE CHANGE NOW</strong>
				</div>
			</div>
			<div class="claim-box clearfix">
				<div class="claim">
					<img src="images/bottom-claimarrow.png" alt="bottom-claimarrow">
				</div>
				<div class="clickhere">
					<a href="#"><img src="images/clickhere.png" alt="clickhere"></a>
				</div>
			</div>
			<div class="footer">
				<span>* These statements have not been evaluated by the FDA. This
					product is not intended to diagnose, treat, cure, or prevent any
					disease.</span>
				<div class="clearfix foot-nav">
					<ul class="clearfix">
						<div class="menu-footer-navigation-container">
							<ul id="menu-footer-navigation" class="menu">
								<li id="menu-item-24"
									class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24"><a
									href="privacy.html">Privacy
										Policy</a></li>
								<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25"><a
									href="terms.html">Terms &#038;
										Conditions</a></li>
								<li id="menu-item-27"
									class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a>Contact
										Us: 877.264.8633</a></li>
							</ul>
						</div>
					</ul>
					<div class="copyright">
						Copyright © 2014. All Rights Reserved<br />
						<img src="images/payment-method-img.jpg" alt="payment-method">
					</div>
				</div>
				<p>*This product is not for use by or sale to persons under the age
					of 18. These products should be used only as directed on the label.
					It should not be used if you are pregnant or nursing. Consult with
					a physician before use if you have a serious medical condition or
					use prescription medications. A Doctor's advice should be sought
					before using this and any supplemental dietary product. These
					statements have not been evaluated by the FDA. This product is not
					intended to diagnose, treat, cure or prevent any disease.
					Individual weight loss results will vary and conditions may apply.</p>
				<p>**RISK FREE offer applies to purchases made in the United States
					that are returned within 14 days of initial transaction date.</p>
				<p>Disclaimer: I consent to be contacted by phone and/or text at the
					number provided, including a wireless number using automated
					technology. I understand I am under no obligation to provide
					consent to purchase goods or services.</p>
			</div>

		</div>

</body>
</html>


