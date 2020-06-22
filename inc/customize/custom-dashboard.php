<?php
/**
 * File to manage the dashboard appearance
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

/**
 * *** INDEX ***
 *
 * 1 - Hides menus
 * 2 - Editor toolbar
 *
 */

/**
 * 1 - Hides menus
 * Function for hides certain page (element of menu) of dashboard
 */
function remove_menus(){
  // remove_menu_page('index.php');                  // Tableau de bord
  // remove_menu_page('edit.php');                   // Articles
  // remove_menu_page('upload.php');                 // Media
  // remove_menu_page('edit.php?post_type=page');    // Pages
  // remove_menu_page('edit-comments.php');          // Commentaires
  // remove_menu_page('themes.php');                 // Apparences
  // remove_menu_page('plugins.php');                // Extentions
  // remove_menu_page('users.php');                  // Utilisateurs
  // remove_menu_page('tools.php');                  // Outils
  // remove_menu_page('options-general.php');        // Réglages

  // remove_menu_page('edit.php?post_type=recettes'); // pour masque un custom_post_type
}

 add_action('admin_menu', 'remove_menus');


/**
 * 2 - Editor toolbar
 * Function for customize the editor toolbar of WordPress
 */
function custom_tinymce($tools){
  $tools['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,hr,alignjustify,link,unlink,removeformat,charmap,outdent,indent,undo,redo,wp_fullcreen';

  $tools['block_formats'] = 'Paragraph=p;Heading 1=h2;Heading 2=h3;Heading 3=h4;Heading 4=h5;Heading 5=h6;Heading 6=h6;';
  return $tools;
}

add_filter('tiny_mce_before_init', 'custom_tinymce');
