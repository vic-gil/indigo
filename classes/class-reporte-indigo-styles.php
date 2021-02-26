<?php
/**
 * Reporte_Indigo_Styles Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que provee estilos críticos por sección
 * 
**/

class Reporte_Indigo_Styles {

	/**
	 * Estilo del componente breadcrumb
	 *
	 * @return void
	**/

	static function style_breadcrumb() {
		$style = '.breadcrumb{margin-bottom:1rem}.breadcrumb>*{display:-ms-flexbox;display:flex;align-items:center;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:.75rem 1rem;background-color:#e9ecef;border-radius:.25rem;align-items:center}.breadcrumb ol{list-style:none}.breadcrumb ol li{display:inline-flex;font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;line-height:1.2;line-height:1.2}.breadcrumb ol li+li:before{content:"/";padding:0 .5rem}.breadcrumb ol h1{font-size:1rem;color:#3e4c59}.breadcrumb ol a{font-size:1rem;color:#3e4c59}.breadcrumb ol a[aria-current=page]{color:#6c757d}';
		return $style;
	}

	/**
	 * Estilo del componente deslizador
	 *
	 * @return void
	**/

	static function style_deslizador() {
		$style = '.deslizador picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.deslizador picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.deslizador picture img{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.deslizador .entry-data{position:relative;border-radius:.7rem;background:#3474be;text-align:center;margin-top:-40px!important;padding:15px!important;z-index:2;flex:0 0 auto;width:83.33333%;margin-left:8.33333%}.deslizador .entry-data{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}@media (min-width:576px){.deslizador .entry-data{margin-top:-125px!important}}.deslizador .entry-data h2 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:16pt!important;color:#eaeced}.deslizador .entry-data h2 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.deslizador .entry-data h2 a{font-size:32pt!important}}.deslizador .entry-data .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#eaeced;padding-top:1rem!important;margin:0!important}.deslizador .entry-data .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.deslizador .entry-data .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.deslizador .entry-data address{margin-top:10px}.deslizador .entry-data address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#77b5f7;margin:0!important}.deslizador .entry-data .pagination span{color:#fff;font-size:8pt!important;padding:.5rem 1rem;transition:ease .3s!important;cursor:pointer;}@media (min-width:576px){.deslizador .entry-data .pagination span{font-size:12pt!important}}.deslizador .entry-data .pagination span.active{color:#2dc3f6}.sw-arrow{position:absolute;top:calc(50% - 25px);padding:.5rem;cursor:pointer;z-index:3}@media (min-width:576px){.sw-arrow{padding:1.5rem}}.sw-arrow.prev{left:1rem}.sw-arrow.next{right:1rem}@media (min-width:576px){.sw-arrow.prev{left:0}.sw-arrow.next{right:0}}.sw-arrow button{width:30px;height:30px;border:none;border-radius:50%;outline:0!important;background:#fff;transition:ease .3s!important}.sw-arrow button{box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);!important}';
		return $style;
	}

	/**
	 * Estilo del componente general
	 *
	 * @return void
	**/

	static function style_general() {
		$style = '.component-general{margin-top:1rem!important}.component-general figure{margin-bottom:1rem!important}.component-general picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-general picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-general picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-general .entry-local{margin-bottom:.25rem}.component-general .entry-local h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;color:#3e4c59;text-transform:uppercase}@media (min-width:992px){.component-general .entry-local h3 a{font-size:14pt!important}}.component-general .entry-title h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#3474be;text-transform:uppercase}.component-general .entry-title h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-title h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;color:#000}.component-general .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#343a40;padding-top:.5rem!important;margin:0!important}.component-general .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-general .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-general address{padding-top:.5rem!important;margin-bottom:0!important}.component-general address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d;margin:0!important}.component-general .entry-title h3 a{font-size:16pt;line-height:22pt}@media (min-width:992px){.component-general .entry-title h3 a{font-size:22pt;line-height:26pt}}.component-general.vlarge{flex:0 0 auto;width:100%}@media (min-width:992px){.component-general.vlarge{flex:0 0 auto;width:66.66667%}}.component-general.vmedium{flex:0 0 auto;width:100%}@media (min-width:768px){.component-general.vmedium{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-general.vmedium{flex:0 0 auto;width:66.66667%}}@media (min-width:768px){.component-general.vsmall{flex:0 0 auto;width:50%}}.component-general.vsmall .entry-title h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.vsmall .entry-title h3 a{font-size:18pt!important;line-height:22pt!important}}@media (min-width:768px){.component-general.vmini{flex:0 0 auto;width:33.33333%}}.component-general.vmini .entry-local h3 a{font-size:12pt!important;color:#3e4c59;text-transform:uppercase}.component-general.vmini .entry-title h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.vmini .entry-title h3 a{font-size:18pt!important;line-height:22pt!important}}@media (min-width:768px){.component-general.vmicro{flex:0 0 auto;width:25%}}.component-general.vmicro .entry-title h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.vmicro .entry-title h3 a{font-size:14pt!important;line-height:18pt!important}}';
		return $style;
	}

	/**
	 * Estilo del componente general para sección autor
	 *
	 * @return void
	**/

	static function style_general_author() {
		$style = '.component-general{margin-top:1rem!important}.component-general figure{margin-bottom:1rem!important}.component-general picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-general picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-general picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-general .entry-local{margin-bottom:.25rem}.component-general .entry-local h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;color:#3e4c59;text-transform:uppercase}@media (min-width:992px){.component-general .entry-local h3 a{font-size:14pt!important}}.component-general .entry-title h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#3474be;text-transform:uppercase}.component-general .entry-title h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-title h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;color:#000;line-height:22pt!important}.component-general .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#343a40;padding-top:.5rem!important;margin:0!important}.component-general .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-general .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-general address{padding-top:.5rem!important;margin-bottom:0!important}.component-general address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d;margin:0!important}@media (min-width:768px){.component-general.amedium{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-general.amedium{flex:0 0 auto;width:33.33333%}}.component-general.amedium h3 a{font-size:16pt!important}@media (min-width:992px){.component-general.amedium h3 a{font-size:18pt!important}}@media (min-width:768px){.component-general.asmall{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-general.asmall{flex:0 0 auto;width:25%}}.component-general.asmall h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.asmall h3 a{font-size:14pt!important;line-height:18pt!important}}';
		return $style;
	}

