<?php 

	function get_site_root() {
		ob_start();
	    include_once('cache/caches/site_root.html');	
	    return ob_get_clean();
	}	
	
?>