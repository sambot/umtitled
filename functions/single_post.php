<?php  

	// Builds out the single post page
	
	function single_post() {
	
		$post_url_title = $_SERVER['QUERY_STRING'];
	
		if ($GLOBALS['use_dropbox'] == 'yes') {
			
			//$html = file_get_html($GLOBALS['dropbox_posts_page']);
			$html = file_get_html('cache/caches/scraped.html');
			
			foreach($html->find('.filename-link') as $element) {
				$md = $element->href;
				$md = preg_replace('#.*/#', '', $md);
				$filepaths[] = $GLOBALS['dropbox_posts_dir'].'/'.$md;
			}
			
			// print_r($filepaths);exit;
			
			$post_index = preg_grep('#.*'.$post_url_title.'.*\.md#', $filepaths);
			
			$filepath = print_r($post_index, true);
			$filepath = preg_replace('#Array\s\(\s.*http#', 'http', $filepath);
			$filepath = preg_replace('#\s\)#', '', $filepath);
			$filepath = preg_replace('#\s#', '', $filepath);
		
			$post_content = file_get_contents($filepath);
		
		} else {
			$filepath = glob($GLOBALS['posts_dir'].'/*'.$post_url_title.'.md');
			$post_content = file_get_contents($filepath[0]);
		}
		
		echo ('<article>');
		
		$post_content = Markdown($post_content);
		
		images($post_content);
		
		echo $GLOBALS['html'];
		
		
		$this_post_date = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $filepath);
		
		$is_post = false;
		
		if (is_numeric(substr($this_post_date,0,1))) {
		
			post_date($filepath);
			
			echo ('<footer><p>Posted on '.$GLOBALS['post_date'].'</p></footer>');
			
			$is_post = true;
			
		}	
		
		if ($is_post == false) {
			echo ('<footer></footer>');
		}
		
		echo ('</article>');
		
		if ($GLOBALS['comments'] && $is_post) {
			?>
			
				<div id="disqus_thread"></div>
				<script type="text/javascript">
				    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				    var disqus_shortname = '<?php echo ($GLOBALS['disqus_shortname']); ?>'; // required: replace example with your forum shortname
				    var disqus_developer = 1;
				
				    /* * * DON'T EDIT BELOW THIS LINE * * */
				    (function() {
				        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
			
			<?php
		}	
	}

?>