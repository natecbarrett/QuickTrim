<?php
session_start();

$order_id 				= $_GET['order_id'];
$session_order_id 		= $_SESSION['qt_orderid'];

//Get the users ip address.
$ip = $_SERVER["REMOTE_ADDR"];


if (!$order_id || !$session_order_id || ($order_id != $session_order_id))
{
	header("Location: index.php");
	exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en" lang="en">
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
<title>Upsell Item 1 | QuickTrim Diet and Beauty</title>
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/><![endif]-->
<link rel="stylesheet" href="css/style.css">
<link href="css/media.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 8]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script>
	$(document).ready(function(){


		$(".newupsell_submit").click(function(e) {
			e.stopPropagation();
			e.preventDefault();

		});

		$(".nothanks-button").click(function(e) {
			e.stopPropagation();
			e.preventDefault();
			window.location = "upsell_2.php";
		});
	});
</script>
</head>
<body>
<div id="fp">
<?php if ($_SESSION['qt_fp'] == 1 && isset($order_id)) { $_SESSION['qt_fp'] = 0; echo '<iframe src="https://afftrkca.com/p.ashx?o=459&t=' . $order_id . '" height="1" width="1" frameborder="0"></iframe>'; } ?>
</div>
	<div id="page" >
         <div id="header" class="upsellheader">
             <div class="head clearfix">
                 <div class="head-left">
                    <img src="images/upsell-girl-group.png" alt="thanku-girl-group">
                 </div>
                 <div class="head-mid">
                     <div class="logo"><a href="javascript:void(0);"><img src="images/logo-img.png" alt="logo-img"></a></div>
                     <div class="head-main-text">
                          <img src="images/upsell-head-main-txt.png" alt="upsell-head-main-txt">
                     </div>
                     <div class="whatnext-img"><img src="images/whatnext-img.png" alt="whatnext-img"></div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="upsell-main">
                 <div class="upsell-product">
                    <div class="clearfix">
                      <div class="upsell-product-left">
                          <div class="upsell-product-name">
                              <h1>celluslim</h1>
                              <span>body sculpting gel</span>
                          </div>
                          <div class="upsell-product-speciality">
                              <span>fights stubborn cellulite*</span>
                              <span>helps tone, smoothe, and firm skin* </span>
                              <span>hELPS REDUCE ROUGHNESS*</span>
                          </div>
                      </div> <!-- upsell-product-left ends here-->
                      <div class="upsell-product-right"><img src="images/hanging-special-offer1.png" alt="hanging-special-offer"></div>
                    </div> <!-- clearfix ends here-->
                    <div class="upsell-model-img"><img src="images/upsell-model-img.png" alt="model-img"></div>
                    <div class="upsell-cellusim-img"><img src="images/celluslim-img.png" alt="cellusim-img"></div>
                 </div> <!-- upsell-product ends here-->
                 <div class="round-arrow"><img src="images/round-arrow-img.png" alt="round-arrow-img"></div>
                 <div class="customer-review">
                     <div class="satisfied-customer">
                        <h2>SATISFIED CUSTOMERS</h2>
                        <div class="clearfix testimonial-common">
                         <div class="testimonial clearfix">
                            <div class="client-review">QuickTrim is Awesome! I was shocked by the amazing results that i saw, one of the best products I've tried.</div>
                            <span><small>Michelle F </small> West Palm Beach, FL </span>
                         </div>
                         <div class="testimonial clearfix">
                            <div class="client-review">I've tried many products and QuickTrim has by far work thes best for me. Great way to jump start any weight loss or diet program. </div>
                            <span><small>Pamela G</small> New York City, NY </span>
                         </div> <!-- testimonial ends here-->
                     </div>
                     </div>
                     <div class="clearfix">
                         <div class="product-price-detail">

						<form name='upsellform1' id='upsellform1'>
						</form>

                             <span>was</span>
                             <span class="oldprice">$60.00</span>
                             <span class="nowonly">now only</span>
                             <span class="newprice">$30.00</span>
                             <div class="buythisproduct">
                                 <a href="#" id="newupsell_submit" class="newupsell_submit">
                                   <span><img src="images/icon-cart.png" alt="icon-cart"></span>
                                   buy THIS PRODUCT
                                 </a>
                             </div>
                             <div><img src="images/big-payment-method-img.jpg" alt="big-payment-method-img"></div>
                             <div class="clearfix">

                                <div class="nothanks-button"><a href="#">No Thanks</a></div>
                             </div>
                         </div>
                         <div class="final-product-img">
                             <img src="images/celluslim-img.png" alt="celluslim-img">
                         </div>
                     </div>
                 </div> <!-- customer-review ends here-->
             </div> <!-- upsell-main ends here-->

<div class="footer">
	 <span>* These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.</span>
	 <div class="clearfix foot-nav">
			 <ul class="clearfix">

				<div class="menu-footer-navigation-container"><ul id="menu-footer-navigation" class="menu"><li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24"><a href="privacy.html">Privacy Policy</a></li>
<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25"><a href="terms.html">Terms &#038; Conditions</a></li>
<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a>Contact Us: 877.264.8633</a></li>
</ul></div>
			 </ul>
			 <div class="copyright">
					 Copyright © 2014. All Rights Reserved<br/>
					<img src="images/payment-method-img.jpg" alt="payment-method">
			 </div>
	 </div>
	 <p>*This product is not for use by or sale to persons under the age of 18. These products should be used only as directed on the label. It should not be used if you are pregnant or nursing. Consult with a physician before use if you have a serious medical condition or use prescription medications. A Doctor's advice should be sought before using this and any supplemental dietary product. These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure or prevent any disease. Individual weight loss results will vary and conditions may apply.</p>
	 <p>**RISK FREE offer applies to purchases made in the United States that are returned within 14 days of initial transaction date.</p>
	 <p>Disclaimer: I consent to be contacted by phone and/or text at the number provided, including a wireless number using automated technology. I understand I am under no obligation to provide consent to purchase goods or services.</p>
</div>         </div>
</div>
		</body>
</html>


