
	</div>
	
	<footer>
		<p><?php echo($footer); ?></p>
		
		<div id="credit">
			
			<div id="search">
				<input placeholder="Search" type="text" id="q" onkeydown="if (event.keyCode == 13) { googlesearch(); }">
				<button onclick="googlesearch();">Go</button>
				
				<script type="text/javascript">
				    function googlesearch() {
				    	var searchterm = document.getElementById('q').value;
				    	var searchurl = 'https://www.google.com/search?q=site:<?php echo $site_root; ?>+' + searchterm;
				    	window.location = searchurl;
				    }
				</script>
			</div>
			
			<p>&copy; <?php echo(date("Y").' '.$site_title); ?> | Powered by <a href="#">Umtitled</a></p>
			
		</div>
	</footer>
</body>
</html>