	/**
	 * Estilo del componente reproductor
	 *
	 * @return void
	**/

	static function style_reproductor() {
		$style = '.component-reproductor{margin-top:1rem!important;flex:0 0 auto;width:100%}@media (min-width:768px){.component-reproductor{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-reproductor{flex:0 0 auto;width:100%}}.component-reproductor figure{margin-bottom:0!important}.component-reproductor picture{position:relative;display:block;width:100%;padding-top:56.25%;overflow:hidden;margin:0;background:#ddd}.component-reproductor picture img,.component-reproductor picture>div{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-reproductor .entry-player,.component-reproductor .share-videos,.component-reproductor .stream-list{background:#182d49;padding-left:1rem;padding-right:1rem}.component-reproductor h3{font-family:Roboto,sans-serif;font-size:16pt!important;font-weight:700!important;font-style:normal!important;color:#eaecee}.component-reproductor p{margin-bottom:0;font-family:Roboto,sans-serif;font-size:10pt!important;font-weight:400!important;font-style:normal!important;color:#eaecee}.component-reproductor p{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-reproductor .entry-player,.component-reproductor .share-videos{padding-top:1rem;padding-bottom:1rem}.component-reproductor .entry-player{display:flex;flex:1 0 100%;flex-wrap:wrap}.component-reproductor .entry-player button{display:block}@media (min-width:768px){.component-reproductor .entry-player button{display:none!important}}.component-reproductor .stream-list{height:0;overflow:scroll}.component-reproductor .stream-list.expanded{height:auto!important}@media (min-width:768px){.component-reproductor .stream-list{height:auto!important;max-height:200px}}.component-reproductor .share-videos{text-align:center;border-bottom-left-radius:.7em;border-bottom-right-radius:.7em}.component-reproductor .player-title{flex:1}.component-reproductor ul{background:#1e395c;padding-left:0;margin-bottom:0;list-style:none}.component-reproductor ul li{padding:.75rem 1.25rem;border-bottom:1px solid rgba(255,255,255,.1)}.component-reproductor ul li span{display:inline-block;font-family:Roboto,sans-serif;font-size:10pt!important;font-weight:400!important;font-style:normal!important;line-height:20px;color:#fff;cursor:pointer}';
		return $style;
	}

	/**
	 * Estilo del componente lista-simple
	 *
	 * @return void
	**/

	static function style_lista_simple() {
		$style = '.component-lista-simple{margin-top:1rem}.component-lista-simple .entry-data,.component-lista-simple figure{flex-shrink:0;width:100%;max-width:100%;padding-right:calc(var(--bs-gutter-x)/ 2);padding-left:calc(var(--bs-gutter-x)/ 2);margin-top:var(--bs-gutter-y)}.component-lista-simple figure{margin-bottom:0!important;flex:0 0 auto;width:41.66667%}.component-lista-simple picture{position:relative;display:block;width:100%;height:0;padding-top:100%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-lista-simple picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-lista-simple picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-lista-simple .entry-data{flex:0 0 auto;width:58.33333%}.component-lista-simple h2{margin-bottom:0}.component-lista-simple h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;text-transform:uppercase!important;font-size:12pt!important;color:#3474be}.component-lista-simple h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:14pt!important;line-height:18pt!important;color:#000}.component-lista-simple h3 a{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}.component-lista-simple address{margin-top:.5rem}.component-lista-simple address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d}.component-lista-simple.vinh{flex:0 0 auto;width:100%}@media (min-width:768px){.component-lista-simple.vinh{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-lista-simple.vinh{flex:0 0 auto;width:100%}}.component-lista-simple.vmini{flex:0 0 auto;width:100%}@media (min-width:992px){.component-lista-simple.vmini{flex:0 0 auto;width:33.33333%}}@media (min-width:768px){.component-lista-simple.fan{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-lista-simple.fan{flex:0 0 auto;width:33.33333%}}';
		return $style;
	}

	/**
	 * Estilo del componente lista
	 *
	 * @return void
	**/

	static function style_lista() {
		$style = '.component-list{margin-top:1rem!important}.component-list article{padding-bottom:1.5rem;border-bottom:1px solid rgba(0,0,0,.1)}.component-list h2 a{font-family:Roboto;font-size:12pt!important;font-weight:500!important;color:#3474be;text-transform:uppercase}.component-list h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-list h3 a{font-family:Roboto;font-size:16pt!important;line-height:22pt;font-weight:700!important;color:#000}.component-list h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-list.vinh{flex:0 0 auto;width:100%}@media (min-width:768px){.component-list.vinh{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-list.vinh{flex:0 0 auto;width:100%}}.component-list.vsmall{flex:0 0 auto;width:100%}@media (min-width:768px){.component-list.vsmall{flex:0 0 auto;width:50%}}';
		return $style;
	}

	/**
	 * Estilo del componente opinión
	 *
	 * @return void
	**/

	static function style_opinion() {
		$style = '.container-opinion{margin-bottom:1rem}@media (min-width:768px){.container-opinion{flex:0 0 auto;width:50%}}@media (min-width:992px){.container-opinion{flex:0 0 auto;width:33.33333%}}.container-opinion .entries{padding:1rem 1rem 0;border-radius:.7em;background:#daecf9;border:2px solid #daecf9}.container-opinion .header{position:relative;text-align:center;height:114px}.container-opinion .header a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:500!important;font-style:normal!important;text-transform:uppercase!important;color:#000}.container-opinion .header figure{position:absolute;bottom:-72.5px;left:0;right:0;margin-bottom:0;z-index:2}.container-opinion .header picture{position:relative;display:block;width:140px;padding-top:140px;border-radius:3px;margin:0 auto;background:0 0}.container-opinion .header picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;border-radius:50%;border:5px solid #fff}.container-opinion .header picture img{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.container-opinion .body,.container-opinion .card-data,.container-opinion .footer{position:relative;background:#fff;margin-left:-15px;margin-right:-15px}.container-opinion .body>:not(:last-child){border-bottom:2px solid rgba(0,0,0,.1)}.container-opinion .footer{padding:.25rem 1rem 1rem;text-align:center;border-radius:0 0 .7em .7em}.container-opinion address{margin-bottom:0!important;padding-top:78.5px;text-align:center}.container-opinion address a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:500!important;font-style:normal!important;color:#67737d!important}.component-opinion-lista{margin-left:1rem;margin-right:1rem;padding-top:1rem;padding-bottom:1rem;text-align:center}.component-opinion-lista h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;line-height:16pt!important;color:#000}.component-opinion-lista.__a{padding-top:.5rem;padding-bottom:1.5rem}.component-opinion-lista.__a h3{margin-bottom:.5rem}.component-opinion-lista.__a h3 a{font-size:16pt!important;line-height:22pt!important}.component-opinion-lista.__a h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-opinion-lista.__a .entry-excerpt{font-family:Roboto,sans-serif;font-size:12pt;font-weight:400;font-style:normal;letter-spacing:.3pt;line-height:18pt}.component-opinion-lista.__a .entry-excerpt{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}';
		return $style;
	}

