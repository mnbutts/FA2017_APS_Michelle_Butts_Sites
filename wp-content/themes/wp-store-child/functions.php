<?php
//Pull Stylesheet into child theme
add_action( 'wp_enqueue_scripts', 'wp_store_child_enqueue_styles' );
function wp_store_child_enqueue_styles() {
    wp_enqueue_style( 'wp-store', get_template_directory_uri() . '/style.css' );
}
//Pull responsive stylesheet into child theme
add_action( 'wp_enqueue_scripts', 'custom_responsive_css', 20 );
function custom_responsive_css() {
    wp_dequeue_style( 'responsive' );
    wp_enqueue_style( 'wp-store-child', get_stylesheet_directory_uri() . '/css/responsive.css');
}

// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
// Save Variation Settings
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );
/**
 * Create new fields for variations
 *
*/
function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Text Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_text_field[' . $variation->ID . ']',
			'label'       => __( 'My Text Field', 'woocommerce' ),
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_text_field', true )
		)
	);
	// Number Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_number_field[' . $variation->ID . ']',
			'label'       => __( 'My Number Field', 'woocommerce' ),
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom number here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_number_field', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						)
		)
	);
	// Textarea
	woocommerce_wp_textarea_input(
		array(
			'id'          => '_textarea[' . $variation->ID . ']',
			'label'       => __( 'My Textarea', 'woocommerce' ),
			'placeholder' => '',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_textarea', true ),
		)
	);
	// Select
	woocommerce_wp_select(
	array(
		'id'          => '_select[' . $variation->ID . ']',
		'label'       => __( 'My Select Field', 'woocommerce' ),
		'description' => __( 'Choose a value.', 'woocommerce' ),
		'value'       => get_post_meta( $variation->ID, '_select', true ),
		'options' => array(
			'one'   => __( 'Option 1', 'woocommerce' ),
			'two'   => __( 'Option 2', 'woocommerce' ),
			'three' => __( 'Option 3', 'woocommerce' )
			)
		)
	);
	// Checkbox
	woocommerce_wp_checkbox(
	array(
		'id'            => '_checkbox[' . $variation->ID . ']',
		'label'         => __('My Checkbox Field', 'woocommerce' ),
		'description'   => __( 'Check me!', 'woocommerce' ),
		'value'         => get_post_meta( $variation->ID, '_checkbox', true ),
		)
	);
	// Hidden field
	woocommerce_wp_hidden_input(
	array(
		'id'    => '_hidden_field[' . $variation->ID . ']',
		'value' => 'hidden_value'
		)
	);
}
/**
 * Save new fields for variations
 *
*/
function save_variation_settings_fields( $post_id ) {
	// Text Field
	$text_field = $_POST['_text_field'][ $post_id ];
	if( ! empty( $text_field ) ) {
		update_post_meta( $post_id, '_text_field', esc_attr( $text_field ) );
	}

	// Number Field
	$number_field = $_POST['_number_field'][ $post_id ];
	if( ! empty( $number_field ) ) {
		update_post_meta( $post_id, '_number_field', esc_attr( $number_field ) );
	}
	// Textarea
	$textarea = $_POST['_textarea'][ $post_id ];
	if( ! empty( $textarea ) ) {
		update_post_meta( $post_id, '_textarea', esc_attr( $textarea ) );
	}

	// Select
	$select = $_POST['_select'][ $post_id ];
	if( ! empty( $select ) ) {
		update_post_meta( $post_id, '_select', esc_attr( $select ) );
	}

	// Checkbox
	$checkbox = isset( $_POST['_checkbox'][ $post_id ] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_checkbox', $checkbox );

	// Hidden field
	$hidden = $_POST['_hidden_field'][ $post_id ];
	if( ! empty( $hidden ) ) {
		update_post_meta( $post_id, '_hidden_field', esc_attr( $hidden ) );
	}
}
// Add New Variation Settings
add_filter( 'woocommerce_available_variation', 'load_variation_settings_fields' );
/**
 * Add custom fields for variations
 *
*/
function load_variation_settings_fields( $variations ) {

	// duplicate the line for each field
	$variations['text_field'] = get_post_meta( $variations[ 'variation_id' ], '_text_field', true );

	return $variations;
}
//Customizer Modifications

function wp_store_child_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here

}
add_action( 'customize_register', 'wp_store_child_customize_register' );

function wp_store_child_cat_lists() {
  $prod_type = array(
    'right_align' => __('Right Align With Category Image', 'wp-store'),
    'left_align' => __('Left Align With Category Image', 'wp-store'),
    );
  $taxonomy     = 'product_cat';
  $empty        = 1;
  $orderby      = 'name';
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;
  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty

    );
  $woocommerce_categories = array();
  $woocommerce_categories_obj = get_categories($args);
  $woocommerce_categories[''] = 'Select Product Category:';
  foreach ($woocommerce_categories_obj as $category) {
    $woocommerce_categories[$category->term_id] = $category->name;
  }

  $fields = array(
    'product_type' => array(
      'wp_store_widgets_name' => 'product_alignment',
      'wp_store_widgets_title' => __('Select the Display Style (Image Alignment)', 'wp-store'),
      'wp_store_widgets_field_type' => 'select',
      'wp_store_widgets_field_options' => $prod_type

      ),
    'product_category' => array(
      'wp_store_widgets_name' => 'product_category',
      'wp_store_widgets_title' => __('Select Product Category', 'wp-store'),
      'wp_store_widgets_field_type' => 'select',
      'wp_store_widgets_field_options' => $woocommerce_categories

      ),


    );
  return $woocommerce_categories;
}
