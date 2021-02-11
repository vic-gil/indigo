<?php
/**
 * Reporte_Indigo_General_Options Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 1.0.0
 *
 */

/**
* Clase para añadir un menú para configuraciones
* generales del tema
*
*/

class Reporte_Indigo_General_Options {

	/**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Se inicializa el plugin
     */
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Agrega la configuración a la opcion del menu settings
     */
    public function add_plugin_page(){
        add_options_page(
            'Opciones RI', 							// page <title>Title</title>
            'Opciones RI', 							// menu link text
            'manage_options',  						// capability to access the page
            'general_options_ri',  					// page URL slug
            array( $this, 'create_template_page' ) 	// callback function /w content
        );
    }

    /**
     * Callback que crea la interfaz de la opción
     */
    public function create_template_page(){
        // Set class property
        $this->options = get_option( 'general_options_ri' ); ?>
        <div class="wrap">
            <h1>Opciones RI</h1>
            <form method="post" action="options.php">
            	<?php
                settings_fields( 'my_option_group' );
                do_settings_sections( 'setting-header-tag-admin' ); // seccion de la pagina
                submit_button();
            	?>
            </form>
        </div>
   		<?php
    }

    /**
     * Register and add settings
     */
    public function page_init(){        
        register_setting(
            'my_option_group',						// Option group
            'general_options_ri', 					// nombre del option_name en la tabla {prefix}_options
            array( $this, 'sanitize' ) 				// Sanitize
        );

        // agrega una seccion / etiqueta www head
        add_settings_section(
            'setting_section_id', 					// ID del bloque
            'Etiqueta www', 						// Title
            array( $this, 'tag_www_info' ), 	    // Callback
            'setting-header-tag-admin' 				// seccion de la pagina
        );  

        // agrega checkbox / etiqueta www checkbox
        add_settings_field(
            'chk_option_tag', 						// ID
            'Mostrar/ocultar', 						// Title 
            array( $this, 'create_item_chk' ), 		// Callback
            'setting-header-tag-admin', 			// seccion de la pagina
            'setting_section_id' 					// ID del bloque contenedor           
        );


        // agrega una seccion / cambio de dominio
        add_settings_section(
            'setting_change_domain_id',             // ID del bloque
            'Dominios estáticos',                   // Title
            array( $this, 'change_domain_info'),    // Callback
            'setting-header-tag-admin'              // seccion de la pagina
        ); 

        // agrega input /  cambio de dominio
        add_settings_field(
            'input_search_domain',                          // ID
            'Buscar',                                       // Title 
            array( $this, 'create_input_search_domain' ),   // Callback
            'setting-header-tag-admin',                     // seccion de la pagina
            'setting_change_domain_id'                      // ID del bloque contenedor           
        );

        // agrega input /  cambio de dominio
        add_settings_field(
            'input_replace_domain',                         // ID
            'Remplazar',                                    // Title 
            array( $this, 'create_input_replace_domain' ),  // Callback
            'setting-header-tag-admin',                     // seccion de la pagina
            'setting_change_domain_id'                      // ID del bloque contenedor           
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ){
        $new_input 	= array();

        if(isset($input['chk_option_tag']))
            $new_input['chk_option_tag']        = absint($input['chk_option_tag']);

        if(isset($input['input_search_domain']))
            $new_input['input_search_domain']   = sanitize_text_field($input['input_search_domain']);

        if(isset($input['input_replace_domain']))
            $new_input['input_replace_domain']  = sanitize_text_field($input['input_replace_domain']);

        return $new_input;
    }

    /** 
     * Imprime una descripción de la sección / etiqueta www
     */
    public function tag_www_info(){
        print_r('Muestra u oculta la etiqueta www del encabezado del sitio');
    }

    /** 
     * Imprime una descripción de la sección / cambio de dominio
     */
    public function change_domain_info(){
        print_r('Ingresa el domino a buscar y lo cambia por el domino desado acorde a la situación en que se ocupe');
    }

    /** 
     * Crea el elemento html
     */
    public function create_item_chk(){
    	$checked 	= isset( $this->options['chk_option_tag'] ) ? ' checked ' : '';
    	print_r('<input type="checkbox" id="chk_option_tag" name="general_options_ri[chk_option_tag]" value="1" '.$checked.'>');
    }

    /** 
     * Crea el elemento html
     */
    public function create_input_search_domain(){
        $value      = isset( $this->options['input_search_domain'] ) ? $this->options['input_search_domain'] : "";
        print_r('<input type="text" 
                        id="input_search_domain" 
                        name="general_options_ri[input_search_domain]" 
                        placeholder="http://"
                        value="'.$value.'">');
    }
    
    /** 
     * Crea el elemento html
     */
    public function create_input_replace_domain(){
        $value      = isset( $this->options['input_replace_domain'] ) ? $this->options['input_replace_domain'] : "";
        print_r('<input type="text" 
                        id="input_replace_domain" 
                        name="general_options_ri[input_replace_domain]" 
                        placeholder="http://"
                        value="'.$value.'">');
    }

}

if( is_admin() )
    new Reporte_Indigo_General_Options(); 
?>