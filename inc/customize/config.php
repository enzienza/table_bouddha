<?php
/**
 * File about theme config
 *
 * Dans ce fichier vous trouverez le code relatif à la configuration du theme
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */


/**
 * --- INDEX ---
 *
 * 1 - setup_theme
 * 2 - menu_class_link
 * 3 - register_assets
 * 4 - title_separator
 * 5 - remove_version
 *
 */


/**
 * 1 - setup_theme
 * Loading of the theme setup
 */
if(!function_exists('tablebouddha_supports')){
  function tablebouddha_supports(){
    // active le titre => important pour le réferencement
    add_theme_support( "title-tag" );

    // Enable automatic feed links
    add_theme_support( 'automatic-feed-links' );

    // Enable featured image
    add_theme_support('post-thumbnails');

    // dimention image
    add_image_size('post-thumbnail', 350, 215, true);

    // Custom menu areas
    register_nav_menus( array(
      'header' => esc_html__( 'Header', 'En tête du menu' ),
      'footer' => esc_html__( 'Footer', 'Pied de page' )
    ) );
  }
}
add_action('after_setup_theme','tablebouddha_supports' );


/**
 * 2 - menu_class_link
 * Forced the custom css of menu
 */

function tablebouddha_menu_class($classes){
  $classes[] = 'nav-item';
  return $classes;
}

add_filter( "nav_menu_css_class", 'tablebouddha_menu_class' );

function tablebouddha_menu_class_link($attrs){
  $attrs['class'] = 'nav-link';
  return $attrs;
}

 add_filter( "nav_menu_link_attributes", "tablebouddha_menu_class_link" );


/**
 * 3 - register_assets
 * Include Style and Script of theme
 */
if(!function_exists('tablebouddha_register_assets')){
  function tablebouddha_register_assets(){

    /**
     * JAVASRIPT
     */
    // cdn JS bootstrap 4.0
    wp_register_script(
      'bootstrap',
      'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
      ['popper', 'jquery'],
      '4.4.1',
      true
    );
    wp_register_script(
      'popper',
      'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
      [],
      '1.16.0',
      true
    );
    wp_enqueue_script('bootstrap');

    // MY PLUGINS
    wp_enqueue_script(
      'solid-navbar',
      get_template_directory_uri().'/assets/js/plugins/solid-navbar.js',
      [],
      '1.0',
      true
    );

    wp_enqueue_script(
      'scroll-top',
      get_template_directory_uri().'/assets/js/plugins/scroll-top.js',
      [],
      '1.0',
      true
    );

    // wp_register_script('fontawesome', get_template_directory_uri().'/assets/fontawesome/js/all.js');
    // wp_register_script('stickyfill', get_template_directory_uri().'/assets/plugins/stickyfill/dist/stickyfill.min.js');

    // wp_register_script('main', get_template_directory_uri().'/assets/js/main.js');

    // cdn jQuery
    wp_deregister_script('jquery');
    wp_register_script(
      'jquery',
      'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
      [],
      '3.5.1',
      true
    );

    /**
     * STYLE
     */
    // CDN Google-Font
    // wp_enqueue_style('googlefont','https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    // wp_enqueue_style('elegant_font',get_template_directory_uri().'/assets/plugins/elegant_font/css/style.css');

    // css custem
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.min.css');
  }
}
add_action('wp_enqueue_scripts', 'tablebouddha_register_assets');


/**
 * 4 - title_separator
 * Custom the separator of title
 */
if(!function_exists('tablebouddha_title_separator')){
  function tablebouddha_title_separator(){
    return '|';
  }
}
add_filter( 'document_title_separator', 'tablebouddha_title_separator');


/**
 * 5 - remove_version
 * Hidden the version what used of WordPress
 */

function tablebouddha_remove_version_strings( $src ) {
 	global $wp_version;
 	parse_str(parse_url($src, PHP_URL_QUERY), $query);
 	if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
 		$src = remove_query_arg('ver', $src);
 }
 	return $src;
}

add_filter( 'script_loader_src', 'tablebouddha_remove_version_strings' );
add_filter( 'style_loader_src', 'tablebouddha_remove_version_strings' );

// Hide WP version strings from generator meta tag
function tablebouddha_remove_version() {
 	return '';
}

add_filter('the_generator', 'tablebouddha_remove_version');
