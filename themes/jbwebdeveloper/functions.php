<?php

/*=================================
INCLUDE SCRIPTS
=================================*/

function jbwebdevelopment_scripts () {
	/*CSS*/
	//wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Cabin:wght@400;600;700&display=swap', false );
	//wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap', false );

	wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap', false );
	wp_enqueue_style ('slickcss', get_template_directory_uri().'/slick/slick.css',array(), '1.0.0', 'all');
	wp_enqueue_style ('animate.css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css', '1.0.0', 'all');
	wp_enqueue_style ('main-stylesheet', get_template_directory_uri().'/style.css',array(), '1.0.0', 'all');

	/*JS*/
	wp_enqueue_script ("jquery");
	wp_enqueue_script ('slick', get_template_directory_uri(). '/slick/slick.min.js', array(), '1.0.0', true);
	wp_enqueue_script ('app-js', get_template_directory_uri(). '/js/app.js', array(), '1.0.0', true);

}
add_action ('wp_enqueue_scripts','jbwebdevelopment_scripts');
add_action('admin_enqueue_scripts', 'jbwebdevelopment_scripts');

/*=================================
REMOVE EMPTY P TAGS
=================================*/

remove_filter('the_content', 'wpautop');


/*=================================
REMOVE ADMIN BAR HEIGHT
=================================*/


// add_action('get_header', 'my_filter_head');
//
//   function my_filter_head() {
//     remove_action('wp_head', '_admin_bar_bump_cb');
//   }


add_action( 'wp_head', 'prefix_move_theme_down' );
function prefix_move_theme_down() {
  if ( is_admin_bar_showing() ) {
    ?>
    <style type="text/css">
    .sideNav.fixed, #burgerMenu.fixed { top: 32px; }
    </style>
    <?php
  }
}

/*=================================
THEME SUPPORT
=================================*/
add_theme_support( 'title-tag' );
add_theme_support ('post-thumbnails');
add_theme_support ('post-formats', array('aside','image','video'));

//add file support for psd and svg
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

//editor widths
add_theme_support( 'editor-styles' );

function mytheme_add_editor_styles() {
    add_editor_style( 'style-editor.css' );
}
add_action( 'admin_init', 'mytheme_add_editor_styles' );


/*=================================
IMAGE SIZES
=================================*/

function use_new_image_size() {
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'new-image', 550, 0, false );
    }
}
add_action( 'after_setup_theme', 'use_new_image_size' );

function create_custom_image_size($sizes){
    $custom_sizes = array(
    'new-image' => 'New Image'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'create_custom_image_size');


/*=================================
MENU
=================================*/

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'jbwebdeveloper' ),
	//'secondary' => __( 'Secondary Menu', 'jbwebdeveloper' ),
) );



/*=================================
OPTIONS ACF
=================================*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}


/*=================================
Add Custom Block Categories
=================================*/

function blocks_block_categories( $categories ) {
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    return in_array( 'blocks', $category_slugs, true ) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => 'blocks',
                'title' => __( 'JB Blocks', 'blocks' ),
                'icon'  => null,
            ),
        )
    );
}
add_filter( 'block_categories', 'blocks_block_categories' );

/*=================================
Block Restriction
=================================*/

//add_theme_support('align-wide');

// function my_gutenberg_blocks() {
//   return array(
// 		'acf/card',
// 		'core/heading',
// 		'core/paragraph',
// 		'core/image',
// 		'core/columns',
//   );
// }
// add_filter( 'allowed_block_types', 'my_gutenberg_blocks' );


// function my_gutenberg_blocks() {
// 	$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
//
// 	$registered_blocks = array_keys( $registered_blocks );
// 	return array_merge( array(
// 		// 'core/paragraph',
// 		'cgb/block-jb-blocks'
// 		// 'core/heading',
// 	), $registered_blocks );
// }
// add_filter( 'allowed_block_types', 'my_gutenberg_blocks' );

/*=================================
ACF Blocks
=================================*/

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

				wp_enqueue_style ('block-styles', get_template_directory_uri().'/css/style.css',array(), '1.0.0', 'all');


        // Register a testimonial block.
				acf_register_block_type(array(
            'name'              => 'header',
            'title'             => __('Header'),
            'description'       => __('A custom header block.'),
            'render_template'   => 'blocks/header/header.php',
            'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
						//'enqueue_style' 		=> get_template_directory_uri() . '/css/style.css',
        ));

        acf_register_block_type(array(
            'name'              => 'card',
            'title'             => __('Card'),
            'description'       => __('A custom card block.'),
            'render_template'   => 'blocks/card/card.php',
            'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
        ));

				acf_register_block_type(array(
            'name'              => 'narrowText',
            'title'             => __('Narrow Text'),
            'description'       => __('A custom narrow text block.'),
            'render_template'   => 'blocks/narrowText/narrowText.php',
            'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
        ));

				acf_register_block_type(array(
            'name'              => 'textAndMedia',
            'title'             => __('Media and Text'),
            'description'       => __('A custom media and text block.'),
            'render_template'   => 'blocks/staggered/staggered.php',
            'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
        ));

				acf_register_block_type(array(
            'name'              => 'fullwidthimage',
            'title'             => __('Full width Image'),
            'description'       => __('A custom full width media block.'),
            'render_template'   => 'blocks/fullwidthimage/fullwidthimage.php',
            'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
        ));

				acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'blocks/slider/slider.php',
						'category'          => 'blocks',
						'supports' 					=> [ 'align' => true ],
						'enqueue_assets' 	=> function(){
							wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
							wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
							wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

							wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/blocks/slider/slider.js', array(), '1.0.0', true );
						  },
        ));
    }
}

/*=================================
CUSTOM COLOR PALETTE FOR ACF BLOCKS
=================================*/

function my_acf_input_admin_footer() {

	?>
	<script type="text/javascript">
	(function($) {

		acf.add_filter('color_picker_args', function( args, $field ){

			// do something to args
			args.palettes = ['#333', '#1a75c1', '#000629', '#004ec5', '#9eb4e1', '#FFF']
			// return
			return args;

		});

	})(jQuery);
	</script>
	<?php

}

add_action( 'acf/input/admin_head', 'my_acf_input_admin_footer');

/*=================================
EXCERPT
=================================*/

// Changing excerpt length
function new_excerpt_length($length) {
return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*=================================
BLOCK WP ENUM SCANS
=================================*/
// https://m0n.co/enum
if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}
