<?php
/**
 * Control: Sortable Repeater
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
**/
if ( class_exists('WP_Customize_Control') ) {

	class WP_Customize_RI_Control extends WP_Customize_Control {

		public $type = 'sortable_repeater';
		public $button_labels = [];

		public function __construct( $manager, $id, $args = [], $options = [] ) {
	        parent::__construct( $manager, $id, $args );
	        $this->button_labels = wp_parse_args( $this->button_labels, [
	            'add' => __( 'Agregar', 'reporte_indigo' ),
	        ]);
	    }

	    public function enqueue() {
	    	wp_enqueue_style('select2-style', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', [], '1.0.0', 'all' );

			wp_enqueue_script( 'sortable-js', 'https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js', ['jquery', 'jquery-ui-core'], '', true );
			wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['jquery', 'jquery-ui-core'], '', true );
			wp_enqueue_script( 'control-sortable-js', get_stylesheet_directory_uri() . '/inc/customizer/controls/js/control-sortable.js', ['customize-controls', 'select2-js', 'sortable-js', 'jquery', 'jquery-ui-core'], '', true );

			add_action( 'customize_controls_print_styles', [ $this, 'print_styles' ] );
	    }

	    public function render_content() {
	    $posts = new WP_Query([
	    	'post_type' => [
	    		'ri-reporte',
				'ri-opinion',
				'ri-latitud',
				'ri-indigonomics',
				'ri-piensa',
				'ri-fan',
				'ri-desglose',
				'ri-documento-indigo',
				'ri-salida-emergencia',
				'ri-especial'
	    	],
	    	'posts_per_page' => 100,
	    	'post_status'    => 'publish',
			'orderby' 		 => 'date',
			'order' 		 => 'DESC', 
	    	'date_query' 	 => [
	    		[
	    			'after' => date("Y-m-d H:i:s", strtotime("-3 months"))
	    		]	
	    	]
	    ]);
	    ?>
	    <div class="sortable_repeater_control">
	    	<?php
	    	if ( ! empty( $this->label ) ):
	    	?>
	    	<span class="customize-control-title"><?=esc_html( $this->label );?></span>
	    	<?php
	    	endif;
	    	if ( ! empty( $this->description ) ):
	    	?>
	    	<span class="customize-control-description"><?=esc_html( $this->description );?></span>
	    	<?php
	    	endif;
	    	?>
	    	<div class="repeater hide-template">
				<select class="repeater-input">
					<option value="">Selecciona un post</option>
					<?php
					if ( $posts->have_posts() ): 
						while ( $posts->have_posts() ): $posts->the_post();
							printf( '<option value="%s">%s</option>', get_the_ID(), get_the_title() );
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</select>
			    <span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a>
			</div>
		    <input type="hidden" id="<?=esc_attr( $this->id );?>" name="<?=esc_attr( $this->id );?>" value="<?=esc_attr( $this->value() );?>" class="customize-control-sortable-repeater" <?php $this->link();?> />
		    <div class="sortable"></div>
		    <button class="button customize-control-sortable-repeater-add" type="button"><?=$this->button_labels[ 'add' ]; ?></button>
		</div>
	    <?php
	    }

	    function print_styles() {
	    ?>
	 		<style>
	 			.hide-template {
	 				display: none !important;
	 			}
	 		    .sortable {
	 		        list-style-type: none;
	 		        margin: 0;
	 		        margin-bottom: 1rem !important;
	 		        padding: 0;
	 		    }
	 		    .sortable input[type="text"] {
	 		        margin: 5px 5px 5px 0;
	 		        width: 78%;
	 		    }
	 		    .sortable select{
	 		    	flex: 1;
	 		    	position: relative;
	 		    	margin: 10px 5px 10px 0;
	 		        width: 78%;
	 		    }
	 		    .sortable .select2{
	 		    	flex: 1;
	 		    }
	 		    .sortable div {
	 		        cursor: move;
	 		    }
	 		    .customize-control-sortable-repeater-delete {
	 		        color: #d4d4d4;
	 		    }
	 		    .customize-control-sortable-repeater-delete:hover {
	 		        color: #f00;
	 		    }
	 		    .customize-control-sortable-repeater-delete .dashicons-no-alt {
	 		        text-decoration: none;
	 		        padding: .25rem;
	 		        font-weight: 600;
	 		    }
	 		    .customize-control-sortable-repeater-delete:active,
	 		    .customize-control-sortable-repeater-delete:focus {
	 		        outline: none;
	 		        -webkit-box-shadow: none;
	 		        box-shadow: none;
	 		    }
	 		    .repeater {
	 		    	display: -ms-flexbox;
	 		    	display: flex;
	 		    	margin: 10px 0px;
	 		    }
	 		    .repeater .dashicons-sort {
	 		        padding: .25rem;
	 		        color: #d4d4d4;
	 		    }
	 		    .repeater .dashicons-sort:hover {
	 		        color: #a7a7a7;
	 		    }
	 		    .select2-container {
	 		    	z-index: 1000000 !important;
	 		    }
	 		</style>
	    <?php
	    }

	}

}
?>