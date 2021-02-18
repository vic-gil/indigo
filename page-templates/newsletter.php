<?php
/**
 * Template Name: Newsletter
 *
 * Página de Newsletter
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

get_header(); ?>
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
			<div class="col-lg-8">
				<div class="component-newsletter">
					<div class="ribbon">
						<img src="<?=IMAGESPATH;?>/svgs/premium.svg" alt="premium" title="premium" width="45px">
					</div>
					<div class="form">
						<span>Suscríbete y recibe diariamente nuestro Newsletter y acceso ilimitado a toda la información de Reporte Indigo</span>
						<div id="mc_embed_signup">
							<form action="https://reporteindigo.us5.list-manage.com/subscribe/post?u=98276b176d550186c74177fef&amp;id=9c86a81892" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div class="mc-field-group">
									<label for="mce-MMERGE1">
										Nombre  <span class="asterisk">*</span>
									</label>
									<div class="group">
										<input type="text" value="" name="MMERGE1" class="required" id="mce-MMERGE1" aria-label="email" aria-describedby="button-suscribe">
										<span class="fas fa-user"></span>
									</div>
								</div>
								<div class="mc-field-group">
									<label for="mce-EMAIL">
										Correo electrónico  <span class="asterisk">*</span>
									</label>
									<div class="group">
										<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" aria-label="email" aria-describedby="button-suscribe">
										<span class="fas fa-envelope"></span>
									</div>
								</div>
								<div class="mc-field-group">
									<strong>Selecciona tus envíos </strong>
									<div class="checks">
										<input type="checkbox" value="1" name="group[14565][1]" id="mce-group[14565]-14565-0">
									    <label for="mce-group[14565]-14565-0">Periódico diario por e-mail</label>
									</div>
								</div>
								<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>
								<div class="snd">
									<div id="captcha-cm"></div>
									<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_98276b176d550186c74177fef_9c86a81892" tabindex="-1" value=""></div>
    								<div class="hide" id="c-btn-suscribe">
    									<button type="submit" class="clear btn-general" id="mc-embedded-subscribe" name="subscribe">Suscríbete</button>
    								</div>
								</div>
							</form>

							<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
							<script type='text/javascript'>
								(function($) {
									window.fnames = new Array(); 
									window.ftypes = new Array();
									fnames[1] = 'MMERGE1';
									ftypes[1] = 'text';
									fnames[0] = 'EMAIL';
									ftypes[0] = 'email';

									$.extend($.validator.messages, {
									  required: "Este campo es obligatorio.",
									  remote: "Por favor, rellena este campo.",
									  email: "Por favor, escribe una dirección de correo válida",
									  url: "Por favor, escribe una URL válida.",
									  date: "Por favor, escribe una fecha válida.",
									  dateISO: "Por favor, escribe una fecha (ISO) válida.",
									  number: "Por favor, escribe un número entero válido.",
									  digits: "Por favor, escribe sólo dígitos.",
									  creditcard: "Por favor, escribe un número de tarjeta válido.",
									  equalTo: "Por favor, escribe el mismo valor de nuevo.",
									  accept: "Por favor, escribe un valor con una extensión aceptada.",
									  maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
									  minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
									  rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
									  range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
									  max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
									  min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
									});
								}(jQuery));

								var $mcj 			= jQuery.noConflict(true);
							</script>

							<script type="text/javascript">
								const verifyCallback = () => {
							    	document.getElementById('c-btn-suscribe').classList.remove("hide");
							    }

							    const expiredCallback = () => {
							    	document.getElementById('c-btn-suscribe').classList.add("hide");
							    }

							    var onloadCaptcha = () => {
							    	grecaptcha.render(document.getElementById('captcha-cm'), {
								      	'sitekey' 			: '6LcauzwUAAAAAMg0RysbJjHs78cvDXKli04Xt7Tp',
								      	'callback' 			: verifyCallback,
						          		'expired-callback' 	: expiredCallback
								    });
							    }
							</script>
							<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptcha&render=explicit" async defer></script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php Reporte_indigo_templates::componente_edicion(); ?>
			</div>
			<div class="col-lg-8">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Recientes');
					Reporte_indigo_templates::componente_titulo("", "Recientes");
					/**
					 * Datos transitorios para noticias recientes
					 * Use esta función para borrar los datos:
					 *
					 * delete_transient('ri_cache_recientes_6');
					**/
					if( false === $recientes = get_transient('ri_cache_recientes_6') ) {

						$recientes = new WP_Query([
							'post_type' 		=> ['ri-reporte','ri-opinion','ri-latitud','ri-indigonomics','ri-piensa','ri-fan','ri-desglose','ri-documento-indigo','ri-salida-emergencia','ri-especial'],
							'posts_per_page' 	=> 6,
							'post_status'      	=> 'publish',
							'suppress_filters' 	=> false,
							'no_found_rows' 	=> true,
							'tax_query' 		=> [
						        [
						            'taxonomy' => 'ri-categoria',
						            'field'    => 'slug',
						            'terms'    => 'enfoqueindigo',
						            'operator' => 'NOT IN'
						        ]
						    ]
						]);

						if ( ! is_wp_error( $recientes ) && $recientes->have_posts() ) {
			   				set_transient('ri_cache_recientes_6', $recientes, 1 * HOUR_IN_SECONDS );
						}

					}
					if ( $recientes->have_posts() ): 
						while ( $recientes->have_posts() ): $recientes->the_post();
							get_template_part( 'template-parts/components/ri', 'general', [ 'excerpt' => FALSE, 'category' => FALSE, 'local' => FALSE ]);
						endwhile;
					endif;
					?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="components">
					<?php
					Reporte_indigo_test::comment('Lo más visto');
					Reporte_indigo_templates::componente_titulo("", "Lo más visto");
					$posts_types = unserialize(POST_TYPE);
					$posts_types = is_array($posts_types) ? implode(",", $posts_types) : "any";
					if ( function_exists('wpp_get_mostpopular') ) {
						wpp_get_mostpopular([
							'limit' 		=> 6,
							'range' 		=> 'last7days',
							'post_type' 	=> $posts_types,
							'cat' 			=> '',
							'title_length' 	=> 55
						]);
					} else {
						Reporte_indigo_test::log('No existe el plugin para popular post');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>