<?php 

require_once("inc/conn.php"); 
require_once("inc/functions.php"); 

$page='faq';
include_once('header.php');
?>
		
	<div class="gradient wallpaper">
		<div class="walltext">
		<div class="wall-text1">Frequently Asked Questions</div>
		<div class="wall-text2"></div>
		</div>
	</div>


	<div class="s-content">
	<div class="s-content-pad">

		<div class="faq-txt">
			<div class="about-txt-pad">

			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">What is SwiftPay?</div>
			<div class="clearfix"></div>
			</div>

			<div class="faq-a">
			SwiftPay is a robust mobile and web application that allow customers access their bank accounts directly via their mobile phone to make simple, convenient, easy and secure payments to Merchants.
			</div>

			<br>
			<br>

			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">Why should i use SwiftPay?</div>
			<div class="clearfix"></div>
			</div>
			<div class="faq-a">
			SwiftPay is a better alternative than the traditional Cash and Point of Sale Systems that uses cards, it ensures faster transaction process, debt management between you and your customers and enshrined the nation’s cashless policies. As a merchant, you do not need the hassles of handling cash or extra charges on the POS.
			</div>
			<br>
			<br>
			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">How do i start using SwiftPay?</div>
			<div class="clearfix"></div>
			</div>
			<div class="faq-a">
			As a merchant, you will visit our website, www.swiftpay.com.ng to sign up with all your valid details, these details are sent to our database in a secured manner over any network. After a successful sign up, we generate a unique Merchant ID and a Quick Response(QR) code for you.
			The unique Merchant ID and Quick Response Code will be displayed in front of your store and Customers are either encouraged to scan the QR code or pay via the Merchant ID or log into the application to complete the payment.
			</div>
			<br>
			<br>


			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">Who can use it?</div>
			<div class="clearfix"></div>
			</div>
			<div class="faq-a">
			This application can be used by any merchant with a valid business in Nigeria on our platform.
			</div>
			<br>
			<br>


			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">Will I be charged for using the application?</div>
			<div class="clearfix"></div>
			</div>
			<div class="faq-a">
			There shall be no charging cost to the merchant for using our platform.
			</div>
			<br>
			<br>


			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">How will i confirm Payments made to me via the application?</div>
			<div class="clearfix"></div>
			</div>

			<div class="faq-a">
			Merchant’s accounts are instantly credited while the customer’s account is being debited, the merchant would receive six notifications via Email, Phone SMS, Google notifications from us and the transacting bank(provided the  merchant signed up for those services).
			</div>
			<br>
			<br>


			<div class="faq-h">
				<div class="add-song"></div> 
				<div class="faq-h-txt">What if i have more information for clarification?</div>
			<div class="clearfix"></div>
			</div>
			<div class="faq-a">
			Send an email to us at info@swiftpay.com or enquiries@swiftpay.com.
			You can also reach us on these phone numbers: 08065121145 or 08079985865.
			</div>
			<br>
			<br>
		</div>
		</div>

				<script>
			$('.faq-a').hide();
			$('.faq-h').click(function() {
				$(this).next().slideToggle(200);
			});
			</script>


		<div class="clearfix"></div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

	</div>
	</div>


	<br>
	<br>
	<br>
	<br>		

<?php include_once('footer.php'); ?>