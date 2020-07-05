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
 * 4 - ADMIN POST-TYPE : EVENT
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


 /**
  * 4 - ADMIN POST-TYPE : EVENT
  */
  /* Etape 1 : ajouter les colonnes */
   add_filter(
     'manage_evenements_posts_columns',
     function($columns){
       // var_dump($columns);
       return[
         'cb'          => '<input type="checkbox" />',
         'title'       => $columns['title'],
         'date_event'  => 'Date de l\'événement',
         'heure_event' => 'Heure de l\'événement',
         'date'        => $columns['date']
       ];
     }
   );

  /* Etape 2 : afficher le contenu souhaiter */
  add_filter(
    'manage_evenements_posts_custom_column',
    function($column, $postId){
      if($column === 'date_event'){
        if(!empty(get_post_meta($postId, 'date_event',true))){ ?>
          <p>
            <?php
              $date = get_post_meta(get_the_ID(), 'date_event', true);
              if($date != ''){echo date_i18n("j M Y", strtotime($date));}
            ?>
          </p>
        <?php } else { ?>
        <?php }
      }

      if($column === 'heure_event'){
        if(!empty(get_post_meta($postId, 'heure_event',true))){ ?>
          <p>
            <?php echo get_post_meta(get_the_ID(), 'heure_event', true); ?>
          </p>
        <?php } else { ?>
        <?php }
      }
    },
    10,
    2
  );
