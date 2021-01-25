<?php $url = home_url(); ?>
		<footer class="pie">
			<div class="footer-sections container">
				<div class="row">
					<div class="footer-follow">
						<div class="footer-title">
							<span>Síguenos</span>
						</div>
						<ul>
							<li>
								<a href="https://www.facebook.com/R.Indigo" title="Síguenos en Facebook" target="_blank" class="fab fa-facebook-f" rel="noopener noreferrer" aria-label="Síguenos en Facebook">
									<span>reporteindigo</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/Reporte_Indigo" title="Síguenos en Twitter" target="_blank" class="fab fa-twitter" rel="noopener noreferrer" aria-label="Síguenos en Twitter">
									<span>@Reporte_Indigo</span>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/user/reporteindigo" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="fab fa-youtube" rel="noopener noreferrer" aria-label="Suscríbete a nuestro canal de Youtube">
									<span>reporteindigo</span>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/reporte_indigo" title="Síguenos en Instagram" target="_blank" class="fab fa-instagram" rel="noopener noreferrer" aria-label="Síguenos en Instagram">
									<span>@reporte_indigo</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="footer-partners">
						<div class="footer-title">
							<span>Sitios del grupo</span>
						</div>
						<?php
						wp_nav_menu([
							'theme_location' => 'sites',
							'menu_class'     => 'menu-sitios',
							'container'      => false,
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						]);
						?>
					</div>
					<div class="footer-help">
						<div class="footer-title">
							<span>Ayuda</span>
						</div>
						<?php
						wp_nav_menu([
							'theme_location' => 'help',
							'menu_class'     => 'menu-ayuda',
							'container'      => false,
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						]);
						?>
					</div>
					<div class="footer-legal">
						<div>
							<a href="<?=$url;?>" title="<?=get_bloginfo('name');?>">
								<img src="<?=IMAGESPATH;?>/generales/logo-cs.png" alt="<?=get_bloginfo('name');?>" title="<?=get_bloginfo('name');?>" />
							</a>
						</div>
						<div>
							<span>
								Montes Urales No. 425 Col. Lomas de Chapultepec México, Ciudad de México, C.P. 11000.
							</span>
						</div>
						<div class="legal-contact">
							<span>Contacto: <a href="tel:5530993000" alt="(55) 30 99 3000" title="(55) 30 99 3000">(55) 30 99 3000</a> · <a href="mailto:web@capitalmedia.mx" title="web@capitalmedia.mx">web@capitalmedia.mx</a></span>
						</div>
						<div>
							<span>Todos los Derechos Reservados.</span>
						</div>
						<div>
							<span>Capital Media. Copyright © 2020.</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>

	<!-- Modal jwplayer -->
	<div class="modal fade" id="m-jwplayer" tabindex="-1" role="dialog" aria-labelledby="m-jwplayer-cente" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="m-jwplayer-section">IndigoPlay</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body text-center">
	     			<h2 class="roboto-bold fsize-16"></h2>
	     			<div class="row mt-3">
	     				<div class="col-12">
							<div class="swiper-container" id="sc-jwp">
							    <div class="swiper-wrapper"></div>
							    <div class="d-flex bd-highlight position-relative align-items-center bgs-108">
								  	<div class="bd-highlight">
								  		<div id="swb-jwp-prev">
								  			<button type="button" class="btn">
								  				<i class="fas fa-caret-left col-104 fsize-14"></i>
								  			</button>
								  		</div>
								  	</div>
								  	<div class="flex-grow-1 bd-highlight">
								  		<div class="swiper-pagination" id="sp-jwp"></div>
								  	</div>
								  	<div class="bd-highlight">
								  		<div id="swb-jwp-next">
								  			<button type="button" class="btn">
								  				<i class="fas fa-caret-right col-104 fsize-14"></i>
								  			</button>
								  		</div>
								  	</div>
								</div>
							</div>
	     				</div>
	     			</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<!-- Modal jwplayer -->
	<div class="modal fade" id="m-share" tabindex="-1" role="dialog" aria-labelledby="m-share-cente" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="m-jwplayer-section">Comparte</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body text-center">
	     			<h2 class="roboto-bold fsize-16"></h2>
	     			<div class="row justify-content-center">
						<div class="col-auto my-3 text-center">
							<button type="button" class="btn item-social bgsfb100a focus-100 m-2" alt="facebook" title="facebook"><i class="fab fa-facebook-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgstw100a focus-100 m-2" alt="twitter" title="twitter"><i class="fab fa-twitter-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgswa100a focus-100 m-2" alt="whatsapp" title="whatsapp"><i class="fab fa-whatsapp-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgsln100a focus-100 m-2" alt="line" title="line"><i class="fab fa-line fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgstg100a focus-100 m-2" alt="telegram" title="telegram"><i class="fab fa-telegram fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgstb100a focus-100 m-2" alt="tumblr" title="tumblr"><i class="fab fa-tumblr-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgsld100a focus-100 m-2" alt="linkedin" title="linkedin"><i class="fab fa-linkedin fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgsfd100a focus-100 m-2" alt="flipboard" title="flipboard"><i class="fab fa-flipboard fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgspt100a focus-100 m-2" alt="pinterest" title="pinterest"><i class="fab fa-pinterest-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgsrd100a focus-100 m-2" alt="reddit" title="reddit"><i class="fab fa-reddit-square fsize-18 col-100"></i></button>
							<button type="button" class="btn item-social bgsvk100a focus-100 m-2" alt="vk" title="vk"><i class="fab fa-vk fsize-18 col-100"></i></button>
						</div>
					</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</html>