	/**
	 * Estilo del componente complejo
	 *
	 * @return void
	**/

	static function style_complejo() {
		$style = '.component-complejo picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-complejo picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-complejo picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-complejo .entry-data{position:relative;margin-top:-125px!important;border-radius:.7rem;background:#3474be;text-align:center;margin-top:-25px!important;padding:15px!important;z-index:2;flex:0 0 auto;width:83.33333%;margin-left:8.33333%}.component-complejo .entry-data{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}@media (min-width:576px){.component-complejo .entry-data{margin-top:-125px!important}}.component-complejo .entry-data h2{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:16pt!important;color:#eaeced}.component-complejo .entry-data h2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-complejo .entry-data h2{font-size:32pt!important}}.component-complejo .entry-data h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:16pt!important;color:#eaeced}.component-complejo .entry-data h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-complejo .entry-data h3 a{font-size:32pt!important}}.component-complejo .entry-data .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#eaeced;padding-top:1rem!important;margin:0!important}.component-complejo .entry-data .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-complejo .entry-data .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-complejo .entry-data address{margin-top:10px}.component-complejo .entry-data address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#77b5f7;margin:0!important}';
		return $style;
	}

	/**
	 * Estilo del componente author
	 *
	 * @return void
	**/

	static function style_author() {
		$style = '.component-author{position:relative;text-align:center;padding-top:75px;margin-bottom:1rem}@media (min-width:768px){.component-author{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-author{flex:0 0 auto;width:66.66667%}}.component-author figure{position:absolute;top:0;left:0;right:0;margin-bottom:0;z-index:2}.component-author picture{position:relative;display:block;width:150px;padding-top:150px;border-radius:3px;margin:0 auto;background:0 0}.component-author picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;border-radius:50%;border:3px solid #3474be}.component-author picture img{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-author .entries{padding:95px 1rem 1rem;background:#3474be;border-radius:.7em}.component-author .entries{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-author h1{font-family:Roboto,sans-serif;font-size:16pt!important;font-weight:700!important;font-style:normal!important;color:#eaecee}.component-author a,.component-author span{font-family:Roboto,sans-serif;font-style:normal;color:#eaecee}.component-author .description,.component-author .mail,.component-author .role{margin-bottom:1rem}.component-author .description span,.component-author .mail span,.component-author .role span{font-size:12pt;font-weight:400}.component-author ul{display:-ms-flexbox;display:flex;justify-content:center;align-items:center;padding-left:0;margin-bottom:0;list-style:none}.component-author a{margin:0 .5rem}.component-author a.fab{display:inline-flex;align-items:center;justify-content:center;width:30px;height:30px;border:none;border-radius:50%;outline:0!important;background:#007bff;font-size:.875rem;color:#fff;transition:opacity .3s ease!important}.component-author a.fab span{display:none}.component-author a.fab:hover{opacity:.86}';
		return $style;
	}

	/**
	 * Estilo del componente filosofía financiera
	 *
	 * @return void
	**/

	static function style_filosofia_indigonomics() {
		$style = '.component-twitt-plus{margin-top:1rem}@media (min-width:992px){.component-twitt-plus{margin-top:0!important;flex:0 0 auto;width:100%}}.component-twitt-plus .entries{background:#2dc3f6}.component-twitt-plus .header{display:flex;align-items:center;justify-content:center;background:#3474be;padding:.5rem 1rem}.component-twitt-plus .header img{margin-right:.5rem}.component-twitt-plus .header h2{font-family:Roboto,sans-serif;font-size:12pt;font-weight:700!important;font-style:normal!important;color:#fff}@media (min-width:992px){.component-twitt-plus .header h2{font-size:14pt!important}}.component-twitt-plus .body{padding:1rem 1rem 1rem}.component-twitt-plus .body h3{font-family:Roboto,sans-serif;font-size:16pt!important;font-weight:700!important;font-style:normal!important;line-height:22pt!important;text-align:center;color:#182d51}@media (min-width:992px){.component-twitt-plus .body h3{font-size:20pt!important}}.component-twitt-plus .footer{padding:0 1rem 1rem;text-align:center}.component-twitt-plus .ticket-cut{width:100%;height:20px;background-image:linear-gradient(27deg,transparent 30px,#2dc3f6 31px),linear-gradient(155deg,#2dc3f6 16px,transparent 17px);background-size:24px 40px;background-repeat:repeat-x}';
		return $style;
	}

	/**
	 * Estilo del componente enfoque indigo
	 *
	 * @return void
	**/

