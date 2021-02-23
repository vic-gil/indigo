<?php
/**
 * Lokura: Feed
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

/**
 * Agrega campos al feed de reporte indigo
 *
 */
function rewrite_feed_content($content) {
	if(!is_feed())
		return $content;

	$format_rss 			= '';
	if(is_feed()) {
		global $post;
		$ID  				= $post->ID;
		$post_author 		= $post->post_author;
		$post_title 		= $post->post_title;
		$post_content 		= $content; //$post->post_content;
		$guid 				= $post->guid;
		$post_date 			= $post->post_date;
		$post_modified 		= $post->post_modified;
		$link_canonical 	= get_permalink($ID);

		$post_date 			= new DateTime($post_date);
		$format_date1 		= $post_date->format('F dS, g:i A');
		$format_date2 		= $post_date->format('c');

		$post_modified 		= new DateTime($post_modified);
		$format_modified1 	= $post_modified->format('F dS, g:i A');
		$format_modified1 	= $post_modified->format('c');

		// Autor
		$author_name 		= "Indigo Staff";

		if(intval($post_author) > 0){
			$author 		= get_user_meta(intval($post_author));
			$author_name 	= trim($author["first_name"][0]." ".$author["last_name"][0]);

			if(empty($author_name)){
				$author 	= get_userdata(intval($post_author));
				$author_name = trim($author->first_name." ".$author->last_name);
			}

			if(empty($author_name))
				$author_name = "Indigo Staff";
		}
		

		// Imagen destacada
		$thumbnail 			= '';
		if( has_post_thumbnail( $ID )) {
			$thumb_ID 		= get_post_thumbnail_id( $ID );
    		$details 		= wp_get_attachment_image_src($thumb_ID, 'full');
    		$imagen 		= get_post( $thumb_ID );

    		$type 			= '';
    		$desc 			= '';

    		if(is_object($imagen)){
    			$title 		= $imagen->post_title;
    			$excerpt 	= $imagen->post_excerpt;

    			$type 		= $imagen->post_mime_type;
    			$desc 		= implode(",", array($title, $excerpt));
    		}

    		if( is_array($details) ) {
    			$thumbnail 	= 	'<figure><img src="'.$details[0].'" /><figcaption>'.$desc.'</figcaption></figure>';
    		}
		}

		// Videos JWPlayer
		$media_id 			= get_post_meta($ID, '_mediaid_jwp_meta', TRUE );
		$jwplayer 			= '';
		if(!empty($media_id)){
			$media_id 		= explode(",", $media_id);

			$jwplayer 		= 	'<figure class="op-interactive">';
			foreach ($media_id as $km => $m)
				$jwplayer 	.= 		'<div style="position:relative; padding-bottom:62.5%; overflow:hidden;"><iframe src="https://cdn.jwplayer.com/players/'.$m.'-ixhD10k3.html" style="width:100%; height:100%;" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>';
			
			$jwplayer 		.= 	'</figure>';
		}

		// Analytics
		/*$analytics 			= 	'<figure class="op-tracker">
								  	<iframe>
									  	<script async="async" src="https://www.googletagmanager.com/gtag/js?id=UA-5285176-1"></script>
									  	<script>
									    	window.dataLayer = window.dataLayer || [];
									    	function gtag(){dataLayer.push(arguments)};
									    	gtag("js", new Date());
									    	gtag("set", "page_title", "FBIA: "+ia_document.title);
									    	gtag("set", "campaignSource", "Facebook");
									    	gtag("set", "campaignMedium", "Social Instant Article");
									    	gtag("config", "UA-5285176-1");
											var _comscore = _comscore || [];
											_comscore.push({ c1: "2", c2: "19249540" });
											(function() {
												var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
												s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
												el.parentNode.insertBefore(s, el);
											})();
										</script>
										<noscript>
											<img src="http://b.scorecardresearch.com/p?c1=2&c2=19249540&cv=2.0&cj=1" />
										</noscript>
								  	</iframe>
								</figure>';*/
		$analytics 			= 	'<figure class="op-tracker"><iframe><script async="async" src="https://www.googletagmanager.com/gtag/js?id=UA-5285176-1"></script><script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments)}; gtag("js", new Date()); gtag("set", "page_title", "FBIA: "+ia_document.title); gtag("set", "campaignSource", "Facebook"); gtag("set", "campaignMedium", "Social Instant Article"); gtag("config", "UA-5285176-1"); var _comscore = _comscore || [];_comscore.push({ c1: "2", c2: "19249540" });(function() {var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";el.parentNode.insertBefore(s, el);})();</script><noscript><img src="http://b.scorecardresearch.com/p?c1=2&c2=19249540&cv=2.0&cj=1" /></noscript></iframe></figure>';

		/*$ad 				= 	'<figure class="op-ad">
									<iframe height="250" width="300">
										<script type="application/javascript" src="//ced.sascdn.com/tag/1056/smart.js" async></script>
										<script type="application/javascript">
										    var sas = sas || {};
										    sas.cmd = sas.cmd || [];
										    sas.cmd.push(function() {
										        sas.setup({ networkid: 1056, domain: "//www5.smartadserver.com", async: true });
										    });
										</script>
										<div id="sas_36705"></div>
										<script type="application/javascript">
										    sas.cmd.push(function() {
										        sas.call("std", {
										            siteId: 70494,
										            pageId: 535121,
										            formatId: 36705,
										            target: ""
										        });
										    });
										</script>
										<noscript>
										    <a href="//www5.smartadserver.com/ac?jump=1&nwid=1056&siteid=70494&pgname=incio&fmtid=36705&visit=m&tmstp=[timestamp]&out=nonrich" target="_blank">
										        <img src="//www5.smartadserver.com/ac?out=nonrich&nwid=1056&siteid=70494&pgname=incio&fmtid=36705&visit=m&tmstp=[timestamp]" border="0" alt="" />
										    </a>
										</noscript>
									</iframe>
								</figure>';*/
		$ad 				= 	'<figure class="op-ad"><iframe height="250" width="300"><script type="application/javascript" src="//ced.sascdn.com/tag/1056/smart.js" async></script><script type="application/javascript">var sas = sas || {};sas.cmd = sas.cmd || [];sas.cmd.push(function() { sas.setup({ networkid: 1056, domain: "//www5.smartadserver.com", async: true });});</script><div id="sas_36705"></div><script type="application/javascript">sas.cmd.push(function() {sas.call("std", {siteId: 70494,pageId: 535121,formatId: 36705,target: ""});});</script><noscript><a href="//www5.smartadserver.com/ac?jump=1&nwid=1056&siteid=70494&pgname=incio&fmtid=36705&visit=m&tmstp=[timestamp]&out=nonrich" target="_blank"><img src="//www5.smartadserver.com/ac?out=nonrich&nwid=1056&siteid=70494&pgname=incio&fmtid=36705&visit=m&tmstp=[timestamp]" border="0" alt="" /></a></noscript></iframe></figure>';


		/*$html 				= 	'<!doctype html>
								<html lang="es" prefix="op: http://media.facebook.com/op#">
								  	<head>
								    	<meta charset="utf-8">  
								    	<link rel="canonical" href="'.$link_canonical.'">
								    	<meta property="op:markup_version" content="v1.0">
								    	<meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default">
								  	</head>
								  	<body>
								    	<article>
								      		<header>
								        		<h1>'.$post_title.'</h1>
								        		<time class="op-published" datetime="'.$format_date2.'">'.$format_date1.'</time>
								        		<time class="op-modified" dateTime="'.$format_modified1.'">'.$format_modified1.'</time>
								        		<address>
								          			<a>'.$author_name.'</a>
								        		</address>'.
								        		$thumbnail.'
								      		</header>'.
								      		$post_content.$jwplayer.$analytics.$ad.'
								      <footer></footer>
								    </article>
								  </body>
								</html>';*/

		$post_content  		= str_replace(array("<h3>", "<h4>", "<h5>"), "<h2>", $post_content);						
		$post_content  		= str_replace(array("</h3>", "</h4>", "</h5>"), "</h2>", $post_content);						

		$html 				= 	'<!doctype html><html lang="es" prefix="op: http://media.facebook.com/op#"><head><meta charset="utf-8"><link rel="canonical" href="'.$link_canonical.'"><meta property="op:markup_version" content="v1.0"><meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default"></head><body><article><header><h1>'.$post_title.'</h1><time class="op-published" datetime="'.$format_date2.'">'.$format_date1.'</time><time class="op-modified" dateTime="'.$format_modified1.'">'.$format_modified1.'</time><address><a>'.$author_name.'</a></address>'.$thumbnail.'</header>'.$post_content.$jwplayer.$analytics.$ad.'<footer></footer> </article></body></html>';

		$html 				= trim(preg_replace('/\s+/', ' ', $html));
		$html 				= trim(preg_replace('/\s+/', ' ', $html));
		$html 				= trim(preg_replace('/\n\r+/', ' ', $html));
		$content 			= '';
		$content 			= $html;
	}


	return $content;
}
//add_filter('the_excerpt_rss', 'add_feed_content');
add_filter('the_content', 'rewrite_feed_content');


