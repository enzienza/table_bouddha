<?php
/**
 * File about the creation of post-type "boissons"
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

 function cpt_boissons(){

   /**
    * définir les options du label
    * @var array
    */
   $labels = array(
     'name'                => __('Boissons', 'boissons'),
     'singular_name'        => __('Boisson', 'boissons'),
     'menu_name'           => __('Boisson', 'boissons'),
     'name_admin_bar'      => __('Boisson', 'boissons'),
     'add_new'             => __('Ajouter', 'boissons'),
     'add_new_item'        => __('Ajouter une boisson', 'boissons'),
     'new_item'            => __('Nouveau boisson', 'boissons'),
     'edit_item'           => __('Editer une boisson', 'boissons'),
     'view_item'           => __('Voir la boisson', 'boissons'),
     'all_items'           => __('Toutes les boissons', 'boissons'),
     'search_items'        => __('Rechercher parmi les boissons', 'boissons'),
     'not_found'           => __('Pas de boisson trouvées', 'boissons'),
     'not_fount_in_trash'  => __('Pas de boisson dans la corbeille', 'boissons')
   );

   /**
    * définir les option de rewrite
    * @var array
    */
   $rewrite = array(
     'slug'          => 'boissons',
     // 'with_front'    => true,
 	  // 'hierarchical'  => false,
   );

   /**
    * définir les option de supports
    * @var array
    */
   $supports = array(
     'title',           // titre
     'editor',          // editeur
     'thumbnail',       // image à la une
     // 'author',       // auteur du post
     // 'excerpt',      // extrait
     // 'comments'      // commentaires autorisé
   );

   /**
    * définir les arguments du custom post type
    * @var array
    */
   $args = array(
     'labels'              => $labels,
     'public'              => true,
     'hierarchical'        => false,
     'has_archive'         => true,
     'show_in_rest'        => true,
     'show_in_menu'        => true,
     'query_var'           => true,
     'menu_position'       => 5,
     'menu_icon'           => 'dashicons-tickets-alt',
     'capability_type'     => 'post',
     'rewrite'             => $rewrite,
     'supports'            => $supports,
   );

   register_post_type('boissons', $args);
 }
 add_action('init', 'cpt_boissons');
