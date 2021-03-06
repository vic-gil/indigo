<?php $url = home_url(); ?>
		<footer class="pie">
			<div class="footer-sections container">
				<div class="components">
					<div class="footer-follow">
						<div class="footer-title">
							<span>Síguenos</span>
						</div>
						<ul>
							<li>
								<a href="https://www.facebook.com/R.Indigo" title="Síguenos en Facebook" target="_blank" class="ri-icon-facebook-f" rel="noopener noreferrer" aria-label="Síguenos en Facebook">
									<span>reporteindigo</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/Reporte_Indigo" title="Síguenos en Twitter" target="_blank" class="ri-icon-twitter" rel="noopener noreferrer" aria-label="Síguenos en Twitter">
									<span>@Reporte_Indigo</span>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/user/reporteindigo" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="ri-icon-youtube" rel="noopener noreferrer" aria-label="Suscríbete a nuestro canal de Youtube">
									<span>reporteindigo</span>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/reporte_indigo" title="Síguenos en Instagram" target="_blank" class="ri-icon-instagram" rel="noopener noreferrer" aria-label="Síguenos en Instagram">
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
							'depth'          => 1
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
							'depth'          => 1
						]);
						?>
					</div>
					<div class="footer-legal">
						<div>
							<a href="<?=$url;?>" title="<?=get_bloginfo('name');?>">
								<img src="<?=IMAGESPATH;?>/generales/logo-cs.png" width="187" height="30" alt="<?=get_bloginfo('name');?>" />
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
	<div class="modal fade" id="m-jwplayer" tabindex="-1" role="dialog" aria-labelledby="jwModal" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="jwModal">IndigoPlay</h5>
        			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
      				<div class="title">
      					<h2></h2>
      				</div>
      				<div id="modal-player">
      					<figure>
      						<picture>
      							
      						</picture>
      					</figure>
      				</div>
      			</div>
      			<div class="modal-footer">
        			<button data-bs-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal jwplayer -->
	<div class="modal fade" id="m-share" tabindex="-1" role="dialog" aria-labelledby="shareModal" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="shareModal">Comparte</h5>
        			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
      				<div class="title">
      					<h2></h2>
      				</div>
      				<div class="share-networks">
      					<a href="javascript:void(0);" class="ri-icon-facebook-square" title="Comparte está nota en facebook" aria-label="Comparte está nota en facebook" role="button" onclick="share('facebook');">
      						<span>Facebook</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-twitter-square" title="Comparte está nota en twitter" aria-label="Comparte está nota en twitter" role="button" onclick="share('twitter');">
	      					<span>Twitter</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-whatsapp-square" title="Comparte está nota en whatsapp" aria-label="Comparte está nota en whatsapp" role="button" onclick="share('whatsapp');">
	      					<span>Whatsapp</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-line" title="Comparte está nota en line" aria-label="Comparte está nota en line" role="button" onclick="share('line');">
	      					<span>Line</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-telegram" title="Comparte está nota en telegram" aria-label="Comparte está nota en telegram" role="button" onclick="share('telegram');">
	      					<span>Telegram</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-tumblr-square" title="Comparte está nota en tumblr" aria-label="Comparte está nota en tumblr" role="button" onclick="share('tumblr');">
	      					<span>Tumblr</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-linkedin" title="Comparte está nota en linkedin" aria-label="Comparte está nota en linkedin" role="button" onclick="share('linkedin');">
	      					<span>Linkedin</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-flipboard" title="Comparte está nota en flipboard" aria-label="Comparte está nota en flipboard" role="button" onclick="share('flipboard');">
	      					<span>Flipboard</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-pinterest-square" title="Comparte está nota en pinterest" aria-label="Comparte está nota en pinterest" role="button" onclick="share('pinterest');">
	      					<span>Pinterest</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-reddit-square" title="Comparte está nota en reddit" aria-label="Comparte está nota en reddit" role="button" onclick="share('reddit');">
	      					<span>Reddit</span>
	      				</a>
	      				<a href="javascript:void(0);" class="ri-icon-vk" title="Comparte está nota en VK" aria-label="Comparte está nota en VK" role="button" onclick="share('vk');">
	      					<span>VK</span>
	      				</a>
      				</div>
      			</div>
      			<div class="modal-footer">
        			<button data-bs-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

</html>