	static function style_enfoque_piensa() {
		$style = '.component-enfoque{margin-top:1rem!important;}.component-enfoque article{border-radius:.7em;background:#2dc3f6;padding-top:calc(var(--bs-gutter-x)/ 2);padding-bottom:calc(var(--bs-gutter-x)/ 2);padding-right:calc(var(--bs-gutter-x)/ 2);padding-left:calc(var(--bs-gutter-x)/ 2)}.component-enfoque .enfoque-title{font-family:Roboto;font-size:16pt!important;font-weight:700!important;font-style:normal!important;color:#182d49}.component-enfoque h2{margin-top:1rem!important}.component-enfoque h2 a{font-family:Roboto;font-size:12pt!important;font-weight:500!important;font-style:normal!important;text-transform:uppercase!important;color:#3474be}.component-enfoque h3 a{font-family:Roboto;font-size:16pt!important;line-height:22pt!important;font-weight:700!important;font-style:normal!important;color:#182d49}.component-enfoque .entry-excerpt{margin-top:.5rem}.component-enfoque .entry-excerpt p{font-family:Roboto;font-size:12pt!important;line-height:16pt!important;font-weight:400!important;font-style:normal!important;letter-spacing:.3pt;margin-bottom:.5rem!important}.component-enfoque .swiper-container{margin-bottom:1rem!important}.component-enfoque picture{position:relative;display:block;width:100%;height:0;padding-bottom:56.25%;border-radius:3px;overflow:hidden;margin:0 auto;background:#ddd}.component-enfoque picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-enfoque footer{text-align:center}.component-enfoque button{font-family:Roboto;font-size:10pt!important;font-weight:400!important;font-style:normal!important;text-transform:uppercase!important;border:none;border-radius:25rem;color:#fff;background-color:#007bff;padding:.375rem .75rem;text-align:center;vertical-align:middle;line-height:1.5}';
		return $style;
	}

	/**
	 * Estilo del componente dato del día
	 *
	 * @return void
	**/

	static function style_dato_dia_fan() {
		$style = '.component-dato-dia{margin-top:1rem}.component-dato-dia .entries{background:#77b5f7}.component-dato-dia figure{margin:0!important}.component-dato-dia picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-dato-dia picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-dato-dia picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-dato-dia .header{padding:1rem;background:#3474be}.component-dato-dia .header h2{font-family:Roboto,sans-serif;font-size:14pt;font-weight:700!important;font-style:normal!important;color:#eaecee;margin-bottom:1rem;text-align:center}@media (min-width:768px){.component-dato-dia .header h2{font-size:18pt!important}}.component-dato-dia .body{padding:1rem}.component-dato-dia .body h3{font-family:Roboto,sans-serif;font-size:16pt;font-weight:700!important;font-style:normal!important;color:#182d49}@media (min-width:992px){.component-dato-dia .body h3{font-size:18pt!important}}.component-dato-dia .triangle{display:flex;width:0;height:0;border-left:30px solid transparent;border-right:30px solid transparent;border-top:40px solid #3474be;margin:0 auto}.component-dato-dia .footer{padding:0 1rem 1rem;text-align:center}';
		return $style;
	}

	/**
	 * Estilo de los componentes de newsletter
	 *
	 * @return void
	**/

	static function style_newsletter() {
		$style = '.component-titulo{margin-top:1rem!important;flex:0 0 auto;width:100%}.component-titulo h2{margin-bottom:0!important;border-bottom:2px solid #000;padding-bottom:.5rem!important}.component-titulo h2 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:24pt!important;color:#000}.component-titulo h2 a i{margin-left:1px;transform:translateY(2.3px)}.breadcrumb{margin-bottom:1rem}.breadcrumb>*{display:-ms-flexbox;display:flex;align-items:center;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:.75rem 1rem;background-color:#e9ecef;border-radius:.25rem;align-items:center}.breadcrumb ol{list-style:none}.breadcrumb ol li{display:inline-flex;font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;line-height:1.2;line-height:1.2}.breadcrumb ol li+li:before{content:"/";padding:0 .5rem}.breadcrumb ol a{font-size:1rem;color:#3e4c59}.breadcrumb ol a[aria-current=page]{color:#6c757d}.component-newsletter{display:flex;background:#182d49;border-radius:.7em;padding:1rem;margin-top:1rem}.component-newsletter .ribbon{display:none;flex:1;margin-right:1rem}@media (min-width:768px){.component-newsletter .ribbon{display:block!important}}.component-newsletter .form>span{display:inline-block;font-family:Roboto,sans-serif;font-size:18pt!important;font-weight:700!important;font-style:normal!important;margin-bottom:1rem;color:#2dc3f6}.component-newsletter .form label,.component-newsletter .form strong{font-family:Roboto,sans-serif;font-size:1rem!important;font-weight:400!important;font-style:normal!important;margin-bottom:.5rem;color:#fff}.component-newsletter .form strong{display:inline-block;margin-bottom:.5rem}.component-newsletter .form .group{position:relative}.component-newsletter .form .group span{padding:0 .75rem;display:flex;align-items:center;position:absolute;top:0;right:0;height:100%;color:#3474be}.component-newsletter .form .checks{margin-bottom:1rem}.component-newsletter .asterisk{color:#dc3545}.component-newsletter input[type=email],.component-newsletter input[type=text]{position:relative;-ms-flex:1 1 0%;flex:1 1 0%;min-width:0;display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-family:Roboto,sans-serif;font-size:1rem!important;font-weight:400!important;font-style:normal!important;line-height:1.5;background-color:#fff;background-clip:padding-box;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;border-radius:0!important;background:#d4dade!important;color:#3474be!important;border:1px solid #d4dade!important}.component-newsletter .mc-field-group{margin-bottom:1rem}.component-newsletter .checks{display:flex;align-items:center}.component-newsletter .checks label{margin:0!important}.component-newsletter .snd{display:flex;align-items:center;flex-direction:column;margin-top:3rem}.component-newsletter .snd #captcha-cm{margin-bottom:1rem}.component-newsletter .response{font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;color:#fff}.component-newsletter .response a{font-weight:700!important;color:#fff}.component-newsletter input[type=checkbox]{width:1rem;height:1rem;margin-right:.5rem}.component-newsletter .hide{display:none}.component-edicion{margin-top:1rem!important}.component-edicion .content{border-radius:.7em;background:#cde0ee;padding:1rem}.component-edicion picture{position:relative;display:block;width:100%;height:auto;margin:0 auto;background:#ddd}.component-edicion picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-edicion picture img{position:relative;width:100%;height:auto;object-fit:cover}.component-edicion .share-edicion{text-align:center}.component-edicion a[role=button]{display:inline-block;font-family:Roboto;font-size:10pt!important;font-weight:400!important;font-style:normal!important;text-transform:uppercase!important;border:none;border-radius:25rem;color:#fff;background-color:#007bff;padding:.375rem .75rem;text-align:center;vertical-align:middle;line-height:1.5}.component-general{margin-top:1rem!important}@media (min-width:768px){.component-general{flex:0 0 auto;width:50%}}.component-general figure{margin-bottom:1rem!important}.component-general picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-general picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-general picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-general .entry-local{margin-bottom:.25rem}.component-general .entry-local h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;color:#3e4c59;text-transform:uppercase}@media (min-width:992px){.component-general .entry-local h3 a{font-size:14pt!important}}.component-general .entry-title h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#3474be;text-transform:uppercase}.component-general .entry-title h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-title h3 a{font-family:Roboto;font-size:16pt!important;font-weight:700!important;font-style:normal!important;color:#000;line-height:22pt!important}.component-general .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-general .entry-title h3 a{font-size:18pt!important;line-height:22pt!important}}.component-general .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#343a40;padding-top:.5rem!important;margin:0!important}.component-general .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-general .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-general address{padding-top:.5rem!important;margin-bottom:0!important}.component-general address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d;margin:0!important}';
		return $style;
	}

