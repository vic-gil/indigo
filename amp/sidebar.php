<amp-sidebar id="sidebar1" layout="nodisplay" side="left">
	<nav toolbar="(max-width: 767px)" toolbar-target="target-element">
	    <ul>
	    	<li class="amp-ri-logo">
	    		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
	    			<span class="amp-site-title">
						<?php echo esc_html( wptexturize( $this->get( 'blog_name' ) ) ); ?>
					</span>
	    		</a>
	    	</li>
	    </ul>
	</nav>
  	<?php
  	wp_nav_menu([
		'theme_location' => 'header',
		'container'      => false,
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	]);
  	?>
</amp-sidebar>
<div id="target-element"></div>
