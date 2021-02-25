<?php
/**
 * Parte de la plantilla para mostrar anuncios
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */

?>
<div id="sas_<?=$args['format']?>"></div>
<script type="application/javascript">
	setTimeout(
		function(){ 
			sas.cmd.push(function() {
		        sas.call("std", {
		            siteId: <?=$args['site']?>,
		            pageId: <?=$args['page']?>,
		            formatId: <?=$args['format']?>,
		            target: ''
		        });
		    });
		}, 
	<?=$args['delay']?>);
</script>
<noscript>
    <a href="" target="_blank">
        <img src="" border="0" alt="" />
    </a>
</noscript>