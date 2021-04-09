<?php
function reporte_indigo_survey_post_type () {
	$encuestas = new Reporte_Indigo_Post_Types('Encuestas', 'encuestas', 'ri-encuestas','dashicons-analytics', ['title', 'thumbnail', 'editor', 'excerpt']);
	$encuestas->create_post_type();

	Reporte_Indigo_Shortcodes::init();
}

add_action( 'init', 'reporte_indigo_survey_post_type' );
?>
