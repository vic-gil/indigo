<?php
/**
 * Parte de plantilla para mostrar alertas de último momento con estilo C
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
?>
<div class="componente-alertas">
	<div class="wrap">
		<picture>
			<source srcset="<?=get_template_directory_uri() . '/assets/images/components/alertas/uh-full.svg'?>" type="image/svg+xml" media="(min-width: 768px)" alt="Logo último momento" />
			<img src="<?=get_template_directory_uri() . '/assets/images/components/alertas/uh-small-a.svg'?>" type="image/svg+xml" alt="Logo último momento" />
		</picture>
		<div class="alert-title">
			<h3>
				<a class="link-last-moment" href="<?=get_the_permalink();?>" title="<?=get_the_title();?>"><?=get_the_title();?></a>
			</h3>
		</div>
		<svg viewBox="0 0 18.747 22" xmlns="http://www.w3.org/2000/svg" width="18.747" height="22">
		    <defs>
		        <clipPath id="a">
		            <path transform="translate(0 20.034)" d="M0-20.034H18.747v22H0Z" />
		        </clipPath>
		    </defs>
		    <g transform="translate(0)" data-name="alerta">
		        <g transform="translate(0)">
		            <g clip-path="url(#a)">
		                <path transform="translate(8.536 20.034)" d="M.838,1.966A3.29,3.29,0,0,0,4.12-1.118H-2.445A3.29,3.29,0,0,0,.838,1.966M7.179-12.376a6.337,6.337,0,0,0-5.36-6.258v-.381a1,1,0,0,0-.779-1,.983.983,0,0,0-1.185.961v.418A6.336,6.336,0,0,0-5.5-12.376c0,10.908-3.033,6.5-3.033,9.754a.523.523,0,0,0,.524.523h17.7a.523.523,0,0,0,.524-.523v-.15c0-2.806-3.032,1.027-3.032-9.6" fill="#e2e7ea" />
		            </g>
		        </g>
		    </g>
		</svg>
	</div>
</div>