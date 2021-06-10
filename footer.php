<?php



?>

	<footer>
		<div class="footer">
		<div class="footer-pad">
			
			<div class="footer-d">
				<div class="footer-logo"></div>
			</div>
			<div class="footer-d">
				About<br><br>
				<a href="<?php if($page=='index'){echo '#how-it-works';}else{echo 'index.php#how-it-works';} ?>" style="text-decoration: none;"><span class="foo-link">How it Works</span></a>
				<br>
				<a href="faq.php" style="text-decoration: none;"><span class="foo-link">FAQs</span></a>
			</div>
			<div class="footer-d">
				<a href="about.php" style="text-decoration: none;color: inherit;">Company</a>
				<br>
				<br>
				<span class="foo-link">Careers</span><br>
				<span class="foo-link">Locations</span><br>
			</div>
			<div class="footer-d">
				Support
				<br>
				<br>
				<span class="foo-link">+2348065121145</span><br>
				<span class="foo-link">+2348065121145</span><br>
				<span class="foo-link">support@swiftpay.com.ng</span><br>
			</div>
			<div class="footer-d">
				Download SP
				<br>
				<br>
			<div class="plays-item" style="font-size: 13px !important;width: 120px;">
				<div class="pl-s-img" style="width: 30px;height: 30px;"></div>
				Get it on<div class="p-it-b" style="font-size: 16px !important">PlayStore</div>
			</div>
				<div class="plays-item" style="font-size: 13px !important;width: 120px;">
				<div class="pl-s-img" style="width: 30px;height: 30px;background: url(images/appstore-icon.png) center no-repeat;background-size: contain;"></div>
				Get it on<div class="p-it-b" style="font-size: 16px !important">AppStore</div>
			</div>
			</div>

			<div class="clearfix"></div>
			<div class="footer-hr"></div>

			<div class="footer-c-w-u">Connect With Us

				<div style="background: url(images/twitter-logo.png) center no-repeat;background-size: contain;" class="footer-icon"></div>
				<div style="background: url(images/instagram-logo.png) center no-repeat;background-size: contain;" class="footer-icon"></div>
				<div style="background: url(images/whatsapp-logo.png) center no-repeat;background-size: contain;" class="footer-icon"></div>
				<div style="background: url(images/facebook-letter-logo.png) center no-repeat;background-size: contain;" class="footer-icon"></div>

			</div>

		</div>
			<div class="footer-copy">Copyright Octacode Technologies Limited</div>
		</div>
	</footer>
</body>
<script type="text/javascript">
			if(window.innerWidth<901){
		$('#navShow').hide();
	}

function hamburger() {
			$('#navShow').slideToggle(300);
			$('.nav').css('background','#ec5756');
}

<?php if ($page=='index') {echo "
			$('.nav').css('background','#ec5756');";
		} ?>


<?php if ($page!=='index') {
	?>


		var color='white';
		$(window).bind('scroll', function(){
			if($(window).scrollTop()>100 && color=='white'){
				$('.nav').css('background','#ec5756');
				color='red';
			}if($(window).scrollTop()<100 && color=='red'){
				color='white';
				$('.nav').css('background', '');
			}
		});

<?php } ?>
</script>
</html>