	/**
	 * Estilo de los componentes de error 404
	 *
	 * @return void
	**/

	static function style_404() {
		$style = '.breadcrumb{margin-bottom:1rem}.breadcrumb>*{display:-ms-flexbox;display:flex;align-items:center;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:.75rem 1rem;background-color:#e9ecef;border-radius:.25rem;align-items:center}.breadcrumb ol{list-style:none}.breadcrumb ol li{display:inline-flex;font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;line-height:1.2;line-height:1.2}.breadcrumb ol li+li:before{content:"/";padding:0 .5rem}.breadcrumb ol h1{font-size:1rem;color:#3e4c59}.breadcrumb ol a{font-size:1rem;color:#3e4c59}.breadcrumb ol a[aria-current=page]{color:#6c757d}.component-error .entries{text-align:center}.component-error .fas{font-size:100pt;color:#2dc3f6;line-height:1.1}.component-error p{font-family:Roboto,sans-serif;font-style:normal;color:#000}.component-error .error{font-size:50pt;font-weight:700!important;line-height:1.2}.component-error .code{font-size:100pt;font-weight:700!important;line-height:1.2}.component-error .msg{font-size:28pt;font-weight:500!important;text-transform:uppercase;line-height:1.2}.component-titulo{margin-top:1rem!important;flex:0 0 auto;width:100%}.component-titulo h2{margin-bottom:0!important;border-bottom:2px solid #000;padding-bottom:.5rem!important}.component-titulo h2 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:24pt!important;color:#000}.component-titulo h2 a i{margin-left:1px;transform:translateY(2.3px)}.component-lista-imagen{margin-top:1rem!important}@media (min-width:768px){.component-lista-imagen{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-lista-imagen{flex:0 0 auto;width:25%}}.component-lista-imagen figure{margin-bottom:1rem!important}.component-lista-imagen picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-lista-imagen picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-lista-imagen picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-lista-imagen .entry-local{margin-bottom:.25rem}.component-lista-imagen .entry-local h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;color:#3e4c59;text-transform:uppercase}@media (min-width:992px){.component-lista-imagen .entry-local h3 a{font-size:14pt!important}}.component-lista-imagen .entry-title h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#3474be;text-transform:uppercase}.component-lista-imagen .entry-title h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-lista-imagen .entry-title h3 a{font-family:Roboto;font-size:16pt!important;font-weight:700!important;font-style:normal!important;color:#000;line-height:22pt!important}.component-lista-imagen .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-lista-imagen .entry-title h3 a{font-size:18pt!important;line-height:22pt!important}}.component-lista-imagen .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#343a40;padding-top:.5rem!important;margin:0!important}.component-lista-imagen .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-lista-imagen .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-lista-imagen address{padding-top:.5rem!important;margin-bottom:0!important}.component-lista-imagen address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d;margin:0!important}';
		return $style;
	}

	/**
	 * Estilo de los componentes taxonomías
	 *
	 * @return void
	**/

	static function style_taxonomias() {
		$style = '.component-general{margin-top:1rem!important}.component-general figure{margin-bottom:1rem!important}.component-general picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-general picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-general picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-general .entry-local{margin-bottom:.25rem}.component-general .entry-local h3 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:700!important;font-style:normal!important;color:#3e4c59;text-transform:uppercase}@media (min-width:992px){.component-general .entry-local h3 a{font-size:14pt!important}}.component-general .entry-title h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#3474be;text-transform:uppercase}.component-general .entry-title h2 a{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-title h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;color:#000}.component-general .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.component-general .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#343a40;padding-top:.5rem!important;margin:0!important}.component-general .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-general .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-general address{padding-top:.5rem!important;margin-bottom:0!important}.component-general address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#67737d;margin:0!important}.component-general .entry-title h3 a{font-size:16pt;line-height:22pt}@media (min-width:992px){.component-general .entry-title h3 a{font-size:22pt;line-height:26pt}}@media (min-width:768px){.component-general.vmini{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-general.vmini{flex:0 0 auto;width:33.33333%}}.component-general.vmini .entry-local h3 a{font-size:12pt!important;color:#3e4c59;text-transform:uppercase}.component-general.vmini .entry-title h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.vmini .entry-title h3 a{font-size:18pt!important;line-height:22pt!important}}@media (min-width:768px){.component-general.vmicro{flex:0 0 auto;width:25%}}.component-general.vmicro .entry-title h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-general.vmicro .entry-title h3 a{font-size:14pt!important;line-height:18pt!important}}.separator{margin-top:1rem!important;flex:0 0 auto;width:100%}.separator hr{margin-top:1rem!important;margin-bottom:1rem!important}';
		return $style;
	}

	/**
	 * Estilo de la seccion entradas
	 *
	 * @return void
	**/

