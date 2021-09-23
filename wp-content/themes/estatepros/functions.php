<?php 

function mythem_enqueue_style_scripts() {


	if (!is_admin()) { 
        wp_enqueue_script( 'jquery'); 
    }
    wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/main.js');
	wp_enqueue_style( 'slickcss', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', '1.6.0', 'all');
	wp_enqueue_script('slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', false);
	wp_enqueue_style( 'style', get_template_directory_uri(). '/style.css' );
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri(). '/assets/css/bootstrap-grid.min.css' );
	wp_enqueue_style( 'maincss', get_template_directory_uri(). '/assets/css/main.css' );
	wp_enqueue_style( 'responsivecss', get_template_directory_uri(). '/assets/css/responsive.css' );
    }

    add_action( 'wp_enqueue_scripts', 'mythem_enqueue_style_scripts' );


add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header Settings',
		'menu_slug' 	=> 'header-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'menu_slug' 	=> 'footer-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


//post-type
add_action( 'init', 'true_register_post_type_init' );
function true_register_post_type_init() {
	$labels = array(
		'name' => 'Professionals',
		'singular_name' => 'Professionals',
		'add_new' => 'Add new',
		'add_new_item' => 'Add new professional',
		'edit_item' => 'Edit professional',
		'new_item' => 'New professional',
		'all_items' => 'All professionals',
		'view_item' => 'View professionals',
		'search_items' => 'Search professional',
		'not_found' =>  'Professional not found.',
		'not_found_in_trash' => 'Not found in Trash.',
		'menu_name' => 'Professionals'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true, 
		'menu_icon' => 'dashicons-groups', 
		'menu_position' => 20,
		'taxonomies'  => array( 'category' ),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	);
	register_post_type('professionals', $args);
}
// end post-type



add_filter( 'get_the_archive_title', function ($title) {    
	if ( is_category() ) {    
			$title = single_cat_title( '', false );    
		} elseif ( is_tag() ) {    
			$title = single_tag_title( '', false );    
		} elseif ( is_author() ) {    
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;    
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title( '', false );
		}
	return $title;    
});


?>