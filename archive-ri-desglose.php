<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
		$index = 0;
		if( have_posts() ) : $total = $wp_query->post_count;
			while ( have_posts() ) : the_post();
				if($index == 0){
					get_template_part( 'template-parts/components/ri', 'complejo' );
				}

				if ( $index == 1)
					echo '<div class="col-lg-8"><div class="components">';

				if ( $index >= 1 && $index <= 4 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'fan-vsmall' ] );

				if ( $index == 4 ){
					echo '</div></div>';
					echo '<div class="col-lg-4"><div class="components">';
					echo '<div class="anuncios mt"><div class="wrap"><div style="height: 600px;"></div></div></div>';
					echo '</div></div>';
				}

				if ( $index >= 5)
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'fan-vmini' ] );

				$index++;
			endwhile;
			
			if ($total > 1 && $total < 5)
				echo '</div></div>'; // Esto cierra el el contenedor 

		endif;
		?>
		</div>
	</div>
	<div class="container">
		<div class="components">
			<div class="component-pagination">
				<div class="wrap">
					<span class="page-dir"><?php previous_posts_link('<span class="fas fa-angle-left"></span>'); ?></span>
					<div class="page-number">
						<?=paginate_links([
							'mid_size' => 1,
							'prev_next' => false
						]);?>
					</div>
					<span class="page-dir"><?php next_posts_link('<span class="fas fa-angle-right"></span>'); ?></span>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>