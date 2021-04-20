<?php
/**
 * Plantilla cabecera
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php header("Refresh: 1800;"); ?>
	<head>
		<title><?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
		<meta http-equiv="cleartype" content="on">
		<meta name="author" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?>" />
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
		<meta name="copyright" content="<?php bloginfo('name'); ?>" />
		<meta property="fb:app_id" content="349644108939477" />
		<meta property="fb:pages" content="92465443899" /> 
		<meta name="theme-color" content="#3474be" />
		<meta name="google-site-verification" content="NQS76n_mTHZfHmt620zjPbhyWfGC5DComdPe1jNQw00" />
		<meta name="google-site-verification" content="4Bt7KHVG0kzwetxi_LnrYR8QUCkKFdSNGA4PU2hpaDs" />
		<meta name="msvalidate.01" content="7CFA2C8C16223F10EB60365CBAD65A67" />
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="application-name" content="<?=bloginfo('name');?>"/>
		<link rel="shortcut icon" href="<?=IMAGESPATH;?>/iconos/icon16x16.png" />
		<link rel="icon" type="image/png" sizes="192x192" href="<?=IMAGESPATH;?>/iconos/icon192x192.png" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>
		<?php
		do_action("ri_body_init");
		?>
		<header>
			<?php Reporte_indigo_test::comment('Fixed'); ?>
			<div class="navbar">
				<div class="content">
					<div>
						<a href="<?=home_url();?>" title="<?=get_bloginfo('name');?>">
							<img src="<?=IMAGESPATH;?>/svgs/ri-icono-30.svg" alt="<?=get_bloginfo('name');?>" width="30" height="30" />
						</a>
					</div>
					<div class="newsletter">
						<a href="<?=get_permalink(get_page_by_path( 'Newsletter' ));?>"><span class="ri-icon-plus-circle"></span> SUSCRÍBETE</a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="components">
					<div class="anuncio">
						<div class="wrap wm">
							<?php
								get_template_part('template-parts/sponsors/ri', 'anuncio', [
									'format' => '70740',
									'site' => '70494',
									'page' => '535121',
									'delay' => 0,
								]);
							?>
						</div>
					</div>
				</div>
			</div>
			<?php 
			Reporte_indigo_test::comment('Etiqueta de dominio');
			Reporte_indigo_templates::componente_tag_domain( home_url(), get_bloginfo('name'), get_option( 'general_options_ri', false ));
			?>
			<?php
			Reporte_indigo_test::comment('Encabezado desktop');
			?>
			<div class="navmain">
				<div class="sx1">
					<div class="nav-social">
						<ul>
							<li>
								<a href="https://www.facebook.com/R.Indigo" title="Síguenos en Facebook" target="_blank" class="ri-icon-facebook-f" rel="noopener noreferrer" aria-label="Síguenos en Facebook">
									<span>Facebook</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/Reporte_Indigo" title="Síguenos en Twitter" target="_blank" class="ri-icon-twitter" rel="noopener noreferrer" aria-label="Síguenos en Twitter">
									<span>Twitter</span>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/user/reporteindigo" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="ri-icon-youtube" rel="noopener noreferrer" aria-label="Suscríbete a nuestro canal de Youtube">
									<span>Youtube</span>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/reporte_indigo" title="Síguenos en Instagram" target="_blank" class="ri-icon-instagram" rel="noopener noreferrer" aria-label="Síguenos en Instagram">
									<span>Instagram</span>
								</a>
							</li>
							<li>
								<a href="https://www.tiktok.com/@reporteindigo" title="Síguenos en TikTok" target="_blank" class="ri-icon-tiktok" rel="noopener noreferrer" aria-label="Síguenos en TikTok">
									<span>TikTok</span>
								</a>
							</li>
							<li>
								<a href="https://t.me/rindigo_noticias" title="Suscríbete al grupo de Telegram" target="_blank" class="ri-icon-telegram-plane" rel="noopener noreferrer" aria-label="Suscríbete al grupo de Telegram">
									<span>Telegram</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="nav-logo">
						<a href="<?=home_url();?>" title="<?=get_bloginfo('name');?>">
							<img src="<?=IMAGESPATH;?>/svgs/ri-logo-170.svg" alt="<?=get_bloginfo('name');?>" width="150" height="46" />
						</a>
					</div>
					<div class="nav-suscribe">
						<a href="<?=get_permalink(get_page_by_path( 'Newsletter' ));?>"><span class="ri-icon-plus-circle"></span> SUSCRÍBETE</a>
					</div>
				</div>
				<div class="sx2">
					<div class="nav-burger exec" id="exec-menu">
						<span class="ri-icon-bars"></span>
					</div>
					<div class="nav-logo">
						<a href="<?=home_url();?>" title="<?=get_bloginfo('name');?>">
							<img src="<?=IMAGESPATH;?>/svgs/ri-logo-250.svg" alt="<?=get_bloginfo('name');?>" width="250" height="76" />
						</a>
					</div>
					<nav class="nav-menu">
						<?php
						wp_nav_menu([
							'theme_location' => 'header',
							'container'      => false,
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						]);
						?>
					</nav>
					<div class="nav-search exec" id="exec-search">
						<span class="ri-icon-search"></span>
					</div>
				</div>
			</div>
			<?php
			Reporte_indigo_test::comment('Menú oculto');
			?>
			<div class="navmenu listen" id="listen-menu">
				<div class="components">
					<?php
					wp_nav_menu([
						'theme_location' => 'header',
						'menu_class'     => 'menu-cabecera',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'          => 2
					]);
					?>
				</div>
			</div>
			<?php
			Reporte_indigo_test::comment('Búsqueda');
			?>
			<div class="navsearch listen" id="listen-search">
				<div class="components">
					<form method="get" action="<?=get_bloginfo('url');?>" role="search" aria-label="En todo el sitio">
						<input type = "text" placeholder="¿Qué nota estás buscando?" role="searchbox" aria-label="Buscar" name="s" autocomplete="off">
						<button class="ri-icon-search" role="button" id="button-search" type="submit"><span>Búsqueda</span></button>
					</form>
				</div>
			</div>
			<?php
			if( ! empty( $selected_posts = get_option("ri_section_ultimo_momento") ) ) :
				$selected_posts = unserialize( $selected_posts );
				$entradas = new WP_Query([
					'posts_per_page'	=> count($selected_posts),
					'post_type' 		=> 'any',
					'post__in' 			=> $selected_posts,
					'post_status'      	=> 'publish',
					'suppress_filters' 	=> false,
					'no_found_rows' 	=> true,
					'orderby' 			=> 'post__in'
				]);

				if ( $entradas->have_posts() ):
					$main_id = get_the_ID();
					?>
					<div class="container wmt">
						<div class="components">
						<?php
						while ( $entradas->have_posts() ): $entradas->the_post();
							if( $main_id != get_the_ID() ) 
								get_template_part('template-parts/ab-test/components/alerts/ri', 'alertas');
							break;
						endwhile;
						?>
						</div>
					</div>
					<?php
				endif;
				wp_reset_postdata();
			endif;
			get_template_part('template-parts/sponsors/ri', 'anuncio', [
				'format' => '70857',
				'site' => '70494',
				'page' => '535121',
				'delay' => 5000,
				'loading' => false
			]);
			?>
		</header>
