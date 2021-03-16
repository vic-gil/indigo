<?php
/**
 * Control: Sortable Repeater
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
**/

function get_my_post_types() {
    $post_types = get_post_types( ['public' => true, '_builtin' => false], 'objects' );
    $posts = [];

    foreach ($post_types as $post_type) {
        $posts[$post_type->name] = $post_type->label;
    }

    return $posts;
}

if ( class_exists('WP_Customize_Control') ) {

	class WP_Customize_RI_Select extends WP_Customize_Control {

		public $type = 'ri_select';
		private $multiselect = false;
		private $maximumSelectionLength = 0;
		private $placeholder = 'Selecciona un elemento...';
		
		public function __construct( $manager, $id, $args = [], $options = [] ) {
	        parent::__construct( $manager, $id, $args );

	        if ( isset( $this->input_attrs['multiselect'] ) && $this->input_attrs['multiselect'] ) {
				$this->multiselect = true;
			}

			if ( isset( $this->input_attrs['maximumSelectionLength'] ) && $this->input_attrs['maximumSelectionLength'] ) {
				$this->maximumSelectionLength = $this->input_attrs['maximumSelectionLength'];
			}

			if ( isset( $this->input_attrs['placeholder'] ) && $this->input_attrs['placeholder'] ) {
				$this->placeholder = $this->input_attrs['placeholder'];
			}
	        
	    }

	    public function enqueue() {
	    	wp_enqueue_style('select2-style', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', [], '1.0.0', 'all' );

			wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['jquery', 'jquery-ui-core'], '', true );

			wp_enqueue_script( 'select2-lang-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/i18n/es.min.js', ['select2-js'], '', true );

			wp_enqueue_script( 'control-select-js', get_stylesheet_directory_uri() . '/inc/customizer/controls/js/control-select.js', ['select2-js', 'jquery', 'jquery-ui-core'], '', true );

			add_action( 'customize_controls_print_styles', [ $this, 'print_styles' ] );
	    }

	    public function render_content() {
	    	$defaultValue = $this->value();
	    	if ( $this->multiselect ) {
				$defaultValue = explode( ',', $this->value() );
			}
	    ?>
	    <div class="ri_select_control">
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
		    <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr( $this->value() ); ?>" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> />
		    <select name="select2-list-<?php echo ( $this->multiselect ? 'multi[]' : 'single' ); ?>" class="customize-control-select2" data-placeholder="<?php echo $this->placeholder; ?>" data-maximum-selection-length="<?php echo $this->maximumSelectionLength; ?>" <?php echo ( $this->multiselect ? 'multiple="multiple" ' : '' ); ?>>
				<?php
					if ( !$this->multiselect ) {
						echo '<option></option>';
					}
					foreach ( $this->choices as $key => $value ) {
						if ( is_array( $value ) ) {
							echo '<optgroup label="' . esc_attr( $key ) . '">';
							foreach ( $value as $optgroupkey => $optgroupvalue ) {
								if( $this->multiselect ){
									echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . ( in_array( esc_attr( $optgroupkey ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $optgroupvalue ) . '</option>';
								}
								else{
									echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . selected( esc_attr( $optgroupkey ), $defaultValue, false )  . '>' . esc_attr( $optgroupvalue ) . '</option>';
								}
							}
							echo '</optgroup>';
						}
						else {
							if( $this->multiselect ){
								echo '<option value="' . esc_attr( $key ) . '" ' . ( in_array( esc_attr( $key ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $value ) . '</option>';
							}
							else{
								echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $key ), $defaultValue, false )  . '>' . esc_attr( $value ) . '</option>';
							}
						}
					}
				?>
			</select>
		</div>
	    <?php
	    }

	    function print_styles() {
	    ?>
	 		<style>
	 		    
	 		</style>
	    <?php
	    }

	}

}
?>