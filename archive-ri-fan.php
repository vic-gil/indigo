<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
		$index = 0;
		if( have_posts() ) : 
			$bullets = $wp_query->post_count - 5;
			while ( have_posts() ) : the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
					echo '<div class="col-lg-4"><div class="components">';
					/**
					 *
					 * Aquí va el dato del día
					 *
					**/
					echo '</div></div>';
				}

				if ( $index == 1)
					echo '<div class="col-lg-8"><div class="components">';

				if ( $index >= 1 && $index <= 4 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vsmall' ] );

				if ( $index == 5 )
					echo '<div class="swiper-container" id="slider-fan"><div class="swiper-wrapper">';
				
				if ( $index >= 5 && $index <= 7 )
					get_template_part( 'template-parts/components/ri', 'deslizador_fan', [ 'total' => $bullets ] );

				if ( $index == 7 )
					echo '</div></div></div></div>';

				if ( $index == 8 ){
					echo '<div class="col-lg-4"><div class="components">';

					/**
					 *
					 * Aqui va opinión
					 *
					**/

					get_template_part( 'template-parts/components/ri', 'piensa', [ 'class' => '__a' ] );

					/**
					 *
					 * Aqui va la publicidad
					 *
					**/
					echo '</div></div>';
				}

				if( $index == 9 )
					echo '<div class="col-12"><div class="components">';

				if( $index >= 9 )
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "fan" ] );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
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
