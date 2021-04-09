<?php

class Reporte_Indigo_Shortcodes {

    private static $initiated = false;

    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    private static function init_hooks() {
        self::$initiated = true;

        if( is_admin() ) {
            add_filter( 'mce_buttons', [ 'Reporte_Indigo_Shortcodes', 'register_mce_buttons' ] );
            add_filter( 'mce_external_plugins', [ 'Reporte_Indigo_Shortcodes', 'register_mce_plugin' ] );

            add_action( 'wp_ajax_ri_surveys', [ 'Reporte_Indigo_Shortcodes', 'get_surveys' ] );
        }

        add_action( 'admin_head', function(){
            echo '<script>const active_theme_uri = "' . get_template_directory_uri() . '";</script>';
        });

        add_shortcode( 'ri_survey', [ 'Reporte_Indigo_Shortcodes', 'survey_shortcode' ] );
        add_action( 'wp_enqueue_scripts', [ 'Reporte_Indigo_Shortcodes', 'enqueue_scripts' ] );
    }

    public static function survey_shortcode( $atts, $content = null, $tag = '' ) {
        $atts = array_change_key_case( (array)$atts, CASE_LOWER );

        extract( shortcode_atts(
            [
                'id' => '',
                'style' => '',
            ],
            $atts,
            'ri_survey'
        ) );

        $survey = new WP_Query([
            'post_type' => 'ri-encuestas',
            'p'         => $id
        ]);

        $output = <<<HTML
            <div>No hay encuesta disponible</div>
        HTML;

        if ($survey->have_posts() ) : 
            while ( $survey->have_posts() ) : $survey->the_post();
                $uri = get_template_directory_uri();
                $title = get_the_title(); 
                $content = get_the_content();
                $survey_link = get_post_type_archive_link( 'ri-encuestas' );

                $output = <<<HTML
                <div class="ri-block-survey {$style}">
                    <div class="header">
                        <div>Encuestas</div>
                        <img class="lazyload" loading="lazy" data-src="{$uri}/assets/images/custom/elecciones-2021.svg" alt="logo-elecciones-2021" />
                    </div>
                    <div class="body">
                        <div class="survey-title">{$title}</div>
                        <div class="survey-content">{$content}</div>
                        <div class="survey-button">
                            <a class="btn-general" href="{$survey_link}" title="Ir a sección encuestas">
                                Ver más encuestas
                            </a>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="ftop">
                            <img class="lazyload" loading="lazy" data-src="{$uri}/assets/images/custom/reporte-top-voto.svg" alt="logo-valor-del-voto-top" />
                        </div>
                        <div class="fbottom">
                            <img class="lazyload" loading="lazy" data-src="{$uri}/assets/images/custom/reporte-isotipo.svg" alt="logo-valor-del-voto-isotipo" />
                            <img class="lazyload" loading="lazy" data-src="{$uri}/assets/images/custom/reporte-bottom-voto.svg" alt="logo-valor-del-voto-bottom" />
                        </div>
                    </div>
                </div>
            HTML;
            endwhile;
        endif;

        return $output;
    }

    public static function enqueue_scripts(  ) {
        global $post;

        $has_shortcode = has_shortcode( $post->post_content, 'ri_survey');
    }

    public static function register_mce_buttons( $buttons ) {

        $buttons[] = 'encuestas';

        return $buttons;

    }

    public static function register_mce_plugin( $plugin_array ) {
        $plugin_array['encuestas'] = get_template_directory_uri() . '/proposal/surveys/js/plugin.js';

        return $plugin_array;
    }

    public static function get_surveys(  ) {

        $response = [];

        $surveys = new WP_Query([
            'post_type'      => 'ri-encuestas',
            'posts_per_page' => -1
        ]);

        if ($surveys->have_posts() ) : 
            while ( $surveys->have_posts() ) : $surveys->the_post();
                $response[] = [
                    'text'  => get_the_title(),
                    'value' => get_the_ID()
                ];
            endwhile;
        else :
            $response[] = [
                'text'  => 'No hay encuestas disponibles',
                'value' => ''
            ];
        endif;

        wp_send_json_success( $response );
    }

}

?>