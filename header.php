<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<?php 
		header("Refresh: 1800;");
		$keywords 		= header::get_tags();
		$keywords 		= is_array($keywords) ? implode(",", $keywords) : bloginfo('name');
		$url 			= home_url();
		$subdominio	 	= $_SERVER['SERVER_NAME'];
		$arrDominioDiv	= explode('.', $subdominio);
		$subdominio 	= $arrDominioDiv[0]; 
	?>
	<head>
		<title><?php if (is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">
		<meta name="description" content="<?php if ( is_single() ) { if(is_single() && !empty($post->post_excerpt) ) { echo get_the_excerpt(); } else { single_post_title('', true); } } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>">
		<meta name="author" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); } ?>" />
		<meta name="keywords" content="<?=$keywords;?>">
        <meta name="copyright" content="<?php bloginfo('name'); ?>" />
        <meta property="fb:app_id" content="349644108939477" />
    	<meta property="fb:pages" content="92465443899" /> 
    	<meta name="theme-color" content="#3474be" />
    	<meta name="google-site-verification" content="NQS76n_mTHZfHmt620zjPbhyWfGC5DComdPe1jNQw00" />
    	<meta name="google-site-verification" content="4Bt7KHVG0kzwetxi_LnrYR8QUCkKFdSNGA4PU2hpaDs" />
    	<meta name="msvalidate.01" content="7CFA2C8C16223F10EB60365CBAD65A67" />
    	<meta http-equiv="cache-control" content="public">
		<meta http-equiv="cache-control" content="max-age=43200" />
		<meta http-equiv="cache-control" content="must-revalidate" />
		<meta http-equiv="expires" content="43200" />
		<meta http-equiv="pragma" content="public" />
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		
		<meta name="robots" content="noindex,follow"/>	
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="MobileOptimized" content="width">
  		<meta name="HandheldFriendly" content="true">
  		<meta name="apple-mobile-web-app-capable" content="yes">
  		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

		<?php if($subdominio == "www"){ ?>
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">		
		<?php } ?>

		<meta name="application-name" content="<?=bloginfo('name');?>"/>
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="<?=IMAGESPATH;?>/iconos/icon144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?=IMAGESPATH;?>/iconos/icon70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?=IMAGESPATH;?>/iconos/icon150x150.png" />
		<meta name="msapplication-square310x310logo" content="<?=IMAGESPATH;?>/iconos/icon310x310.png" />
		
		<link rel="canonical" href="<?=site_url(); ?>" />
		<link rel="manifest" href="<?=PAGESPATH;?>/utilerias/manifest.json">
		<link rel="shortcut icon" href="<?=IMAGESPATH;?>/iconos/icon16x16.png" />

		<link rel="apple-touch-icon-precomposed" sizes="310x310" href="<?=IMAGESPATH;?>/iconos/icon310x310.png" />
		<link rel="apple-touch-icon-precomposed" sizes="196x196" href="<?=IMAGESPATH;?>/iconos/icon196x196.png" />
		<link rel="apple-touch-icon-precomposed" sizes="192x192" href="<?=IMAGESPATH;?>/iconos/icon192x192.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=IMAGESPATH;?>/iconos/icon152x152.png" />
		<link rel="apple-touch-icon-precomposed" sizes="150x150" href="<?=IMAGESPATH;?>/iconos/icon150x150.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=IMAGESPATH;?>/iconos/icon144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?=IMAGESPATH;?>/iconos/icon128x128.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=IMAGESPATH;?>/iconos/icon120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=IMAGESPATH;?>/iconos/icon114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="96x96" href="<?=IMAGESPATH;?>/iconos/icon96x96.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=IMAGESPATH;?>/iconos/icon76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=IMAGESPATH;?>/iconos/icon72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="70x70" href="<?=IMAGESPATH;?>/iconos/icon70x70.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?=IMAGESPATH;?>/iconos/icon60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=IMAGESPATH;?>/iconos/icon57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="48x48" href="<?=IMAGESPATH;?>/iconos/icon48x48.png" />
		<link rel="apple-touch-icon-precomposed" sizes="32x32" href="<?=IMAGESPATH;?>/iconos/icon32x32.png" />
		<link rel="apple-touch-icon-precomposed" sizes="16x16" href="<?=IMAGESPATH;?>/iconos/icon16x16.png" />
	
		<link rel="icon" type="image/png" sizes="310x310" href="<?=IMAGESPATH;?>/iconos/icon310x310.png" />
		<link rel="icon" type="image/png" sizes="196x196" href="<?=IMAGESPATH;?>/iconos/icon196x196.png" />
		<link rel="icon" type="image/png" sizes="192x192" href="<?=IMAGESPATH;?>/iconos/icon192x192.png" />
		<link rel="icon" type="image/png" sizes="152x152" href="<?=IMAGESPATH;?>/iconos/icon152x152.png" />
		<link rel="icon" type="image/png" sizes="150x150" href="<?=IMAGESPATH;?>/iconos/icon150x150.png" />
		<link rel="icon" type="image/png" sizes="144x144" href="<?=IMAGESPATH;?>/iconos/icon144x144.png" />
		<link rel="icon" type="image/png" sizes="128x128" href="<?=IMAGESPATH;?>/iconos/icon128x128.png" />
		<link rel="icon" type="image/png" sizes="120x120" href="<?=IMAGESPATH;?>/iconos/icon120x120.png" />
		<link rel="icon" type="image/png" sizes="114x114" href="<?=IMAGESPATH;?>/iconos/icon114x114.png" />
		<link rel="icon" type="image/png" sizes="96x96" href="<?=IMAGESPATH;?>/iconos/icon96x96.png" />
		<link rel="icon" type="image/png" sizes="76x76" href="<?=IMAGESPATH;?>/iconos/icon76x76.png" />
		<link rel="icon" type="image/png" sizes="72x72" href="<?=IMAGESPATH;?>/iconos/icon72x72.png" />
		<link rel="icon" type="image/png" sizes="70x70" href="<?=IMAGESPATH;?>/iconos/icon70x70.png" />
		<link rel="icon" type="image/png" sizes="60x60" href="<?=IMAGESPATH;?>/iconos/icon60x60.png" />
		<link rel="icon" type="image/png" sizes="57x57" href="<?=IMAGESPATH;?>/iconos/icon57x57.png" />
		<link rel="icon" type="image/png" sizes="48x48" href="<?=IMAGESPATH;?>/iconos/icon48x48.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?=IMAGESPATH;?>/iconos/icon32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?=IMAGESPATH;?>/iconos/icon16x16.png" />

		<script type="application/ld+json">
		{
			"@context" 				: "http://schema.org/",
			"@type" 				: "Organization",
			"url" 					: "<?=home_url();?>",
			"telephone" 			: "(+52) 55 2623 0055",
			"address" 				: {
				"@type" 			: "PostalAddress",
				"streetAddress" 	: "Calle Montes Urales 425, Lomas - Virreyes, Lomas de Chapultepec V Secc",
				"addressLocality" 	: "Ciudad de México, México",
				"postalCode"		: "11000"
			},
			"email" 				: "web@capitalmedia.mx",
			"sameAs" 				: [
				"https://plus.google.com/+reporteindigo",
				"https://www.facebook.com/R.Indigo/",
				"https://twitter.com/Reporte_Indigo",
				"https://www.youtube.com/user/reporteindigo",
				"https://www.instagram.com/reporte_indigo",
				"https://t.me/rindigo_noticias"
			]
		}
		</script>

		<!-- Begin comScore Tag NUEVO-->
		<script>
		  	var _comscore = _comscore || [];
		  	_comscore.push({ c1: "2", c2: "19249540" });
		  	(function() {
		    	var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.defer = true;
		    	s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
		    	el.parentNode.insertBefore(s, el);
		  	})();
		</script>
		<noscript>
		  	<img src="http://b.scorecardresearch.com/p?c1=2&c2=19249540&cv=2.0&cj=1" title="<?=bloginfo('name');?>" alt="<?=bloginfo('name');?>" />
		</noscript>
		<!-- End comScore Tag NUEVO-->

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5PFW88Q');</script>
		<!-- End Google Tag Manager -->

		<?php wp_head(); ?>
		<?php $link_newsletter = get_permalink(get_page_by_path( 'Newsletter' ));?>
	</head>
	<body>
		<header>
			<?php Reporte_indigo_test::comment('Fixed'); ?>
			<nav class="navbar" style="display: none;">
				<div class="content">
					<div>
						<a href="<?=home_url();?>" title="<?=bloginfo('name');?>">
							<img src="<?=IMAGESPATH;?>/generales/logo-circle-blue.png" title="<?=bloginfo('name');?>" width="30" height="28" />
						</a>
					</div>
					<div class="newsletter">
						<a href="<?=get_permalink(get_page_by_path( 'Newsletter' ));?>"><span class="fas fa-plus-circle"></span> SUSCRÍBETE</a>
					</div>
				</div>
			</nav>

			<?php 
			Reporte_indigo_test::comment('Etiqueta de dominio');
			
			if(!header::tag_domain())
				Reporte_indigo_templates::componente_tag_domain( home_url(), get_bloginfo('name'), "www.reporteindigo.com");
			?>
		</header>

		<header>
			<!-- Encabezado mobile -->
			<div class="container d-lg-none d-block">
				<div class="row">
					<div class="col-md-1 col-2 bgs-105 text-center p-0">
						<div class="d-flex flex-row bd-highlight h-100 align-items-center justify-content-center">
						  	<div class="bd-highlight">
						  		<a class="nav-link bgs-105 btn-action-toggle" alt="" title="" data-bar="#menu-hiden" data-icon="fa-bars" id="_menu_mobile">
						  			<i class="fas fa-bars col-100"></i>
						  		</a>	
						  	</div>
						</div>
					</div>
					<div class="col-md-10 col-8 bgs-102 py-2 text-center">
						<a href="<?=$url;?>" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
							<img src="<?=IMAGESPATH;?>/generales/logo-light.png" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
						</a>
					</div>
					<div class="col-md-1 col-2 bgs-105 text-center p-0">
						<div class="d-flex flex-row bd-highlight h-100 align-items-center justify-content-center">
						  	<div class="bd-highlight">
						  		<a class="nav-link bgs-105 btn-action-toggle" alt="" title="" data-bar="#search-hiden" data-icon="fa-search" id="_search_mobile">
						  			<i class="fas fa-search col-100"></i>
						  		</a>
						  	</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Encabezado desktop -->
			<div class="container py-3 bgs-102 d-none d-lg-block">
				<div class="row">
					<div class="col-lg-4">
						<ul class="nav nav-fill">
						  	<li class="nav-item">
						    	<a class="nav-link" href="https://www.facebook.com/R.Indigo" alt="https://www.facebook.com/R.Indigo" title="https://www.facebook.com/R.Indigo" target="_blank"><i class="col-103 fsize-16 fab fa-facebook-f"></i></a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link" href="https://twitter.com/Reporte_Indigo" alt="https://twitter.com/Reporte_Indigo" title="https://twitter.com/Reporte_Indigo" target="_blank"><i class="col-103 fsize-16 fab fa-twitter"></i></a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link" href="https://www.youtube.com/user/reporteindigo" alt="https://www.youtube.com/user/reporteindigo" title="https://www.youtube.com/user/reporteindigo" target="_blank"><i class="col-103 fsize-16 fab fa-youtube"></i></a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link" href="https://www.instagram.com/reporte_indigo" alt="https://www.instagram.com/reporte_indigo" title="https://www.instagram.com/reporte_indigo" target="_blank"><i class="col-103 fsize-16 fab fa-instagram"></i></a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link" href="https://t.me/rindigo_noticias" alt="https://t.me/rindigo_noticias" title="https://t.me/rindigo_noticias" target="_blank"><i class="col-103 fsize-16 fab fa-telegram-plane"></i></a>
						  	</li>
						</ul>
					</div>
					<div class="col-lg-4 text-center">
						<a href="<?=$url;?>" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
							<img class="mwx-250" src="<?=IMAGESPATH;?>/generales/logo-light-original.png" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
						</a>
					</div>
					<div class="col-lg-4">
						<ul class="nav justify-content-end"> <!-- nav-fill -->
						  	<li class="nav-item">
						    	<a class="nav-link" href="<?=$link_newsletter;?>" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
						    		<span class="col-104 roboto-regular fsize-10"><i class="col-103 fSize14 fas fa-plus-circle"></i> SUSCRÍBETE</span>
						    	</a>
						  	</li>
						  	<!-- <li class="nav-item">
						  	  	<a class="nav-link" href="" alt="<?=bloginfo('name');?>" title="<?=bloginfo('name');?>">
						  	  		<span class="col-104 roboto-regular fsize-10">INICIAR SESIÓN</span>
						  	  	</a>
						  	</li> -->
						</ul>
					</div>
				</div>
			</div>

			<!-- Menu -->
			<div class="container d-none d-lg-block">
				<div class="row">
					<div class="col-12 p-0 bgs-103">
						<ul class="nav nav-fill nav-menu-descktop">
						  	<li class="nav-item">
						    	<a class="nav-link bgs-105 btn-action-toggle" alt="" title="" data-bar="#menu-hiden" data-icon="fa-bars" id="_menu"><i class="fas fa-bars col-100"></i></a>
						  	</li>
						  	<li class="nav-item nav-item-dd position-relative">
						  	  	<a class="nav-link <?php 'ri-reporte' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('reporte');?>" alt="REPORTE" title="REPORTE">REPORTE</a>
									
						  	  	<div class="c-subitems">
						  	  		<?php $link_ciudad = get_permalink(get_page_by_path( 'Ciudad' ));?>
							    	<a href="<?=$link_ciudad.'?city=cdmx';?>" alt="CDMX" title="CDMX">CDMX</a>
							    	<a href="<?=$link_ciudad.'?city=gdl';?>" alt="GDL" title="GDL">GDL</a>
							    	<a href="<?=$link_ciudad.'?city=mty';?>" alt="MTY" title="MTY">MTY</a>
							  	</div>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-latitud' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('latitud');?>" alt="LATITUD" title="LATITUD">LATITUD</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-indigonomics' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('indigonomics');?>" alt="INDIGONÓMICS" title="INDIGONÓMICS">INDIGONÓMICS</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-piensa' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('piensa');?>" alt="PIENSA" title="PIENSA">PIENSA</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-fan' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('fan');?>" alt="FAN" title="FAN">FAN</a>
						  	</li>
						  	<li class="nav-item">
						  		<a class="nav-link <?php is_page( 'indigo-noticias' ) ? print_r('active') : ''; ?>" href="<?=site_url('indigo-noticias');?>" alt="INDIGO LIVE" title="INDIGO LIVE">INDIGO LIVE</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php is_page( 'indigo-videos' ) ? print_r('active') : ''; ?>" href="<?=site_url('indigo-videos');?>" alt="INDIGO PLAY" title="INDIGO PLAY">INDIGO PLAY</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-desglose' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('desglose');?>" alt="DESGLOSE" title="DESGLOSE">DESGLOSE</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link <?php 'ri-opinion' == get_post_type() ? print_r('active') : ''; ?>" href="<?=site_url('opinion');?>" alt="OPINIÓN" title="OPINIÓN">OPINIÓN</a>
						  	</li>
						  	<li class="nav-item">
						  	  	<a class="nav-link bgs-105 btn-action-toggle" alt="" title="" data-bar="#search-hiden" data-icon="fa-search" id="_search"><i class="fas fa-search col-100"></i></a>
						  	</li>
						</ul>
					</div>
				</div>
			</div>
		
			<!-- Hide menu -->
			<div class="container d--none c-hiddens" id="menu-hiden">
				<div class="row">
					<div class="col-12 bgs-105 py-3">
						<ul class="list-group">
						  	<li class="list-group-item">
						  		<a href="<?=site_url('reporte');?>" alt="REPORTE" title="REPORTE">REPORTE</a>
						  		<ul class="list-group">
						  			<li class="list-group-item"><a href="<?=$link_ciudad.'?city=cdmx';?>" alt="CDMX" title="CDMX">CDMX</a></li>
									<li class="list-group-item"><a href="<?=$link_ciudad.'?city=gdl';?>" alt="GDL" title="GDL">GDL</a></li>
									<li class="list-group-item"><a href="<?=$link_ciudad.'?city=mty';?>" alt="MTY" title="MTY">MTY</a></li>
						  		</ul>
						  	</li>
							<li class="list-group-item"><a href="<?=site_url('latitud');?>" alt="LATITUD" title="LATITUD">LATITUD</a></li>
							<li class="list-group-item"><a href="<?=site_url('indigonomics');?>" alt="INDIGONÓMICS" title="INDIGONÓMICS">INDIGONÓMICS</a></li>
							<li class="list-group-item"><a href="<?=site_url('piensa');?>" alt="PIENSA" title="PIENSA">PIENSA</a></li>
							<li class="list-group-item"><a href="<?=site_url('fan');?>" alt="FAN" title="FAN">FAN</a></li>
							<li class="list-group-item"><a href="<?=site_url('indigo-noticias');?>" alt="INDIGO LIVE" title="INDIGO LIVE">INDIGO LIVE</a></li>
							<li class="list-group-item"><a href="<?=site_url('indigo-videos');?>" alt="INDIGO PLAY" title="INDIGO PLAY">INDIGO PLAY</a></li>
							<li class="list-group-item"><a href="<?=site_url('desglose');?>" alt="DESGLOSE" title="DESGLOSE">DESGLOSE</a></li>
							<li class="list-group-item"><a href="<?=site_url('opinion');?>" alt="OPINIÓN" title="OPINIÓN">OPINIÓN</a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Search -->
			<div class="container d--none c-hiddens" id="search-hiden">
				<div class="row">
					<div class="col-12 bgs-105 py-2">
						<form method="get" action="<?=bloginfo('url');?>">
							<div class="input-group group-search">
							  	<input 	type="text"
							  			class="form-control focus-100 col-100" 
							  			placeholder="buscar..." 
							  			aria-label="buscar..." 
							  			aria-describedby="button-search"
							  			name="s"
							  			autocomplete="off">
							  	<div class="input-group-append">
							    	<button class="btn focus-100" type="submit" id="button-search">
							    		<i class="fas fa-search col-100"></i>		
							    	</button>
							  	</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</header>
?>
