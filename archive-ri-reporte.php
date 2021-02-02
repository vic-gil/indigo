<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
	<?php

		/**
		 *
		 * Datos transitorios para noticias nacionales
		 * Use esta función para borrar los datos:
		 *
		 * delete_transient('ri_cache_nacional');
		 *
		**/
		
		if( false === $nacional = get_transient('ri_cache_nacional') ) {

			$nacional = new WP_Query([
				'post_type' 				=> get_post_type(),
				'posts_per_page' 			=> 11,
				'post_status'      			=> 'publish',
				'suppress_filters' 			=> false,
				'no_found_rows' 			=> true,
				'update_post_term_cache' 	=> false,
				'meta_query' 				=> [
					[
						'key' 	=> '_ciudad_meta',
			            'value' => 'nacional'
					]
				]
			]);

			if ( ! is_wp_error( $nacional ) && $nacional->have_posts() ) {
   				set_transient('ri_cache_nacional', $nacional, 30 * MINUTE_IN_SECONDS );
			}

		}

		$index = 0;
		if( $nacional->have_posts() ) : 
			while ( $nacional->have_posts() ) : $nacional->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/general/ri', 'original' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/lista_imagen/ri', 'original' );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/general/ri', 'small' );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/lista/ri', 'original' );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
		else:
			Reporte_indigo_test::log('No hay post para el bloque');
		endif;

		wp_reset_postdata();
	?>
		</div>
	</div>
	<div class="container wmc">
		<a href="<?=get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=nacional'?>" title="Ir a entradas nacionales" class="btn-general" role="button">
				Ver más notas <i class="fas fa-caret-right"></i>
			</a>
	</div>
	<div class="container wm">
		<div class="components">
	<?php

		/**
		 *
		 * Datos transitorios para Ciudad de México
		 * Use esta función para borrar los datos:
		 *
		 * delete_transient('ri_cache_cdmx');
		 *
		**/

		if( false === $cdmx = get_transient('ri_cache_cdmx') ) {

			$cdmx = new WP_Query([
				'post_type' 		=> get_post_type(),
				'posts_per_page' 	=> 11,
				'post_status'      	=> 'publish',
				'suppress_filters' 	=> false,
				'no_found_rows' 	=> true,
				'meta_query' 		=> [
					[
						'key' 		=> '_ciudad_meta',
			            'value' 	=> 'cdmx'
					]
				]
			]);

			if ( ! is_wp_error( $cdmx ) && $cdmx->have_posts() ) {
   				set_transient('ri_cache_cdmx', $cdmx, 30 * MINUTE_IN_SECONDS );
			}

		}

		$index = 0;
		if( $cdmx->have_posts() ) : 
			while ( $cdmx->have_posts() ) : $cdmx->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/general/ri', 'original' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/lista_imagen/ri', 'original' );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/general/ri', 'small' );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/lista/ri', 'original' );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
		else:
			Reporte_indigo_test::log('No hay post para el bloque');
		endif;

		wp_reset_postdata();
	?>
		</div>
	</div>
	<div class="container wmc">
		<a href="<?=get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=cdmx'?>" title="Ir a entradas de la Ciudad de México" class="btn-general" role="button">
				Ver más notas <i class="fas fa-caret-right"></i>
			</a>
	</div>
	<div class="container wm">
		<div class="components">
	<?php
		/**
		 *
		 * Datos transitorios para Guadalajara
		 * Use esta función para borrar los datos:
		 *
		 * delete_transient('ri_cache_gdl');
		 *
		**/

		if( false === $gdl = get_transient('ri_cache_gdl') ) {

			$gdl = new WP_Query([
				'post_type' 		=> get_post_type(),
				'posts_per_page' 	=> 10,
				'post_status'      	=> 'publish',
				'suppress_filters' 	=> false,
				'no_found_rows' 	=> true,
				'meta_query' 		=> [
					[
						'key' 		=> '_ciudad_meta',
			            'value' 	=> 'gdl'
					]
				]
			]);

			if ( ! is_wp_error( $gdl ) && $gdl->have_posts() ) {
   				set_transient('ri_cache_gdl', $gdl, 30 * MINUTE_IN_SECONDS );
			}

		}

		$index = 0;
		if( $gdl->have_posts() ) : 
			while ( $gdl->have_posts() ) : $gdl->the_post();
				
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/general/ri', 'original' );
					echo '</div></div>';
					echo '<div class="col-lg-4"><div class="components">';
					/**
					 *
					 * Aqui va la publicidad
					 *
					**/
					echo '</div></div><div class="separator"><hr></div>';
				}	

				if ($index == 1)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 1 && $index <= 2)
					get_template_part( 'template-parts/components/general/ri', 'small' );

				if ($index == 2)
					echo '</div></div>';

				if ($index == 3)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 3 && $index <= 6)
					get_template_part( 'template-parts/components/lista/ri', 'original' );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-12"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/lista_imagen/ri', 'mini' );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
		else:
			Reporte_indigo_test::log('No hay post para el bloque');
		endif;

		wp_reset_postdata();

	?>
		</div>
	</div>
	<div class="container wmc">
		<a href="<?=get_permalink( get_page_by_path( 'Ciudad' ) ) . '?city=gdl'?>" title="Ir a entradas de Guadalajara" class="btn-general" role="button">
				Ver más notas <i class="fas fa-caret-right"></i>
			</a>
	</div>
	<?php 
	Reporte_indigo_test::comment('Newsletter');
	?>
	<div class="content-max wm">
		<div class="content">
		<?php
			Reporte_indigo_templates::componente_boletin( get_permalink( get_page_by_path( 'Newsletter' ) ) );
		?>
		</div>
	</div>
	<div class="container wm">
		<div class="components">
	<?php

		/**
		 *
		 * Datos transitorios para Monterrey
		 * Use esta función para borrar los datos:
		 *
		 * delete_transient('ri_cache_mty');
		 *
		**/

		if( false === $mty = get_transient('ri_cache_mty') ) {

			$mty = new WP_Query([
				'post_type' 		=> get_post_type(),
				'posts_per_page' 	=> 11,
				'post_status'      	=> 'publish',
				'suppress_filters' 	=> false,
				'no_found_rows' 	=> true,
				'meta_query' 		=> [
					[
						'key' 		=> '_ciudad_meta',
			            'value' 	=> 'mty'
					]
				]
			]);

			if ( ! is_wp_error( $mty ) && $mty->have_posts() ) {
   				set_transient('ri_cache_mty', $mty, 30 * MINUTE_IN_SECONDS );
			}

		}

		$index = 0;
		if( $mty->have_posts() ) : 
			while ( $mty->have_posts() ) : $mty->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/general/ri', 'original' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/lista_imagen/ri', 'original' );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/general/ri', 'small' );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/lista/ri', 'original' );

				$index++;
			endwhile;
			echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
		else:
			Reporte_indigo_test::log('No hay post para el bloque');
		endif;

		wp_reset_postdata();
	?>
		</div>
	</div>
	<div class="container wmc">
		<a href="/?city=mty" title="Ir a entradas de Monterrey" class="btn-general" role="button">
				Ver más notas <i class="fas fa-caret-right"></i>
			</a>
	</div>
</main>
<?php get_footer(); ?>
