			<footer class="footer" role="contentinfo">
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?>
					<a href="//wordpress.org">WordPress</a> &amp; <a href="//html5blank.com">HTML5 Blank</a>.
				</p>
			</footer>
		</div>
		<?php
		global $options;
		wp_footer();
		if(!empty($options['advd']['custom_css'])){
			echo ($options['advd']['custom_css']!==' ') ? '<style>'.htmlspecialchars_decode($options['advd']['custom_css']).'</style>' : null;
		}
		if(!empty($options['advd']['custom_js'])){
			echo ($options['advd']['custom_js']!==' ') ? '<script>'.htmlspecialchars_decode($options['advd']['custom_js']).'</script>' : null;
		}
		if(!empty($options['advd']['custom_js_tag'])){
			echo ($options['advd']['custom_js_tag']!==' ') ? str_replace('\"', '"', $options['advd']['custom_js_tag']) : null;
		}
		if(!empty($options['advd']['custom_noscript'])){
			echo ($options['advd']['custom_noscript']!==' ') ? '<noscript>'.str_replace('\\\'', '\'', $options['advd']['custom_noscript']).'</noscript>' : null;
		}
		?>
	</body>
</html>