	static function style_single() {
		$style = '.component-cabecera picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-cabecera picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-cabecera picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-cabecera .entry-data{position:relative;margin-top:-125px!important;border-radius:.7rem;background:#3474be;text-align:center;margin-top:-25px!important;padding:15px!important;z-index:2;flex:0 0 auto;width:83.33333%;margin-left:8.33333%}.component-cabecera .entry-data{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}@media (min-width:576px){.component-cabecera .entry-data{margin-top:-125px!important}}.component-cabecera .entry-data h2 a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:12pt!important;color:#2dc3f6;text-transform:uppercase}.component-cabecera .entry-data h1{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:16pt!important;color:#eaeced}@media (min-width:992px){.component-cabecera .entry-data h1{font-size:32pt!important}}.component-cabecera .entry-data h3 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:16pt!important;color:#eaeced}.component-cabecera .entry-data h3 a{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-cabecera .entry-data h3 a{font-size:32pt!important}}.component-cabecera .entry-data .entry-excerpt p{font-family:Roboto;font-weight:400!important;font-style:normal!important;font-size:12pt!important;line-height:18pt!important;letter-spacing:.3pt;color:#eaeced;padding-top:1rem!important;margin:0!important}.component-cabecera .entry-data .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-cabecera .entry-data .entry-excerpt p{font-size:14pt!important;line-height:18pt!important}}.component-cabecera .entry-data address{margin-top:10px}.component-cabecera .entry-data address a{font-family:Roboto;font-weight:500!important;font-style:normal!important;font-size:10pt!important;color:#77b5f7;margin:0!important}.component-cabecera .entry-data ul{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;padding-left:0;margin-bottom:0;list-style:none;justify-content:center}.component-cabecera .entry-data ul li{padding:.5rem 1rem}.component-cabecera .entry-data ul li.active i{color:#2dc3f6}.component-cabecera .entry-data ul i{color:#fff;transition:ease .3s!important;font-size:8pt!important;transition:ease .3s!important}@media (min-width:576px){.component-cabecera .entry-data ul i{font-size:12pt!important}}.entry-content{flex:0 0 auto;width:100%}@media (min-width:992px){.entry-content{flex:0 0 auto;width:66.66667%}}.entry-extras{flex:0 0 auto;width:100%}@media (min-width:992px){.entry-extras{flex:0 0 auto;width:33.33333%}}.entry-content{font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important}.entry-content .entry-info{display:flex;justify-content:space-between;align-items:center;margin-top:1rem;padding-bottom:1rem;border-bottom:1px solid rgba(0,0,0,.1)}.entry-content .entry-info span{font-size:10pt!important;color:#67737d}.entry-content .entry-info button{width:30px;height:30px;border:none;border-radius:50%;outline:0!important;background:#007bff;font-size:.875rem;color:#fff;transition:ease .3s!important}.entry-content .main-content{font-size:16pt!important;line-height:22pt!important;margin-top:2rem}.main-content h3{font-size:inherit;font-weight:700;line-height:1.1;text-transform:uppercase;margin:0!important}.main-content p{font-size:16pt!important;line-height:22pt!important;}.main-content p>img{margin-left:auto;margin-right:auto;display:block;max-width:100%;height:auto}.main-content p:not(:last-child){margin-bottom:24px}.main-content a{display:inline!important;color:#3474be}.block-cifras{border-left:2px solid rgba(52,116,190,.5);padding-left:1rem}.block-cifras .cifra{font-size:18pt!important;font-weight:700!important;font-style:italic!important;line-height:22pt!important;color:#3f4a55}.block-cifras .cifra-description{font-size:14pt!important;font-weight:100!important;font-style:normal!important;line-height:18pt!important;color:#67737d}.block-citas{text-align:center}.block-citas .cita{font-size:14pt!important;font-weight:700!important;font-style:italic!important;line-height:26pt!important;color:#3f4a55}.block-citas .author-cita{font-size:14pt!important;font-weight:100!important;font-style:normal!important;line-height:18pt!important;color:#67737d}.block-citas .author-puesto{font-size:14pt!important;font-weight:500!important;font-style:normal!important;color:#3474be}.component-edicion{margin-top:1rem!important}@media (min-width:768px){.component-edicion{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-edicion{flex:0 0 auto;width:100%}}.component-edicion .content{border-radius:.7em;background:#cde0ee;padding:1rem}.component-edicion picture{position:relative;display:block;width:100%;height:auto;margin:0 auto;background:#ddd}.component-edicion picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-edicion picture img{position:relative;width:100%;height:auto;object-fit:cover}.component-edicion .share-edicion{text-align:center}.component-edicion a[role=button]{display:inline-block;font-family:Roboto;font-size:10pt!important;font-weight:400!important;font-style:normal!important;text-transform:uppercase!important;border:none;border-radius:25rem;color:#fff;background-color:#007bff;padding:.375rem .75rem;text-align:center;vertical-align:middle;line-height:1.5}.main-content h4{margin-bottom:1rem;}.sw-arrow{position:absolute;top:calc(50% - 25px);padding:.5rem;cursor:pointer;z-index:3}@media (min-width:576px){.sw-arrow{padding:1.5rem}}.sw-arrow.prev{left:1rem}.sw-arrow.next{right:1rem}@media (min-width:576px){.sw-arrow.prev{left:0}.sw-arrow.next{right:0}}.sw-arrow button{width:30px;height:30px;border:none;border-radius:50%;outline:0!important;background:#fff;transition:ease .3s!important}.sw-arrow button{box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);!important}';
		return $style;
	}

	/**
	 * Estilo de la seccion indigo live
	 *
	 * @return void
	**/

	static function style_indigo_noticias() {
		$style = '.page-template-indigo_noticias{background:#182d49}.component-videos{margin-top:1rem}.component-videos figure{margin-bottom:1rem!important}.component-videos picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-videos picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-videos picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-videos .share{text-align:right}.component-videos .entry-title{margin-bottom:.5rem!important}.component-videos .entry-title h3{font-family:Roboto,sans-serif;font-size:16pt!important;font-weight:700!important;font-style:normal!important;line-height:22pt!important;color:#eaecee}.component-videos .entry-title h3{display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-videos .entry-title h3{font-size:12pt!important;line-height:16pt!important}}.component-videos.vmini figure{margin-bottom:.5rem!important}@media (min-width:768px){.component-videos.vmini{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-videos.vmini{flex:0 0 auto;width:33.33333%}}@media (min-width:1200px){.component-videos.vmini{flex:0 0 auto;width:25%}}.component-titulo{margin-top:1rem!important;flex:0 0 auto;width:100%}.component-titulo h2{align-items:center;margin-bottom:0!important;border-bottom:2px solid #eaecee;padding-bottom:.5rem!important;display:flex;align-items:center;font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:24pt!important;color:#eaecee}.component-titulo h2 i{margin-left:1px;transform:translateY(2.3px)}.component-titulo a{display:inherit;align-items:inherit;font-family:inherit;font-weight:inherit;font-style:inherit;font-size:inherit;color:inherit}';

		return $style;
	}

