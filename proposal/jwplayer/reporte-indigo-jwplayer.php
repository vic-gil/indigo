<?php


class Reporte_Indigo_Editor_JWPlayer {

    private static $initiated = false;

    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    private static function init_hooks() {
        self::$initiated = true;

        if( is_admin() ) {
            add_filter( 'mce_buttons', [ 'Reporte_Indigo_Editor_JWPlayer', 'register_mce_buttons' ] );
            add_filter( 'mce_external_plugins', [ 'Reporte_Indigo_Editor_JWPlayer', 'register_mce_plugin' ] );
        }
    }

    public static function register_mce_buttons( $buttons ) {
        $buttons[] = 'jwplayer';

        return $buttons;

    }

    public static function register_mce_plugin( $plugin_array ) {
        $plugin_array['jwplayer'] = get_template_directory_uri() . '/proposal/jwplayer/js/plugin.js';

        return $plugin_array;
    }

}