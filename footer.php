		<?php wp_footer(); ?>
		<a href="#" class="scrollToTop"></a>
	 	<script>
			jQuery(document).euCookieLawPopup().init({ 
			  cookiePolicyUrl : '<?php _e('http://www.wimagguc.com/?cookie-policy', 'the-theme')?>', 
			  popupPosition : 'bottom', 
			  popupTitle : '<?php _e('This website is using cookies', 'the-theme')?>', 
			  popupText : '<?php _e('We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, well assume that you are happy to receive all cookies on this website.', 'the-theme')?>', 
			  buttonContinueTitle : '<?php _e('Continue', 'the-theme')?>', 
			  buttonLearnmoreTitle : '<?php _e('Learn more', 'the-theme')?>'
			});		 	
	 	</script>
	</body>
</html>