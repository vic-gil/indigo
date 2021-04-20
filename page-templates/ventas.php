<?php
/**
 * Template Name: Ventas
 *
 * Página de Ventas
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header();?>
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
							<a href="<?=get_permalink();?>" aria-current="page">
								<?=get_the_title();?>
							</a>
						</h1>
					</li>
				</ol>
			</nav>
			<section class="info-card">
				<div class="card">
					<h2>Ventas y dirección comercial</h2>
					<div class="entry-content">
						<?php
						if ( have_posts() ): 
							while ( have_posts() ): the_post();
								the_content();
							endwhile;
						endif;
						?>
					</div>
					<div class="components">
						<h3>Contacto</h3>
						<div class="contact-type">
							<a href="tel:5530993000" title="Contáctanos por teléfono">
								<span class="ri-icon-headset"></span>
								<span class="contact-info">(55) 3099 3000 ext 1413 y 1211</span>
							</a>
						</div>
						<div class="contact-type">
							<a href="mailto:ventas@reporteindigo.com" title="Contáctanos por correo electrónico">
								<span class="ri-icon-envelope-open-text"></span>
								<span class="contact-info">(55) 3099 3000 ext 1413 y 1211</span>
							</a>
						</div>
					</div>
					<div class="wm">
						<div>
							<h3>Síguenos</h3>
						</div>
						<div class="social-content">
							<a href="https://www.facebook.com/R.Indigo" title="Síguenos en Facebook" target="_blank" class="ri-icon-facebook-f" rel="noopener noreferrer" aria-label="Síguenos en Facebook">
								<span>reporteindigo</span>
							</a>
							<a href="https://twitter.com/Reporte_Indigo" title="Síguenos en Twitter" target="_blank" class="ri-icon-twitter" rel="noopener noreferrer" aria-label="Síguenos en Twitter">
								<span>@Reporte_Indigo</span>
							</a>
							<a href="https://www.youtube.com/user/reporteindigo" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="ri-icon-youtube" rel="noopener noreferrer" aria-label="Suscríbete a nuestro canal de Youtube">
								<span>reporteindigo</span>
							</a>
							<a href="https://www.instagram.com/reporte_indigo" title="Síguenos en Instagram" target="_blank" class="ri-icon-instagram" rel="noopener noreferrer" aria-label="Síguenos en Instagram">
								<span>@reporte_indigo</span>
							</a>
						</div>
					</div>
					<div class="card-footer">
						<small>Encuentranos en: Montes Urales No. 425 Col. Lomas de Chapultepec México, Ciudad de México, C.P. 11000.</small>
					</div>
				</div>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>