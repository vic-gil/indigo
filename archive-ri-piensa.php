<?php get_header();?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
			$index = 0;
			if( have_posts() ) : 
				while ( have_posts() ) : the_post();
					
					if($index == 0){
						echo '<div class="col-md-12 col-lg-8"><div class="components">';
						get_template_part( 'template-parts/components/ri', 'general' );
						echo '</div></div>';
						echo '<div class="col-md-12 col-lg-4"><div class="components">';

						if( get_query_var('paged') === 0 ) {
							$one = new WP_Query([
								'post_type' 			=> 'ri-piensa',
								'posts_per_page' 		=> 1,
								'post_status'      		=> 'publish',
								'suppress_filters' 		=> false,
								'ignore_sticky_posts'	=> true,
								'no_found_rows' 		=> true,
								'tax_query' 			=> [
									[
										'taxonomy' 		=> 'ri-categoria',
										'field'	   		=> 'slug',
										'terms'	 		=> 'enfoqueindigo'
									]
								]
							]);

							if ( $one->have_posts() ):
								while ( $one->have_posts() ): $one->the_post();
									get_template_part( 'template-parts/components/ri', 'enfoque' );
								endwhile;
							endif;
							wp_reset_postdata();
						} else {
						?>
						<div class="anuncios vcontent mt">
							<div class="wrap">
								<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70853',
									'site' => '70494',
									'page' => '535121',
									'delay' => 3500,
								]);
								?>
							</div>
						</div>
						<div class="anuncios vcontent mt">
							<div class="wrap">
								<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70854',
									'site' => '70494',
									'page' => '535121',
									'delay' => 2000
								]);
								?>
							</div>
						</div>
						<?php
						}
						
						

						echo '</div></div><div class="separator"><hr></div>';
					}	

					if ($index == 1)
						echo '<div class="col-lg-12"><div class="components">';

					if( get_query_var('paged') === 0 ) {
						
						if($index >= 1 && $index <= 5)
							get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini' ] );

						if($index == 5){
						?>
						<div class="anuncios vmini mt">
							<div class="wrap">
								<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70853',
									'site' => '70494',
									'page' => '535121',
									'delay' => 3500,
								]);
								?>
							</div>
						</div>
						<?php
						}

					} else {

						if($index >= 1 && $index <= 3)
							get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'v1piensa' ] );

						if( $index >= 4 )
							get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'v2piensa' ] );

						if($index == 5){
						?>
						<div class="anuncios vmini mt">
							<div class="wrap">
								<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70869',
									'site' => '70494',
									'page' => '535121',
									'delay' => 2000
								]);
								?>
							</div>
						</div>
						<?php
						}

					}

					$index++;
				endwhile;
				echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
			else:
				Reporte_indigo_test::log('No hay post para el bloque');
			endif;

			wp_reset_postdata();
		?>
		</div>
		
		<?php
		if( get_query_var('paged') === 0 ){
		?>
		<div class="components">
		<?php
			$terms = Ri_admin_home_db::get_seccion_piensa_front();

			if( $terms['success'] === 1 ) {
				foreach ( $terms['terms'] as $key => $term ) {

					if( false === $posts = get_transient('ri_cache_piensa_' . $term['slug']) ) {

						$posts = new WP_Query([
							'post_type' 		=> get_post_type(),
							'posts_per_page' 	=> 2,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'ri-categoria',
									'field'	   	=> 'slug',
									'terms'	 	=> $term["name"]
								]
							]
						]);

						if ( ! is_wp_error( $posts ) && $posts->have_posts() ) {
			   				set_transient('ri_cache_piensa_' . $term['slug'], $posts, 12 * HOUR_IN_SECONDS );
						}

				}

				?>

				<div class="container-piensa">
					<div class="entries">
						<div class="header">
							<h2>
								<a href="<?=get_term_link($term['slug'], 'ri-categoria');?>" title="<?=$term['name'];?>">
									<?=$term['name'];?>
								</a>
							</h2>
						<?php
						Reporte_indigo_templates::componente_icon($term['slug']);
						?>
						</div>
						<div class="body">
							<?php
							if( $posts->have_posts() ) : 
								while ( $posts->have_posts() ) : $posts->the_post();
									get_template_part( 'template-parts/components/ri', 'lista_imagen' );
								endwhile;
							endif;
							?>
						</div>
						<div class="footer">
							<a href="<?=get_term_link($term['slug'], 'ri-categoria');?>" class="btn-general" role="button">
								Ver más
							</a>
						</div>
					</div>
				</div>

				<?php
				wp_reset_postdata();
				}
			}
			?>
		</div>
		<?php
		}	
		?>
	</div>
	<div class="container">
		<div class="components">
			<div class="component-pagination">
				<div class="wrap">
					<span class="page-dir"><?php previous_posts_link('<span class="ri-icon-angle-left"></span>'); ?></span>
					<div class="page-number">
						<?=paginate_links([
							'mid_size' => 1,
							'prev_next' => false
						]);?>
					</div>
					<span class="page-dir"><?php next_posts_link('<span class="ri-icon-angle-right"></span>'); ?></span>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
