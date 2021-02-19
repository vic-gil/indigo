<?php get_header(); ?>
<main>
	<div class="container wm">
		<div class="components">
			<nav aria-label="Breadcrumb" class="breadcrumb">
				<ol>
					<li>
						<a href="<?=home_url()?>" title="Regresar a página de inicio">Inicio</a>
					</li>
					<li>
						<h1>
							Búsqueda · <?=get_search_query();?>
						</h1>
					</li>
				</ol>
			</nav>
			<?php
			$index = 0;
			if( have_posts() ) : 
				while ( have_posts() ) : the_post();
					
					if ( $index >= 0 && $index <= 4 )
						get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'amedium', 'local' => FALSE, 'category' => FALSE, 'author' => FALSE ]);

					if( $index == 4 ){
						echo '<div class="anuncios vmini mt"><div class="wrap"><div style="height:300px;"></div></div></div>';
						Reporte_indigo_templates::componente_separador();
					}

					if ( $index >= 5 && $index <= 12 )
						get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'asmall', 'local' => FALSE, 'category' => FALSE, 'excerpt' => FALSE, 'author' => FALSE ]);

					if( $index == 12 )
						Reporte_indigo_templates::componente_separador();

					if ( $index >= 13 )
						get_template_part( 'template-parts/components/ri', 'lista_imagen', [ "class" => "vsmall" ] );

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