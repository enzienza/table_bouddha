<?php
/**
 * File about the creation of post-type "evenements"
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

 function cpt_evenements(){

   /**
    * définir les options du label
    * @var array
    */
   $labels = array(
     'name'                => __('Evenements', 'evenements'),
     'singular_name'       => __('Evenement', 'evenements'),
     'menu_name'           => __('Evenement', 'evenements'),
     'name_admin_bar'      => __('Evenement', 'evenements'),
     'add_new'             => __('Ajouter', 'evenements'),
     'add_new_item'        => __('Ajouter une evenement', 'evenements'),
     'new_item'            => __('Nouveau evenement', 'evenements'),
     'edit_item'           => __('Editer une evenement', 'evenements'),
     'view_item'           => __('Voir l\'evenement', 'evenements'),
     'all_items'           => __('Toutes les evenements', 'evenements'),
     'search_items'        => __('Rechercher parmi les evenements', 'evenements'),
     'not_found'           => __('Pas d\'evenement trouvées', 'evenements'),
     'not_fount_in_trash'  => __('Pas d\'evenement dans la corbeille', 'evenements')
   );

   /**
    * définir les option de rewrite
    * @var array
    */
   $rewrite = array(
     'slug'          => 'evenements',
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
     'thumbnail',        // image à la une
     // 'author',          // auteur du post
     // 'excerpt',         // extrait
     // 'comments'         // commentaires autorisé
   );

   /**
    * définir les arguments du custom post type
    * @var array
    */
   $args = array(
     'labels'              => $labels,
     'rewrite'             => $rewrite,
     'supports'            => $supports,
     'public'              => true,
     'hierarchical'        => false,
     'has_archive'         => true,
     'show_in_rest'        => true,
     'show_in_menu'        => true,
     'query_var'           => true,
     'capability_type'     => 'post',
     'menu_position'       => 7,
     'menu_icon'           => 'dashicons-megaphone',
   );

   register_post_type('evenements', $args);
 }
 add_action('init', 'cpt_evenements');
