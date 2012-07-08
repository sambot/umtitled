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

		$post_html = str_get_html($post_content);

		global $post_title;

		foreach($post_html->find('h1') as $element) {
			$post_title = $element->innertext;
			break;
		}




		
		images($post_content);
		
		echo $GLOBALS['html'];
		
		
		$this_post_date = str_replace($GLOBALS['dropbox_posts_dir'].'/', '', $filepath);
		
		$is_post = false;
		
		if (is_numeric(substr($this_post_date,0,1))) {
		
			post_date($filepath);

			current_url();

			if ($GLOBALS['twitter_comments']) {
				$tweet_this = ' &nbsp; | &nbsp; Comment on <a href="https://twitter.com/intent/tweet?text='.rawurlencode($GLOBALS['post_title']).'%20'.$GLOBALS['current_url'].'%20@moltenbrew" target="_blank">Twitter &rarr;</a>';
			} else {
				$tweet_this = '';
			}
			
			echo ('<footer class="footer_single"><p>Posted on '.$GLOBALS['post_date'].$tweet_this.'</p></footer>');
			
			$is_post = true;
			
		}	
		
		if ($is_post == false) {
			echo ('<footer></footer>');
		}
		
		echo ('</article>');
		
		// CONSIDER KILLING THIS
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
			
			<?php
		}	
	}

?>