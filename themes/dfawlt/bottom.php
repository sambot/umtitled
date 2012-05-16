
	</div>
	
	<footer>
		<p><?php echo($footer); ?></p>
		
		<div id="credits">
		
			<p id="copyright">&copy; <?php echo(date("Y").' '.$site_title); ?></p>
			<p id="um_link">Powered by <a href="http://umtitled.org/">Umtitled</a></p>
			
		</div>
	</footer>
	
	<?php  
	
		if ($ggl_analytics_id) { ?>
			<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', '<?php echo	$ggl_analytics_id ?>']);
			  _gaq.push(['_trackPageview']);
			
			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();
			
			</script>
	
	<?php } ?>
	
</body>
</html>