function add_media_img_rss() {
	if(is_feed()){
		global $post;
		if( has_post_thumbnail( $post->ID )) {
			$thumb_ID 			= get_post_thumbnail_id( $post->ID );
    		$details 			= wp_get_attachment_image_src($thumb_ID, 'full');
    		$imagen 			= get_post( $thumb_ID );

    		$type 				= "";
    		$desc 				= "";
    		if(is_object($imagen)){
    			$title 			= $imagen->post_title;
    			$excerpt 		= $imagen->post_excerpt;

    			$type 			= $imagen->post_mime_type;
    			$desc 			= implode(",", array($title, $excerpt));
    		}

    		if( is_array($details) ) {
    			$media 			= 	'<media:content url 	= "'.$details[0].'" 
													type 	= "'.$type.'" 
													medium 	= "image" 
													width 	= "'.$details[1].'" 
													height 	= "'.$details[2].'">
				        				<media:description type="plain"><![CDATA[ '.$desc.' ]]></media:description>
				        				<media:copyright>Capital Media</media:copyright>
				    				</media:content>';
    			$media 			= trim(preg_replace('/\s+/', ' ', $media));
    			echo $media;	

		    }
		}
	}

}

add_action('rss2_item', 'add_media_img_rss');


function add_thumbnail_rss() {
	if(is_feed()){
		global $post;
		if( has_post_thumbnail( $post->ID )) {
			$thumb_ID 			= get_post_thumbnail_id( $post->ID );
    		$details 			= wp_get_attachment_image_src($thumb_ID, 'full');
    		$imagen 			= get_post( $thumb_ID );

    		$type 				= "";
    		$desc 				= "";
    		if(is_object($imagen)){
    			$title 			= $imagen->post_title;
    			$excerpt 		= $imagen->post_excerpt;

    			$type 			= $imagen->post_mime_type;
    			$desc 			= implode(",", array($title, $excerpt));
    		}

    		if( is_array($details) ) {
				$thumbnail 		= 	'<post-thumbnail>
			    			 			<url>'.$details[0].'</url>
			    			 			<width>'.$details[1].'</width>
			    			 			<height>'.$details[2].'</height>
			    			 		</post-thumbnail>';
    			$thumbnail 		= trim(preg_replace('/\s+/', ' ', $thumbnail));
    			
    			echo $thumbnail;
		    }
		}
	}

}

add_action('rss2_item', 'add_thumbnail_rss');
?>
