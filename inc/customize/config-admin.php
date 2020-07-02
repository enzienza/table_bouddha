<?php
/**
 * File for functions of customize Administration
 *
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

/**
 * *** INDEX ***
 *
 * 1 - Custom Page Admin
 * 2 - Custom Link Login
 * 3 - Custom alt
 * 4 - Custom Administration
 *
 */


/**
 * 1 - Custom Page Admin
 * Function that allow to customize the login page
 */
function custom_admin(){
  wp_enqueue_style(
    'admin_tablebouddha',
    get_template_directory_uri().'/assets/css/admin.css'
  );
}

add_action('login_head','custom_admin');
add_action('admin_head','custom_admin');



/**
 * 2 - Custom Link Login
 * Function to customize the logo link on the login page
 */
function custom_login_logo_link(){
    return get_bloginfo('siteurl');
}
add_filter( 'login_headerurl', 'custom_login_logo_link');



/**
 * 3 - Custom alt
 * Function to custom the alt property of the img tag (logo) on the login page
 */
function custom_login_logo_title(){
    return get_bloginfo('description');
}
add_filter('login_headertitle', 'custom_login_logo_title');



/**
 * 4 - Custom Administration
 * Function customize the CSS on the administration
 */
add_action('admin_enqueue_scripts', function(){
  /**
   * JAVASRIPT
   */

  // CDN Bootstrap
  // wp_register_script(
  //   'bootstrap',
  //   'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
  //   ['popper', 'jquery'],
  //   '4.4.1',
  //   true
  // );
  // wp_register_script(
  //   'popper',
  //   'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
  //   [],
  //   '1.16.0',
  //   true
  // );
  // wp_enqueue_script('bootstrap');


  /**
   * STYLE
   */
  // CDN Boostrap
  // wp_register_style(
  //   'bootstrap',
  //   'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
  //   [],
  //   '4.4.1',
  //   false
  // );
  // wp_enqueue_style('bootstrap');


  // CUSTOM CSS - Personnaliser l'administration
  wp_enqueue_style(
    'admin_tablebouddha',
    get_template_directory_uri().'/assets/css/admin.css'
  );

  // Utilisation des icons 'flaticon' dans l'administratrion
    wp_enqueue_style(
      'elegant_font',
      get_template_directory_uri().'/assets/fonts/flaticon/flaticon.css'
    );

  // Utilisation des icons 'elegant' dans l'administratrion
  // wp_enqueue_style(
  //   'elegant_font',
  //   get_template_directory_uri().'/assets/plugins/elegant_font/css/style.css'
  // );
});



/**
 * function to remove the dashboard widgets, but only for non-admin users
 * if you want to remove the widgets for admin(s) too,
 * remove the 'if' statement within the function
 */
// function remove_dashboard_widgets() {
// 	// if ( ! current_user_can( 'manage_options' ) ) {
// 		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
// 		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
// 		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
// 		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
// 		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
// 		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
// 		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
// 		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
// 	// }
// }
// add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
