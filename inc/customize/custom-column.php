<?php
/**
 * File for customize the administration
 * columns of Custom Post-Types
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

/**
 *  ----- INDEX -----
 *
 * 1 - ADMIN POST-TYPE : CARTES
 * 2 - ADMIN POST-TYPE : BOISSONS
 * 3 - ADMIN POST-TYPE : EMPORTERS
 */

/**
 * 1 - ADMIN POST-TYPE : CARTES
 */
 /* Etape 1 : ajouter les colonnes */
  add_filter(
    'manage_cartes_posts_columns',
    function($columns){
      // var_dump($columns);
      return[
        'cb'    => '<input type="checkbox" />',
        'icon'  => 'Icône',
        'title' => $columns['title'],
        'date'  => $columns['date']
      ];
    }
  );

 /* Etape 2 : afficher le contenu souhaiter */
 add_filter(
   'manage_cartes_posts_custom_column',
   function($column, $postId){
     if ($column === 'icon'){
       if(!empty(get_post_meta($postId, MB_use_faticons::META_KEY, true))){
         ?>
          <p>
            <i class="icon <?php echo get_post_meta(get_the_ID(), MB_use_faticons::META_KEY, true); ?>">
            </i>
          </p>
         <?php
       } else {
         echo "";
       }
     }
   },
   10,
   2
 );


/**
 * 2 - ADMIN POST-TYPE : BOISSONS
 */
 /* Etape 1 : ajouter les colonnes */
  add_filter(
    'manage_boissons_posts_columns',
    function($columns){
      // var_dump($columns);
      return[
        'cb'    => '<input type="checkbox" />',
        'icon'  => 'Icône',
        'title' => $columns['title'],
        'date'  => $columns['date']
      ];
    }
  );

 /* Etape 2 : afficher le contenu souhaiter */
 add_filter(
   'manage_boissons_posts_custom_column',
   function($column, $postId){
     if ($column === 'icon'){
       if(!empty(get_post_meta($postId, MB_use_faticons::META_KEY, true))){
         ?>
          <p>
            <i class="icon <?php echo get_post_meta(get_the_ID(), MB_use_faticons::META_KEY, true); ?>">
            </i>
          </p>
         <?php
       } else {
         echo "";
       }
     }
   },
   10,
   2
 );


/**
 * 3 - ADMIN POST-TYPE : EMPORTERS
 */
 /* Etape 1 : ajouter les colonnes */
  add_filter(
    'manage_emporters_posts_columns',
    function($columns){
      // var_dump($columns);
      return[
        'cb'    => '<input type="checkbox" />',
        'icon'  => 'Icône',
        'title' => $columns['title'],
        'date'  => $columns['date']
      ];
    }
  );

 /* Etape 2 : afficher le contenu souhaiter */
 add_filter(
   'manage_emporters_posts_custom_column',
   function($column, $postId){
     if ($column === 'icon'){
       if(!empty(get_post_meta($postId, MB_use_faticons::META_KEY, true))){
         ?>
          <p>
            <i class="icon <?php echo get_post_meta(get_the_ID(), MB_use_faticons::META_KEY, true); ?>">
            </i>
          </p>
         <?php
       } else {
         echo "";
       }
     }
   },
   10,
   2
 );
