<?php
/**
 * Reporte_Indigo_Scripts Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee scripts por defecto
 * 
**/

class Reporte_Indigo_Scripts {

	/**
	 * Animación para la barra
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function scroll($echo = TRUE) {
		$script = '<script type="text/javascript">"use strict";const showMenu=async(e,t,c)=>{document.getElementById(e).addEventListener("click",function(o){for(let t of document.querySelectorAll(".exec"))e!==t.id&&t.classList.remove(c);for(let e of document.querySelectorAll(".listen"))t!==e.id&&e.classList.remove(c);this.classList.toggle(c),document.getElementById(t).classList.toggle(c)})};(async()=>{showMenu("exec-search","listen-search","activo"),showMenu("exec-menu","listen-menu","activo"),document.addEventListener("scroll",function(){(document.documentElement.scrollTop||document.body.scrollTop)<document.querySelector(".navmain").offsetHeight?document.querySelector(".navbar").classList.remove("active"):document.querySelector(".navbar").classList.add("active")},{passive:!0})})();</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * Configuraciones para correr swiper
	 *
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void String si $echo es falso o vacío si echo es verdadero;
	**/
	static function swiper($echo = TRUE) {

		if( is_home() ) {
			$script = '<script type="text/javascript">const loadScript=(e,t)=>{let s,n,i;(s=document.createElement("script")).type="text/javascript",s.src=e,s.onload=s.onreadystatechange=function(){n||this.readyState&&"complete"!=this.readyState||(n=!0,t())},(i=document.getElementsByTagName("script")[0]).parentNode.insertBefore(s,i)};let swiperInstances=[];const initSlider=()=>{sliders("sc-home-top",1,1),sliders("sc-home-enfoque",2,2),sliders("sc-home-desglose",3,1)},sliders=(e,t,s)=>{let n=document.getElementById(e);if(void 0!==n&&null!=n){let n={slidesPerView:1,spaceBetween:15,autoHeight:!0};1==s&&(n.navigation={nextEl:".sw-arrow.next",prevEl:".sw-arrow.prev"},n.on={slideChangeTransitionEnd:()=>{for(let e of document.querySelectorAll(".pagination span"))e.classList.remove("active");let e=document.querySelectorAll(".pagination");for(let s of e)s.querySelector(`span:nth-child(${swiperInstances[t].activeIndex+1})`).classList.add("active")}}),2==s&&(n.pagination={el:"#sp-enfoque",clickable:!0}),swiperInstances[t]=new Swiper(`#${e}`,n)}};loadScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js",initSlider);</script>';
		}

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la carga diferida de imagenes
	 * nativa del navegador o por medio del plugin lazysizes
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/

	static function lazyloading($native = FALSE, $echo = TRUE) {
		$lazy = $native ? "true" : "false";
		$script = '<script type="text/javascript">"use strict";let nativeLazyLoad=' . $lazy . ';(async()=>{if(nativeLazyLoad){if("loading"in HTMLImageElement.prototype){document.querySelectorAll("img.lazyload").forEach(e=>{e.dataset.src&&(e.src=e.dataset.src),e.dataset.srcset&&(e.srcset=e.dataset.srcset)})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}if("loading"in HTMLIFrameElement.prototype){document.querySelectorAll(\'iframe[loading="lazy"]\').forEach(e=>{e.src=e.dataset.src})}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js",document.body.appendChild(e)}})();</script>';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	/**
	 * El script para habilitar la carga diferida de imagenes
	 * nativa del navegador o por medio del plugin lazysizes
	 *
	 * @param bool  $native Activa el lazyload
	 * @param bool  $echo Define el formato de cadena o impresión
	 *
	 * @return String|void JS Script;
	**/
	static function jwplayer($echo = TRUE) {
		$script = '';

		if( $echo )
			echo $script;
		else
			return $script;
	}

	function on_loaded() {
		self::lazyloading(FALSE);
		self::scroll();
		self::swiper();
		self::jwplayer();
	}

}

$plugin = new Reporte_Indigo_Scripts();
add_action('wp_footer', array($plugin, 'on_loaded'), 99);



