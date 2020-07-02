<?php
/**
 * File about the creation of post-type "cartes"
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

 function cpt_cartes(){

   /**
    * définir les options du label
    * @var array
    */
   $labels = array(
     'name'                => __('Cartes', 'cartes'),
     'singular_name'       => __('Carte', 'cartes'),
     'menu_name'           => __('Carte', 'cartes'),
     'name_admin_bar'      => __('Carte', 'cartes'),
     'add_new'             => __('Ajouter', 'cartes'),
     'add_new_item'        => __('Ajouter une carte', 'cartes'),
     'new_item'            => __('Nouveau carte', 'cartes'),
     'edit_item'           => __('Editer une carte', 'cartes'),
     'view_item'           => __('Voir la carte', 'cartes'),
     'all_items'           => __('Toutes les cartes', 'cartes'),
     'search_items'        => __('Rechercher parmi les cartes', 'cartes'),
     'not_found'           => __('Pas de carte trouvées', 'cartes'),
     'not_fount_in_trash'  => __('Pas de carte dans la corbeille', 'cartes')
   );

   /**
    * définir les option de rewrite
    * @var array
    */
   $rewrite = array(
     'slug'          => 'cartes',
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
     //'thumbnail',        // image à la une
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
     'public'              => true,
     'hierarchical'        => false,
     'has_archive'         => true,
     'show_in_rest'        => true,             // editeur Gutemberg
     // 'show_in_rest'        => false,            // editeur Gutemberg
     'show_in_menu'        => true,
     'query_var'           => true,
     'menu_position'       => 4,
     'menu_icon'           => 'dashicons-images-alt',
     'capability_type'     => 'post',
     'rewrite'             => $rewrite,
     'supports'            => $supports,
   );

   register_post_type('cartes', $args);
 }
 add_action('init', 'cpt_cartes');
