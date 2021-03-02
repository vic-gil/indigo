<?php
$featured = $this->get( 'recomendados' );
?>
<div class="amp-ri-featured">
	<div class="component-titulo">
		<h2>
			Te puede interesar
		</h2>
	</div>
	<ul>
	<?php
	if ( $featured->have_posts() ): 
		while ( $featured->have_posts() ): $featured->the_post();
		$tema = get_the_terms( get_the_ID(), 'ri-tema');
		?>
		<li>
			<a href="<?=get_the_permalink();?>" title="<?=get_the_title();?>">
			<?php
				the_post_thumbnail("medium");
			?>
			</a>
			<?php
			if( ! empty($tema) ) : $tema = $tema[0];
			?>
			<div class="amp-ri-tema">
				<a href="<?=get_term_link($tema);?>" title="<?=$tema->name;?>"><?=$tema->name;?></a>
			</div>
			<?php
			endif;
			?>
			<a href="<?=get_the_permalink();?>" title="<?=get_the_title();?>">
				<?php
				the_title('<h3>','</h3>');
				?>
			</a>
			<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
				<?php the_author_posts_link();?>
			</address>
		</li>
		<?php		
		endwhile;
	endif;
	wp_reset_postdata();
	?>
	</ul>
</div>