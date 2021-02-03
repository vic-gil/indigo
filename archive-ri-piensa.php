<?php get_header();?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
			$index = 0;
			if( have_posts() ) : 
				while ( have_posts() ) : the_post();
					
					if($index == 0){
						echo '<div class="col-lg-8"><div class="components">';
						get_template_part( 'template-parts/components/ri', 'general' );
						echo '</div></div>';
						echo '<div class="col-lg-4"><div class="components">';
						/**
						 *
						 * Aqui va enfoque indigo
						 *
						**/
						echo '</div></div><div class="separator"><hr></div>';
					}	

					if ($index == 1)
						echo '<div class="col-lg-12"><div class="components">';

					if($index >= 1 && $index <= 3)
						get_template_part( 'template-parts/components/ri', 'general', [ "class" => "vmini" ] );

					if( $index >= 4 )
						get_template_part( 'template-parts/components/ri', 'piensa', [ "type" => "__a" ] );

					$index++;
				endwhile;
				echo '</div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
			else:
				Reporte_indigo_test::log('No hay post para el bloque');
			endif;

			wp_reset_postdata();
		?>
		</div>
		
		<div class="components">
		<?php
		if( get_query_var('paged') === 0 ){
			$terms = Ri_admin_home_db::get_seccion_piensa_front();

			if( $terms['success'] === 1 ) {
				foreach ( $terms['terms'] as $key => $term ) {
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
				?>

				<div class="container-piensa col-4">
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
							<a href="" class="btn-general" role="button">
								Ver más
							</a>
						</div>
					</div>
				</div>

				<?php
				wp_reset_postdata();
				}
			}

		}
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
