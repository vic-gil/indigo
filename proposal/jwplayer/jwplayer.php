<?php
function reporte_indigo_init_jwplayer () {
    Reporte_Indigo_Editor_JWPlayer::init();
}

add_action( 'init', 'reporte_indigo_init_jwplayer' );
?>