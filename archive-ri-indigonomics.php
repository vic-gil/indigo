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
						
						$one = new WP_Query([
							'post_type' 			=> 'ri-filosofia',
							'posts_per_page' 		=> 1,
							'post_status'      		=> 'publish',
							'suppress_filters' 		=> false,
							'ignore_sticky_posts'	=> true,
							'no_found_rows' 		=> true
						]);
						if ( $one->have_posts() ):
							while ( $one->have_posts() ): $one->the_post();
								get_template_part( 'template-parts/components/ri', 'twitter_plus' );
							endwhile;
						endif;
						
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

                    if( get_query_var('paged') === 0 ) {

                        if ($index == 3){
                             ?>
                             <div class="bi-component">
                                <div class="wrap">
                                    <div class="header">
                                        <img src="<?=get_template_directory_uri()?>/assets/images/custom/binsider.png" alt="Bussiness Insider" />
                                    </div>
                                    <div class="body">
                                        <?php
                                        $entradas = new WP_Query([
                                            'post_type' 			=> 'ri-indigonomics',
                                            'posts_per_page' 		=> 3,
                                            'post_status'      		=> 'publish',
                                            'suppress_filters' 		=> false,
                                            'ignore_sticky_posts'	=> true,
                                            'no_found_rows' 		=> true,
                                            'post__not_in'			=> $exclude
                                        ]);

                                        if ( $entradas->have_posts() ): $index = 0;
                                            while ( $entradas->have_posts() ): $entradas->the_post();

                                                if( $index == 0 ) {
                                                    get_template_part('template-parts/components/bi/bi-card');
                                                    echo '<hr>';
                                                } else {
                                                    get_template_part('template-parts/components/bi/bi-card', 'simple');

                                                    if( $index !== 2 )
                                                        echo '<hr>';
                                                }

                                                $exclude_video[] = get_the_ID();
                                                $index++;
                                            endwhile;
                                        endif;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            echo '</div></div>'; // Cierra el contenedor principal
                            echo '<div class="content-max"><div class="content"><div class="components wp">'; // Abre contenedor videos

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
                                echo '<div class="tc"><a href="' . get_permalink( get_page_by_path( 'indigo-videos' ) )  . '" title="Ir a entradas Indigo Play" class="btn-general" role="button">Ver más videos</a></div>';
                            endif;
                            wp_reset_postdata();
                            echo '</div></div></div>'; // Con esto cerramos contenedor de video
                            echo '<div class="container wm"><div class="components">'; // Abrimos un nuevo contenedor
                            echo '<div class="col-lg-12"><div class="components">';
                        }

                        if($index >= 3)
                            get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vmini" ] );

                    } else {
                        if($index >= 3 && $index <= 6) {
                            get_template_part( 'template-parts/components/ri', 'lista', [ "class" => "vinh" ] );
                        }

                        if ($index == 6)
                            echo '</div></div>';

                        if ($index == 7){
                            echo '</div></div>'; // Cierra el contenedor principal
                            echo '<div class="content-max"><div class="content"><div class="components wp">'; // Abre contenedor videos

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
                                echo '<div class="tc"><a href="' . get_permalink( get_page_by_path( 'indigo-videos' ) )  . '" title="Ir a entradas Indigo Play" class="btn-general" role="button">Ver más videos</a></div>';
                            endif;
                            wp_reset_postdata();
                            echo '</div></div></div>'; // Con esto cerramos contenedor de video
                            echo '<div class="container wm"><div class="components">'; // Abrimos un nuevo contenedor
                            echo '<div class="col-lg-12"><div class="components">';
                        }

                        if($index >= 7)
                            get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vmini" ] );
                    }

                    if( get_query_var('paged') === 0 ) {
                        if( $index == 8 ) {
                            break;
                        }
                    }

					$index++;
				endwhile;
				echo '</div></div></div></div>'; // En caso de que no se completen las notas esto cierra cualquier componente
			else:
				Reporte_indigo_test::log('No hay post para el bloque');
			endif;

			wp_reset_postdata();
		?>
		</div>
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
