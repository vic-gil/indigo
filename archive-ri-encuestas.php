<?php get_header();?>
<main>
	<div class="container wm">
		<div class="components">
			<div class="term_title">
				<h1><?php post_type_archive_title('', true)?> <i class="fas fa-angle-double-right"></i></h1>
			</div>
		</div>
		<div class="components">
		<?php
		$index = 0;
		if( have_posts() ) : 
			while ( have_posts() ) : the_post();
				if( $index <= 4 )
					get_template_part( 'template-parts/components/ri', 'general', [ 'class' => 'vmini', 'category' => FALSE ] );

				if( $index == 4){
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
					echo '<div class="col-4"></div><div class="separator"><hr></div>';
				}

				$index++;
			endwhile;
		endif;
		?>
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