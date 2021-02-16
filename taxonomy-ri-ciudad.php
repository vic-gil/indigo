<?php get_header();?>
<main>
	<div class="container wm">
		<div class="components">
			<div class="term_title">
				<h1><?php single_term_title();?> <i class="fas fa-angle-double-right"></i></h1>
			</div>
		</div>
		<div class="components">
		<?php
		$index = 0;
		if( have_posts() ) : 
			while ( have_posts() ) : the_post();
				if( $index <= 4 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini', 'category' => FALSE ] );

				if( $index == 4)
					echo '<div class="col-4"></div><div class="separator"><hr></div>';
				
				if( $index >= 5 && $index <= 12 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmicro', 'category' => FALSE, 'excerpt' => FALSE ] );

				if( $index == 12 )
					echo '<div class="separator"><hr></div>';

				if($index >= 13 )
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ 'class' => 'vmini' ] );

				$index++;
			endwhile;
		endif;
		?>
		</div>
		<div class="component-pagination">
			<span class="page-dir"><?php previous_posts_link('<span class="fas fa-angle-left"></span>'); ?></span>
			<div class="page-number">
				<?=paginate_links([
					'mid_size' => 1,
					'prev_next' => false
				]);
				?>
			</div>
			<span class="page-dir"><?php next_posts_link('<span class="fas fa-angle-right"></span>'); ?></span>
		</div>
	</div>
</main>
<?php get_footer(); ?>