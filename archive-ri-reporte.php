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
				'tax_query' => [
					[
						'taxonomy' => 'ri-ciudad',
	            		'field'    => 'slug',
	            		'terms'    => 'nacional',
					]
				]
			]);

			if ( ! is_wp_error( $nacional ) && $nacional->have_posts() ) {
   				set_transient('ri_cache_nacional', $nacional, 12 * HOUR_IN_SECONDS );
			}

		}

		$index = 0;
		if( $nacional->have_posts() ) : 
			while ( $nacional->have_posts() ) : $nacional->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vinh" ] );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vsmall" ] );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/ri', 'lista', [ "class" => "vinh" ] );

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
		<a href="<?=get_term_link('nacional', 'ri-ciudad');?>" title="Ir a entradas nacionales" class="btn-general" role="button">
			Ver más notas
		</a>
	</div>

	<div class="content-max">
		<div class="content">
			<div class="components wp">
			<?php
			if( false === $videos = get_transient('ri_cache_videos') ) {
				$videos = new WP_Query([
					'post_type' 		=> 'any',
					'posts_per_page' 	=> 4,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'no_found_rows' 	=> true,
					'meta_query' 		=> [
						'relation' => 'AND',
						[
							'key' 		=> '_mediaid_jwp_meta',
			            	'value' 	=> '',
			            	'compare' 	=> '!='
						]
					]
				]);

				if ( ! is_wp_error( $videos ) && $videos->have_posts() ) {
   					set_transient('ri_cache_videos', $videos, 12 * HOUR_IN_SECONDS );
				}
			}
				
			if ( $videos->have_posts() ):
				while ( $videos->have_posts() ): $videos->the_post();
					get_template_part( 'template-parts/components/ri', 'play', [ 'class' => 'mini', 'local' => FALSE ] );
				endwhile;
			endif;
			?>
			<div class="tc wm">
				<a href="<?=get_permalink( get_page_by_path( 'indigo-videos' ) ) ?>" title="Ir a entradas nacionales" class="btn-general" role="button">Ver más videos</a>
			</div>
			</div>
		</div>
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
				'tax_query' => [
					[
						'taxonomy' => 'ri-ciudad',
	            		'field'    => 'slug',
	            		'terms'    => 'cdmx',
					]
				]
			]);

			if ( ! is_wp_error( $cdmx ) && $cdmx->have_posts() ) {
   				set_transient('ri_cache_cdmx', $cdmx, 12 * HOUR_IN_SECONDS );
			}

		}

		$index = 0;
		if( $cdmx->have_posts() ) : 
			while ( $cdmx->have_posts() ) : $cdmx->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vinh" ] );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vsmall" ] );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/ri', 'lista', [ "class" => "vinh" ] );

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
		<a href="<?=get_term_link('cdmx', 'ri-ciudad');?>" title="Ir a entradas de la Ciudad de México" class="btn-general" role="button">
			Ver más notas
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
				'tax_query' => [
					[
						'taxonomy' => 'ri-ciudad',
	            		'field'    => 'slug',
	            		'terms'    => 'gdl',
					]
				]
			]);

			if ( ! is_wp_error( $gdl ) && $gdl->have_posts() ) {
   				set_transient('ri_cache_gdl', $gdl, 12 * HOUR_IN_SECONDS );
			}

		}

		$index = 0;
		if( $gdl->have_posts() ) : 
			while ( $gdl->have_posts() ) : $gdl->the_post();
				
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
					echo '<div class="col-lg-4"><div class="components">';
				?>
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<?php
							get_template_part('template-parts/sponsors/ri', 'anuncio', [
								'format' 	=> '70853',
								'site' 		=> '70494',
								'page' 		=> '535121',
								'delay' 	=> 3500,
							]);
						?>
					</div>
				</div>
				<div class="anuncios vcontent mt">
					<div class="wrap">
						<?php
							get_template_part('template-parts/sponsors/ri', 'anuncio', [
								'format' 	=> '70854',
								'site' 		=> '70494',
								'page' 		=> '535121',
								'delay' 	=> 3500,
							]);
						?>
					</div>
				</div>
				<?php
					echo '</div></div><div class="separator"><hr></div>';
				}	

				if ($index == 1)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 1 && $index <= 2)
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vsmall" ] );

				if ($index == 2)
					echo '</div></div>';

				if ($index == 3)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 3 && $index <= 6)
					get_template_part( 'template-parts/components/ri', 'lista', [ "class" => "vinh" ] );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-12"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vmini" ] );

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
		<a href="<?=get_term_link('gdl', 'ri-ciudad');?>" title="Ir a entradas de Guadalajara" class="btn-general" role="button">
			Ver más notas
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
				'tax_query' => [
					[
						'taxonomy' => 'ri-ciudad',
	            		'field'    => 'slug',
	            		'terms'    => 'mty',
					]
				]
			]);

			if ( ! is_wp_error( $mty ) && $mty->have_posts() ) {
   				set_transient('ri_cache_mty', $mty, 12 * HOUR_IN_SECONDS );
			}

		}

		$index = 0;
		if( $mty->have_posts() ) : 
			while ( $mty->have_posts() ) : $mty->the_post();
				if($index == 0){
					echo '<div class="col-lg-8"><div class="components">';
					get_template_part( 'template-parts/components/ri', 'general' );
					echo '</div></div>';
				}

				if ($index == 1)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 1 && $index <= 4)
					get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vinh" ] );

				if ($index == 4)
					echo '</div></div><div class="separator"><hr></div>';

				if ($index == 5)
					echo '<div class="col-lg-8"><div class="components">';

				if($index >= 5 && $index <= 6)
					get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vsmall" ] );

				if ($index == 6)
					echo '</div></div>';

				if ($index == 7)
					echo '<div class="col-lg-4"><div class="components">';

				if($index >= 7)
					get_template_part( 'template-parts/components/ri', 'lista', [ "class" => "vinh" ] );

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
		<a href="<?=get_term_link('mty', 'ri-ciudad');?>" title="Ir a entradas de Monterrey" class="btn-general" role="button">
			Ver más notas
		</a>
	</div>
</main>
<?php get_footer(); ?>
