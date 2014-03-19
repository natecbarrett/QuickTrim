<?php
session_start();
$prospect_id 			= $_GET['prospectid'];
$session_prospect_id 	= $_SESSION['qt_prospectid'];

if (!$prospect_id || !$session_prospect_id || ($prospect_id != $session_prospect_id))
{
	header("Location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en"
	lang="en">
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
<meta
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"
	name="viewport">
<title>Checkout | QuickTrim Diet and Beauty</title>
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/><![endif]-->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 8]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/media.css" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script>
		$(document).ready(function(){

			$('.product-content .check').click(function(){
				var main_div = $(this).closest('.product-detail');
				$('.product-content .check').not(this).find('img.checked').each(function(){
					$(this).closest('.product-detail').removeClass('product-selected');
					$(this).closest('.product-detail').find('.select-package a').html('Select package');
					$('.product-content .check').find('input[type="checkbox"]').attr('checked', false);
					$('.product-content .check').find('img').removeClass('checked');
					$('.product-content .check').find('img').attr('src', 'images/uncheck-box.png');
				});

				if ($(this).find('img').hasClass('checked'))
				{
					main_div.removeClass('product-selected');
					main_div.find('.select-package a').html('Select package');
					$(this).find('input[type="checkbox"]').attr('checked', false);
					$(this).find('img').removeClass('checked');
					$(this).find('img').attr('src', 'images/uncheck-box.png');

				}
				else
				{
					main_div.addClass('product-selected');
					main_div.find('.select-package a').html('Selected');
					$(this).find('input[type="checkbox"]').attr('checked', true);
					$(this).find('img').addClass('checked');
					$(this).find('img').attr('src', 'images/check-box.png');

					var tmp = jQuery(this).find('input[type="checkbox"]').val();

					if (tmp == "147")
					{
						$("#product_name").val("QT - Extreme Burn - 3 Month");
						$("#custom_product").val("71");
						$("#custom_product_price").val("147.0000");
						$("#shipping").val("1");
					}

					else if (tmp == "98.0000")
					{
						$("#product_name").val("QT - Extreme Burn - 2 Month");
						$("#custom_product").val("69");
						$("#custom_product_price").val("98.0000");
						$("#shipping").val("1");
					}

					else if (tmp == "54.9500")
					{
						$("#product_name").val("QT - Extreme Burn - 1 Month");
						$("#custom_product").val("67");
						$("#custom_product_price").val("54.9500");
						$("#shipping").val("1");
					}

				}

				get_values();

			});

			function get_values()
			{

				var p_shippingamount = 0.00;
				var p_saving = 0.00;
				var p_cost = 0.00;
				var p_retailprice = 0.00;

				$('.product-content').each(function() {

					var main_div = $(this);
					$(this).find('input[type="checkbox"]').each(function(){

						if ($(main_div).find('input[type="checkbox"]').is(':checked'))
						{

							p_shippingamount += parseFloat($(main_div).find('input[name="p_shippingamount"]').val());
							p_saving += parseFloat($(main_div).find('input[name="p_saving"]').val());
							p_cost += parseFloat($(main_div).find('input[name="p_cost"]').val());
							p_retailprice += parseFloat($(main_div).find('input[name="p_retailprice"]').val());
						}
					});
				});

				if (p_shippingamount == 0)
				{
					$('.shipping_type').html('Free Priority Shipping');
				}
				else
				{
					$('.shipping_type').html('Priority Shipping');
				}

				var total_cost_shipping = p_cost + p_shippingamount;

				$('.total_shipping').html('$'+p_shippingamount.toFixed(2));
				$('.total_cost').html('$'+total_cost_shipping.toFixed(2));
				$('.total_retail').html('Retail: $'+p_retailprice.toFixed(2));
				$('.total_saving em').html('You Save $'+p_saving.toFixed(2));
			}


			$(".rushorder-button").click(function(){

				event.preventDefault();
		    	var check = $("#orderform :input").validator();
		    	if (check.data("validator").checkValidity()==true)
		    	{
		    		var month_value = $('.cardmonth').val();
	      			var year_value = $('.cardyear').val();

	      			$('.cc_expires').val(month_value +  year_value);

		    		$.ajax({
		  			  type: "POST",
		  			  url: "submission/order.php",
		  			  data: $("#orderform").serialize()
		  			}).done(function (response, textStatus, jqXHR){
						var response = jQuery.parseJSON(response);
						if (response.success == "true")
						{
							window.location = "upsell_1.php";
						}

						else
						{
							alert(response.message);
						}
		  	  		});
		    	}
			});

			jQuery('#chk1').click();

		});

	</script>
</head>


<body>
	<div id="page">
		<div class="row">
			<div class="checkout-header clearfix">
				<div class="checkout-logo">
					<img src="images/checkout-logo.png" alt="checkout-logo">
				</div>
				<div class="secured">
					<img src="images/secured-img.png" alt="secured-img">
				</div>
			</div>
			<div id="checkout-main">
				<div class="clearfix">
					<form id='orderform'>
						<div class="checkout-left-content">
							<div class="product-detail">
								<div class="product-heading clearfix">
									<h2>
										Buy 3 Months & <span style="font-style: italic">Get 2 FREE!</span>
									</h2>
									<div class="freeshipping">Free Shipping</div>
								</div>
								<div class="product-content clearfix">
									<div class="check">
										<img src="images/uncheck-box.png" alt="check">
										<input style="display: none;" class="checkbox" type="checkbox" value="147" name="extra" id="chk1" />
									</div>
									<input type="hidden" name="p_retailprice" class="p_retailprice" value="366.00" />
									<input type="hidden" name="p_saving" class="p_saving" value="219.00" />
									<input type="hidden" name="p_shippingamount" class="p_shippingamount" value="0.00" />
									<input type="hidden" name="shipping" value="0.00" />
									<input type="hidden" name="p_cost" class="p_cost" value="147.00" />
									<input type="hidden" id="custom_product" name="custom_product" value="71" />
									<input type="hidden" id="custom_product_price" name="custom_product_price" value="147.0000" />
									<div class="checkout-product-img">
										<img src="images/threemonth.png" alt="page4-product-threemonth-img">
									</div>
									<div class="product-info">
										<h4>Best Seller*</h4>
										<p>5 Month Premium Plan!</p>
										<div class="price-box">
											<div class="clearfix">
												<span class="prize">$29</span>
												<div class="small-change">
													.40
													<div class="per-bottle">each</div>
												</div>
											</div>
										</div>
										<div class="clearfix">
											<span class="unit">Total $147 </span>
										</div>
									</div>
								</div>
							</div>
							<div class="product-detail">
								<div class="product-heading clearfix">
									<h2>
										Buy 2 Months & <span style="font-style: italic">Get 1 FREE!</span>
									</h2>
									<div class="freeshipping">Free Shipping</div>
								</div>
								<div class="product-content clearfix">
									<div class="check">
										<img src="images/uncheck-box.png" alt="check">
										<input style="display: none;" class="checkbox" type="checkbox" value="98.0000" name="extra" />
									</div>
									<input type="hidden" name="p_retailprice" class="p_retailprice" value="222.00" />
									<input type="hidden" name="p_saving" class="p_saving" value="124.00" />
									<input type="hidden" name="p_shippingamount" class="p_shippingamount" value="0.00" />
									<input type="hidden" name="p_cost" class="p_cost" value="98.00" />
									<div class="checkout-product-img">
										<img src="images/twomonths.png" alt="page4-product-twomonth-img">
									</div>
									<div class="product-info pushdown">
										<h4></h4>
										<p>3 Month Discount Plan!</p>
										<div class="price-box">
											<div class="clearfix">
												<span class="prize">$32</span>
												<div class="small-change">
													.67
													<div class="per-bottle">each</div>
												</div>
											</div>
										</div>
										<div class="clearfix">
											<span class="unit">Total $98</span>
										</div>
									</div>
								</div>
							</div>
							<div class="product-detail">
								<div class="product-heading clearfix">
									<h2>Buy 1 Month</h2>
								</div>
								<div class="product-content clearfix">
									<div class="check">
										<img src="images/uncheck-box.png" alt="check">
										<input style="display: none;" class="checkbox" type="checkbox" value="54.9500" name="extra" />
									</div>
									<input type="hidden" name="p_retailprice" class="p_retailprice" value="69.00" />
									<input type="hidden" name="p_saving" class="p_saving" value="20.00" />
									<input type="hidden" name="p_shippingamount" class="p_shippingamount" value="5.95" />
									<input type="hidden" name="p_cost" class="p_cost" value="49.00" />
									<div class="checkout-product-img onemonth">
										<img src="images/onemonth.png" alt="product-onemonth-img">
									</div>
									<div class="product-info pushdown">
										<p>1 Month Starter Plan</p>
										<div class="clearfix">
											<span class="prize third-box">$49 <em style="text-decoration: none; padding-top: 10px;">Plus Shipping</em></span>
										</div>
									</div>
								</div>
							</div>
							<div class="moneyback-guarantee clearfix">
								<div class="shipping-detail">
									<div>
										<div class="clearfix">
											<span class="lbl">Shipping Type:</span> <span
												class="feild shipping_type">FREE Priority Shipping</span>
										</div>
										<div class="clearfix">
											<span class="lbl">Shipping Price:</span> <span
												class="feild total_shipping">$0.00</span>
										</div>
										<div class="clearfix">
											<span class="lbl">Your Total:</span> <span
												class="feild total_cost">$0.00</span>
										</div>
										<div class="clearfix">
											<span class="lbl total_retail">Retail: $0.00:</span> <span
												class="feild total_saving"><em>You Save $0.00</em></span>
										</div>
									</div>
								</div>
								<div class="moneyback-img">
									<img src="images/us-postal-service-img.jpg" alt="us-postal-service-img">
								</div>
							</div>
							<div class="footer checkout-footer">
								<div class="clearfix foot-nav">
									<ul class="clearfix">
										<div class="menu-footer-navigation-container">
											<ul id="menu-footer-navigation" class="menu">
												<li id="menu-item-24"
													class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24"><a
													href="privacy.html">Privacy
														Policy</a></li>
												<li id="menu-item-25"
													class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25"><a
													href="terms.html">Terms &#038;
														Conditions</a></li>
												<li id="menu-item-27"
													class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a>Contact
														Us: 877.264.8633</a></li>
											</ul>
										</div>
									</ul>
								</div>
								<p>*This product is not for use by or sale to persons under the
									age of 18. These products should be used only as directed on
									the label. It should not be used if you are pregnant or
									nursing. Consult with a physician before use if you have a
									serious medical condition or use prescription medications. A
									Doctor's advice should be sought before using this and any
									supplemental dietary product. These statements have not been
									evaluated by the FDA. This product is not intended to diagnose,
									treat, cure or prevent any disease. Individual weight loss
									results will vary and conditions may apply.</p>
								<p>**FREE Bottle Offer is valid only on the 2 Bottle and 3
									Bottle promotions only. See next page for details of savings,
									but get up to 2 free bottles with qualified purchase.</p>
							</div>
						</div>
						<div class="checkout-right-content">
							<div class="headform-title">
								final step<span>payment information</span>
							</div>
							<div class="checkoutform">
								<div class="checkoutform-feild">
									<input name="card_holder" type="text" value="" placeholder="Card Holder">
									<select id="CardType" name="cc_type">
										<option value="">--Select--</option>
										<option value="visa">Visa</option>
										<option value="master">MasterCard</option>
										<option value="amex">American Express</option>
										<option value="Discover">Discover</option>
									</select> 
									<input id="CardNumber" name="cc_number" type="text" value="" placeholder="Credit Card Number">
									<span class="feild-half">
										<label>Expiration Date</label> 
										<select id="cardmonth" name="fields_expmonth" class="cardmonth">
											<option value="">Month</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
										<select id="cardyear" name="fields_expyear" class="cardyear">
											<option value="">Year</option>
											<option value="13">2013</option>
											<option value="14">2014</option>
											<option value="15">2015</option>
											<option value="16">2016</option>
											<option value="17">2017</option>
											<option value="18">2018</option>
											<option value="19">2019</option>
											<option value="20">2020</option>
											<option value="21">2021</option>
											<option value="22">2022</option>
											<option value="23">2023</option>
											<option value="24">2024</option>
											<option value="25">2025</option>
										</select>
									</span> 
									<span class="feild-half">
									<input id="carverirynum" name="cc_cvv" type="text" value="" placeholder="CVV">
									<input type="hidden" id="cc_expires" name="cc_expires" class="cc_expires" /> 
									<small> 
										<a target="_blank" href="cvv-help.html">What is this?</a>
									</small>
									</span>
								</div>
								<div class="red-button">
									<a class="rushorder-button" href="javascript:void(0);">Rush My
										order <span>same day shipping!</span>
									</a>
								</div>

								<div class="sponsors">
									<span class="txt-secure">
										<img src="images/lock-img.png" alt="lock">
										This is a secure <em>128 BIT SSL</em> connection.
									</span>
									<img src="images/sponsor-img1.png" alt="sponsor"> 
									<img src="images/sponsor-img2.png" alt="sponsor">
									<img src="images/sponsor-img3.png" alt="sponsor">
									<img src="images/sponsor-img4.png" alt="sponsor">
									<span class="payment-card">
										<a href="#">
											<img src="images/payment-method-img.jpg" alt="payment-method">
										</a>
									</span>
								</div>
							</div>
							<div class="checkout-model">
								<img
									src="https://www.quicktrimoffer.com/wp-content/themes/quicktrim/images/two-model-img.png"
									alt="checkout-model-img">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

</body>
</html>