	/**
	 * Estilo de la seccion indigo play
	 *
	 * @return void
	**/

	static function style_indigo_videos() {
		$style = '.page-template-indigo_videos{background:#182d49}main>:nth-child(2n){background:#3f4c5a}.component-play{padding-top:1rem;padding-bottom:1rem}.component-play .entry-local{margin-bottom:.5rem}.component-play .entry-local a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:500!important;font-style:normal!important;text-transform:uppercase!important;color:#77b5f7}.component-play picture{position:relative;display:block;width:100%;padding-top:56.25%;border-radius:3px;overflow:hidden;margin:0;background:#ddd}.component-play picture{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}.component-play picture img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}.component-play .entry-title h2 a{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:500!important;font-style:normal!important;text-transform:uppercase!important;color:#2dc3f6}.component-play .entry-title h3 a{font-family:Roboto,sans-serif;font-weight:700!important;font-style:normal!important;color:#eaecee}.component-play .entry-title h3 a{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}.component-play .entry-title .entry-excerpt p{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:400!important;font-style:normal!important;letter-spacing:.3pt;line-height:18pt!important;color:#eaecee}.component-play .entry-title .entry-excerpt p{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}@media (min-width:992px){.component-play .entry-title .entry-excerpt p{font-size:14pt!important}}.component-play .entry-title address a{font-family:Roboto;font-size:10pt!important;font-weight:500!important;font-style:normal!important;color:#99d3ff}.component-play.large .entry-title{text-align:center}.component-play.large h3{margin-bottom:.5rem}.component-play.large h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-play.large h3 a{font-size:22pt!important;line-height:26pt!important}}.component-play.mini{flex:0 0 auto;width:100%}@media (min-width:576px){.component-play.mini{flex:0 0 auto;width:50%}}@media (min-width:992px){.component-play.mini{flex:0 0 auto;width:25%}}.component-play.mini .entry-title h2 a{font-size:10pt!important}.component-play.mini h3{margin-bottom:.5rem}.component-play.mini h3 a{font-size:16pt!important;line-height:22pt!important}@media (min-width:992px){.component-play.mini h3 a{font-size:12pt!important;line-height:16pt!important}}';

		return $style;
	}

	/**
	 * Estilo de la seccion ventas
	 *
	 * @return void
	**/

	static function style_ventas() {
		$style = '.breadcrumb{margin-bottom:1rem}.breadcrumb>*{display:-ms-flexbox;display:flex;align-items:center;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:.75rem 1rem;background-color:#e9ecef;border-radius:.25rem;align-items:center}.breadcrumb ol{list-style:none}.breadcrumb ol li{display:inline-flex;font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;line-height:1.2;line-height:1.2}.breadcrumb ol li+li:before{content:"/";padding:0 .5rem}.breadcrumb ol h1{font-size:1rem;color:#3e4c59}.breadcrumb ol a{font-size:1rem;color:#3e4c59}.breadcrumb ol a[aria-current=page]{color:#6c757d}.info-card .card{padding:1rem;background:#3474be;border-radius:.7em}.info-card .card h2{font-family:Roboto,sans-serif;font-size:24pt!important;font-weight:700!important;font-style:normal;color:#eaecee;text-align:center;text-transform:uppercase;margin-top:1rem;margin-bottom:1.5rem}.info-card .card h3{font-family:Roboto,sans-serif;font-size:18pt!important;font-weight:700!important;font-style:normal;text-align:center;text-transform:uppercase;margin-bottom:1rem;color:#eaecee}.info-card .card .entry-content{margin-bottom:1.5rem}.info-card .card .entry-content p{font-family:Roboto,sans-serif;font-size:14pt!important;font-weight:500!important;font-style:normal!important;line-height:18pt!important;color:#eaecee;text-align:center}.info-card .card .social-content{display:-ms-flexbox;display:flex;justify-content:center;margin-bottom:1rem}.info-card .card .social-content a:before{display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;margin-right:.5rem;font-size:14pt!important;color:#3474be;background:#fff}.info-card .card .social-content a span{display:none}.info-card .card .contact-type{margin-bottom:1rem;flex:0 0 auto;width:100%}@media (min-width:992px){.info-card .card .contact-type{flex:0 0 auto;width:50%}}.info-card .card .contact-type a{display:-ms-flexbox;display:flex;flex-direction:column;text-align:center;color:#eaecee!important}.info-card .card .contact-type span{color:#eaecee;flex:0 0 auto;width:100%}.info-card .card .contact-type .fas{font-size:50pt!important;margin-bottom:1rem}.info-card .card .contact-type .contact-info{font-family:Roboto,sans-serif;font-size:12pt!important;font-weight:400!important;font-style:italic!important}.info-card .card .card-footer,.info-card .card .social-content{text-align:center;margin-bottom:1rem}.info-card .card small{font-family:Roboto,sans-serif;font-size:10pt!important;font-weight:400!important;font-style:italic!important;color:#eaecee}';

		return $style;
	}

	/**
	 * Estilo de la seccion terminos
	 *
	 * @return void
	**/

	static function style_terminos() {
		$style = '.breadcrumb{margin-bottom:1rem}.breadcrumb>*{display:-ms-flexbox;display:flex;align-items:center;-ms-flex-wrap:wrap;flex-wrap:wrap;padding:.75rem 1rem;background-color:#e9ecef;border-radius:.25rem;align-items:center}.breadcrumb ol{list-style:none}.breadcrumb ol li{display:inline-flex;font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;line-height:1.2;line-height:1.2}.breadcrumb ol li+li:before{content:"/";padding:0 .5rem}.breadcrumb ol a{font-size:1rem;color:#3e4c59}.breadcrumb ol a[aria-current=page]{color:#6c757d}.component-titulo{margin-top:1rem!important;flex:0 0 auto;width:100%}.component-titulo h2{margin-bottom:0!important;border-bottom:2px solid #000;padding-bottom:.5rem!important}.component-titulo h2 a{font-family:Roboto;font-weight:700!important;font-style:normal!important;font-size:24pt!important;color:#000}.component-titulo h2 a i{margin-left:1px;transform:translateY(2.3px)}.entry-content{margin-top:1rem}@media (min-width:992px){.entry-content{flex:0 0 auto;width:66.66667%}}.entry-content>*{font-family:Roboto,sans-serif;font-weight:400!important;font-style:normal!important;text-align:justify!important}.entry-content h2{font-size:26pt;font-weight:700!important;text-align:center!important;margin-bottom:1rem}.entry-extras{margin-top:1rem}@media (min-width:992px){.entry-extras{flex:0 0 auto;width:33.33333%}}';

		return $style;
	}

