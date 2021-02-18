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
<html <?php language_attributes(); ?> class="no-js">
	<?php header("Refresh: 1800;"); ?>
	<head>
		<title><?php if (is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">
		<meta name="author" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?>" />
        <meta name="copyright" content="<?php bloginfo('name'); ?>" />
        <meta property="fb:app_id" content="349644108939477" />
    	<meta property="fb:pages" content="92465443899" /> 
    	<meta name="theme-color" content="#3474be" />
    	<meta name="google-site-verification" content="NQS76n_mTHZfHmt620zjPbhyWfGC5DComdPe1jNQw00" />
    	<meta name="google-site-verification" content="4Bt7KHVG0kzwetxi_LnrYR8QUCkKFdSNGA4PU2hpaDs" />
    	<meta name="msvalidate.01" content="7CFA2C8C16223F10EB60365CBAD65A67" />
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="robots" content="noindex,follow"/>	
		<meta name="application-name" content="<?=bloginfo('name');?>"/>
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="<?=IMAGESPATH;?>/iconos/icon144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?=IMAGESPATH;?>/iconos/icon70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?=IMAGESPATH;?>/iconos/icon150x150.png" />
		<meta name="msapplication-square310x310logo" content="<?=IMAGESPATH;?>/iconos/icon310x310.png" />
		<link rel="shortcut icon" href="<?=IMAGESPATH;?>/iconos/icon16x16.png" />
		<link rel="apple-touch-icon" href="<?=IMAGESPATH;?>/iconos/icon192x192.png">
		<link rel="icon" type="image/png" sizes="192x192" href="<?=IMAGESPATH;?>/iconos/icon192x192.png" />
		<?php wp_head(); ?>
		<?php $link_newsletter = get_permalink(get_page_by_path( 'Newsletter' ));?>
	</head>
	<body <?php body_class();?>>
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
						<a href="<?=get_permalink(get_page_by_path( 'Newsletter' ));?>"><span class="fas fa-plus-circle"></span> SUSCRÍBETE</a>
					</div>
				</div>
			</div>
			<?php 
			Reporte_indigo_test::comment('Etiqueta de dominio');
			Reporte_indigo_templates::componente_tag_domain( home_url(), get_bloginfo('name'), get_option( 'general_options_ri' ));
			?>
			<?php
			Reporte_indigo_test::comment('Encabezado desktop');
			?>
			<div class="navmain">
				<div class="sx1">
					<div class="nav-social">
						<ul>
							<li>
								<a href="https://www.facebook.com/R.Indigo" title="Síguenos en Facebook" target="_blank" class="fab fa-facebook-f" rel="noopener noreferrer" aria-label="Síguenos en Facebook">
									<span>Facebook</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/Reporte_Indigo" title="Síguenos en Twitter" target="_blank" class="fab fa-twitter" rel="noopener noreferrer" aria-label="Síguenos en Twitter">
									<span>Twitter</span>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/user/reporteindigo" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="fab fa-youtube" rel="noopener noreferrer" aria-label="Suscríbete a nuestro canal de Youtube">
									<span>Youtube</span>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/reporte_indigo" title="Síguenos en Instagram" target="_blank" class="fab fa-instagram" rel="noopener noreferrer" aria-label="Síguenos en Instagram">
									<span>Instagram</span>
								</a>
							</li>
							<li>
								<a href="https://t.me/rindigo_noticias" title="Suscríbete al grupo de Telegram" target="_blank" class="fab fa-telegram-plane" rel="noopener noreferrer" aria-label="Suscríbete al grupo de Telegram">
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
						<a href="<?=get_permalink(get_page_by_path( 'Newsletter' ));?>"><span class="fas fa-plus-circle"></span> SUSCRÍBETE</a>
					</div>
				</div>
				<div class="sx2">
					<div class="nav-burger exec" id="exec-menu">
						<span class="fas fa-bars"></span>
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
						<span class="fas fa-search"></span>
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
						<button class="fas fa-search" role="button" id="button-search" type="submit"><span>Búsqueda</span></button>
					</form>
				</div>
			</div>

		</header>
