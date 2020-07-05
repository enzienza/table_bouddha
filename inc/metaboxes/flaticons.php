<?php
/**
 * file who adds a metabox to use flaticons class
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

/**
 * --- INDEX ---
 *
 * 1 - DEFINIR LES VALEURS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA METABOX
 * 4 - DEFENIR LA METABOX (template & champs)
 * 5 - SAUVEGARDER LES DONNEES DE LA METABOX
 */

class MB_use_faticons{
  /**
   *1 - DEFINIR LES VALEURS (repeter)
   */
   const META_KEY = 'icon_flaticon';
   const NONCE    = '_icon_flaticon';
   const TITLE_MB = 'Flaticon';
   const SCREEN = array('cartes', 'boissons', 'emporters');

  // define('CREEN',['carte']);


  /**
   *2 - DEFINIR LES HOOKS ACTIONS
   */
  public static function register(){
    add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
    add_action('save_post', [self::class, 'save']);
  }

  /**
   *3 - CONSTRUCTION DE LA METABOX
   */
  public static function add($postType, $POST){
    if (
       // $postType === self::SCREEN &&
       current_user_can('publish_posts', $POST)
     )
       {
        add_meta_box(
          self::META_KEY,             // ID_META_BOX
          self::TITLE_MB,             // TITLE_META_BOX
          [self::class, 'render'],    // CALLBACK
          self::SCREEN,               // WP_SCREEN
          'side',                     // CONTEXT [ normal | advanced | side ]
          'high'                      // PRIORITY [ high | default | low ]
        );
      }
  }

  /**
   *4 - DEFENIR LA METABOX (template & champs)
   */
  public static function render($POST){
      wp_nonce_field(self::NONCE, self::NONCE);
      $chose_icon = get_post_meta($POST->ID, self::META_KEY, true);
    ?>
    <div class="components-base-control__field">
      <p>
        <a href="<?php echo get_template_directory_uri().'/assets/fonts/flaticon/flaticon.html' ?>"
           target="_blank"
        >
          Voir la liste des icons
        </a>
      </p>
      <label for="<?php echo self::META_KEY ?>">
        Ajouter la class
      </label>
      <input class="widefat"
             style="margin:.6em 0;"
             type="text"
             name="<?php echo self::META_KEY ?>"
             value="<?php echo $chose_icon ?>"
      />
    <?php
  }

  /**
   *5 - SAUVEGARDER LES DONNEES DE LA METABOX
   */
  public static function save($POST_ID){
    if(
      array_key_exists(self::META_KEY, $_POST)
      && current_user_can('publish_posts', $POST_ID)
      && wp_verify_nonce($_POST[self::NONCE], self::NONCE)
    ){
      if(isset($_POST[self::META_KEY])){
        update_post_meta(
          $POST_ID,
          self::META_KEY,
          $_POST[self::META_KEY]
        );
      }
    }
  }
}
