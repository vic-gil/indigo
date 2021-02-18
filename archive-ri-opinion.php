<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
		<?php
		if( class_exists("Ri_opinion_db") ) {
			$front = Ri_opinion_db::front();
			if( $front["success"] == 1 ) {
				$columnas = $front["terms"];

				foreach ($columnas as $key => $columna) {
					$term = get_term( intval( $columna ) );

					if( false === $opinion = get_transient('ri_cache_opinion_' . $term->slug ) ) {

						$opinion = new WP_Query([
							'post_type' 		=> get_post_type(),
							'posts_per_page' 	=> 4,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'ri-columna',
									'field'	   	=> 'slug',
									'terms' 	=> $term->slug
								]
							]
						]);

						if ( ! is_wp_error( $opinion ) && $opinion->have_posts() ) {
			   				set_transient('ri_cache_opinion_' . $term->slug, $opinion, 12 * HOUR_IN_SECONDS );
						}

					}
					$author = $opinion->posts[0]->post_author;
					?>
					<div class="container-opinion">
						<div class="entries">
							<div class="header">
								<h2>
									<a href="<?=get_term_link($term,'ri-columna')?>" title="Ir a entradas de la columna <?=$term->name;?>">
										<?=$term->name;?>
									</a>
								</h2>
								<figure>
									<?php printf(
										'<a href="%1$s" title="%2$s" rel="author"><picture>%3$s</picture></a>',
										esc_url( get_author_posts_url( $author, get_the_author_meta("nicename", $author) ) ),
										esc_attr( sprintf( __( 'Posts by %s' ), get_the_author_meta("display_name", $author) ) ),
										get_wp_user_avatar( $author, "thumbnail" )
  									); ?>
								</figure>
							</div>
							<div class="card-data">
								<address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
									<?php printf(
    									'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
    									esc_url( get_author_posts_url( $author, get_the_author_meta("nicename", $author) ) ),
  										esc_attr( sprintf( __( 'Posts by %s' ), get_the_author_meta("display_name", $author) ) ),
  										get_the_author_meta("display_name", $author)
  									); ?>
								</address>
							</div>
							<div class="body">
							<?php
							$index = 0;
							if( $opinion->have_posts() ) : 
								while ( $opinion->have_posts() ) : $opinion->the_post();
									if( $index == 0 )
										get_template_part( 'template-parts/components/ri', 'opinion_lista', [ 'class' => '__a' ] );
									else
										get_template_part( 'template-parts/components/ri', 'opinion_lista' );
									$index++;
								endwhile;
							endif;
							?>
							</div>
							<div class="footer">
								<a href="<?=get_term_link($term, 'ri-opinion');?>" title="Ir a entradas de la columna <?=$term->name;?>" class="btn-general" role="button">
									Ver más <i class="fas fa-caret-right"></i>
								</a>
							</div>		
						</div>
					</div>
					<?php
				}
			}
		}
		?>
		</div>
	</div>
</main>
<?php get_footer(); ?>