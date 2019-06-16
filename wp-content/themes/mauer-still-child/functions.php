<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}



function child_scripts() {
	wp_enqueue_script('artist-js', get_stylesheet_directory_uri() . '/js/artist.js', '', '',true);
}

add_action('wp_enqueue_scripts', 'child_scripts', 99999);

// Disabled gutenberg to see the post editor

add_filter('use_block_editor_for_post_type', 'd4p_32752_completly_disable_block_editor');
function d4p_32752_completly_disable_block_editor($use_block_editor) {
  return false;
};

// reenabling Advanced Custom Fields access via admin

// add_filter( 'acf/settings/remove_wp_meta_box', '__return_false', PHP_INT_MAX, 1 );

add_filter('acf/settings/show_admin', '__return_true', 15);


// re-enabling tags
function reg_tag() {
     register_taxonomy_for_object_type('post_tag', 'project');
}
add_action('init', 'reg_tag');



if (!function_exists('mauer_stills_get_project_posts_per_page')) :

	function mauer_stills_get_project_posts_per_page() {
		// default value
		// changed all values to 6 from the theme defaults
		$project_posts_per_page = 6;

		// for portfolio page
		if ((!isset($_GET["portfolio_demo_layout"])) && (function_exists('get_field'))) {
			$project_posts_per_page = get_field('project_posts_per_page','option');
		}
		// for demo purposes
		else {
			$demo_layout_style = $_GET["portfolio_demo_layout"];
			switch ($demo_layout_style) {
				case 'flow_2cols':
					$project_posts_per_page = 6;
					break;
				case 'grid_3cols':
					$project_posts_per_page = 6;
					break;
				case 'masonry_4cols':
					$project_posts_per_page = 6;
					break;
			}
		}

		// for serving the requested amount of projects at the end of single project page
		if (isset($_GET['project_posts_per_page'])) {$project_posts_per_page = $_GET['project_posts_per_page'];}

		return $project_posts_per_page;
	}

endif;


// loading Font Awesome icons to be displayed next to links

function enqueue_load_fa() {
 
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
}

add_action('wp_enqueue_scripts', 'enqueue_load_fa');

// limit the number of tags that will be output on the front end
add_filter('term_links-post_tag','limit_to_three_tags');
	function limit_to_three_tags($terms) {
		return array_slice($terms,0,3,true);
}

// Advanced Custom Fields

// if( function_exists('acf_add_local_field_group') ):

// acf_add_local_field_group(array(
// 	'key' => 'group_5c8b8cdc3723a',
// 	'title' => 'Artist links',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5c8b8cfa1a5f2',
// 			'label' => 'Artist details',
// 			'name' => 'artist_details',
// 			'type' => 'group',
// 			'instructions' => 'Add links to find artist online, their representation and their instagram page.

// URL validation demands link begins http:// or https://',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'layout' => 'block',
// 			'sub_fields' => array(
// 				array(
// 					'key' => 'field_5c8b8d6c1a5f4',
// 					'label' => 'Online',
// 					'name' => 'online',
// 					'type' => 'url',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 				),
// 				array(
// 					'key' => 'field_5c8b8ded1a5f6',
// 					'label' => 'Representation',
// 					'name' => 'representation',
// 					'type' => 'url',
// 					'instructions' => 'Enter a link to the artist\'s representation here.',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 				),
// 				array(
// 					'key' => 'field_5c8b8d421a5f3',
// 					'label' => 'Instagram',
// 					'name' => 'instagram',
// 					'type' => 'url',
// 					'instructions' => 'Enter the instagram link here',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 				),
// 			),
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'post_type',
// 				'operator' => '==',
// 				'value' => 'project',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => 1,
// 	'description' => '',
// ));

// acf_add_local_field_group(array(
// 	'key' => 'group_5c8ba24f5cd55',
// 	'title' => 'Artist\'s work by brand',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5c8ba28f0d5b9',
// 			'label' => 'Work section',
// 			'name' => 'work_section',
// 			'type' => 'repeater',
// 			'instructions' => 'The work section has a brand and multiple images.',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'collapsed' => '',
// 			'min' => 0,
// 			'max' => 0,
// 			'layout' => 'block',
// 			'button_label' => '',
// 			'sub_fields' => array(
// 				array(
// 					'key' => 'field_5c8ba2e70d5ba',
// 					'label' => 'Brand',
// 					'name' => 'brand',
// 					'type' => 'taxonomy',
// 					'instructions' => 'Select the brand from the list.

// To add new brands to this list, add them as a tag to this post.',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'taxonomy' => 'post_tag',
// 					'field_type' => 'select',
// 					'allow_null' => 0,
// 					'add_term' => 1,
// 					'save_terms' => 0,
// 					'load_terms' => 0,
// 					'return_format' => 'id',
// 					'multiple' => 0,
// 				),
// 				array(
// 					'key' => 'field_5c8ba3fc0d5bb',
// 					'label' => 'Gallery',
// 					'name' => 'gallery',
// 					'type' => 'gallery',
// 					'instructions' => 'Choose images associated with this brand',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'min' => '',
// 					'max' => '',
// 					'insert' => 'append',
// 					'library' => 'all',
// 					'min_width' => '',
// 					'min_height' => '',
// 					'min_size' => '',
// 					'max_width' => '',
// 					'max_height' => '',
// 					'max_size' => '',
// 					'mime_types' => '',
// 				),
// 			),
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'post_type',
// 				'operator' => '==',
// 				'value' => 'project',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => array(
// 		0 => 'the_content',
// 	),
// 	'active' => 1,
// 	'description' => '',
// ));

// acf_add_local_field_group(array(
// 	'key' => 'group_5c9251b51b5d8',
// 	'title' => 'Brand details',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5c9251e37d12a',
// 			'label' => 'Online',
// 			'name' => 'online',
// 			'type' => 'url',
// 			'instructions' => 'Enter the link to the brand\'s site.',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'default_value' => '',
// 			'placeholder' => '',
// 		),
// 		array(
// 			'key' => 'field_5c9251fe7d12b',
// 			'label' => 'Location',
// 			'name' => 'location',
// 			'type' => 'text',
// 			'instructions' => 'Enter where the brand is located.',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'default_value' => '',
// 			'placeholder' => '',
// 			'prepend' => '',
// 			'append' => '',
// 			'maxlength' => '',
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'taxonomy',
// 				'operator' => '==',
// 				'value' => 'post_tag',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => 1,
// 	'description' => '',
// ));

// acf_add_local_field_group(array(
// 	'key' => 'group_5c8fa6c2705b1',
// 	'title' => 'Fields or default editor',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5c8fa6d4d1d49',
// 			'label' => 'Enable Fields',
// 			'name' => 'enable_fields',
// 			'type' => 'true_false',
// 			'instructions' => 'If toggled on, Artist\'s work by brand custom fields will control the layout and the default WordPress editor will not output to the page.

// If toggled off, custom fields will output nothing and the editor will control the page\'s content.',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'message' => '',
// 			'default_value' => 1,
// 			'ui' => 0,
// 			'ui_on_text' => '',
// 			'ui_off_text' => '',
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'post_type',
// 				'operator' => '==',
// 				'value' => 'project',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => 1,
// 	'description' => '',
// ));

// endif;