	/**
	 * Estilo de la seccion terminos
	 *
	 * @return void
	**/

	static function style_ri_youtube() {
		$style = 'ri-youtube{display:flex;position:absolute;top:0;left:0;width:100%;height:100%;background:#000;z-index:5;background-color:transparent;contain:content;background-position:center center;background-size:cover;cursor:pointer}ri-youtube::before{content:\'\';display:block;position:absolute;top:0;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAADGCAYAAAAT+OqFAAAAdklEQVQoz42QQQ7AIAgEF/T/D+kbq/RWAlnQyyazA4aoAB4FsBSA/bFjuF1EOL7VbrIrBuusmrt4ZZORfb6ehbWdnRHEIiITaEUKa5EJqUakRSaEYBJSCY2dEstQY7AuxahwXFrvZmWl2rh4JZ07z9dLtesfNj5q0FU3A5ObbwAAAABJRU5ErkJggg==);background-position:top;background-repeat:repeat-x;height:60px;padding-bottom:50px;width:100%;transition:all .2s cubic-bezier(0,0,.2,1)}ri-youtube::after{content:"";display:block;padding-bottom:calc(100% / (16 / 9))}ri-youtube>iframe{width:100%;height:100%;position:absolute;top:0;left:0;border:0}ri-youtube>.riyt-playbtn{width:68px;height:48px;position:absolute;cursor:pointer;transform:translate3d(-50%,-50%,0);top:50%;left:50%;z-index:1;background-color:transparent;background-image:url(\'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 68 48"><path fill="%23f00" fill-opacity="0.8" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path><path d="M 45,24 27,14 27,34" fill="%23fff"></path></svg>\');filter:grayscale(100%);transition:filter .1s cubic-bezier(0,0,.2,1);border:none}ri-youtube .riyt-playbtn:focus,ri-youtube:hover>.riyt-playbtn{filter:none}ri-youtube.riyt-activated{cursor:unset}ri-youtube.riyt-activated::before,ri-youtube.riyt-activated>.riyt-playbtn{width:.00001px;height:.00001px;opacity:0;pointer-events:none}.riyt-visually-hidden{clip:rect(0 0 0 0);clip-path:inset(50%);height:1px;overflow:hidden;position:absolute;white-space:nowrap;width:1px}';

		return $style;
	}

	/**
	 * Función que ejecuta la clase
	 *
	 * @return void
	**/

	function on_loaded() {
		
		if( is_home() )
			echo '<style type="text/css">' . self::style_deslizador() . self::style_general() . self::style_reproductor() . self::style_ri_youtube() . '</style>';

		if( is_single() )
			echo '<style type="text/css">' . self::style_single() . '</style>';

		if ( is_post_type_archive('ri-reporte') )
			echo '<style type="text/css">' . self::style_general() . self::style_lista_simple() . self::style_lista() . '</style>';

		if ( is_post_type_archive('ri-latitud') )
			echo '<style type="text/css">' . self::style_general() . '</style>';

		if ( is_post_type_archive('ri-indigonomics') )
			echo '<style type="text/css">' . self::style_general() . self::style_filosofia_indigonomics() . '</style>';

		if ( is_post_type_archive('ri-piensa') )
			echo '<style type="text/css">' . self::style_general() . self::style_enfoque_piensa() . '</style>';

		if ( is_post_type_archive('ri-fan') )
			echo '<style type="text/css">' . self::style_general() . self::style_dato_dia_fan() . '</style>';

		if ( is_post_type_archive('ri-opinion') )
			echo '<style type="text/css">' . self::style_opinion() . '</style>';

		if ( is_post_type_archive('ri-desglose') )
			echo '<style type="text/css">' . self::style_complejo() . '</style>';

		if ( is_author() )
			echo '<style type="text/css">' . self::style_author() . self::style_general_author() . '</style>';

		if ( is_search() )
			echo '<style type="text/css">' . self::style_breadcrumb() . self::style_general_author() . '</style>';

		if( is_page_template('page-templates/newsletter.php') )
			echo '<style type="text/css">' . self::style_newsletter() . '</style>';

		if( is_404() )
			echo '<style type="text/css">' . self::style_404() . '</style>';

		if( is_page_template('page-templates/edicion_impresa.php') )
			echo '<style type="text/css">.digital .embed-container{position:relative;display:block;width:100%;padding-top:125%;overflow:hidden;margin:0}.digital .wrap{max-width:750px;margin:0 auto}.digital .wrap iframe{position:absolute;top:0;left:0;width:100%;height:100%}@media (min-width:992px){.digital .embed-container{padding-top:75%!important;}}' . self::style_breadcrumb() . '</style>';

		if( is_page_template('page-templates/indigo_noticias.php') )
			echo '<style type="text/css">' . self::style_indigo_noticias() . self::style_ri_youtube() . '</style>';

		if( is_page_template('page-templates/indigo_videos.php') )
			echo '<style type="text/css">' . self::style_indigo_videos() . '</style>';

		if( is_tax('ri-categoria') || is_tax('ri-tema') || is_tax('ri-columna') || is_tax('ri-ciudad') )
			echo '<style type="text/css">' . self::style_taxonomias() . '</style>';

		if( is_page_template('page-templates/ventas.php') )
			echo '<style type="text/css">' . self::style_ventas() . '</style>';

		if( is_page_template('page-templates/terminos.php') || is_page_template('page-templates/privacidad.php') )
			echo '<style type="text/css">' . self::style_terminos() . '</style>';

	}

}

$styles_plugin = new Reporte_Indigo_Styles();
add_action('wp_head', [$styles_plugin, 'on_loaded'], 101);
?>