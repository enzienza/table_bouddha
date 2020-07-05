<?php
/**
 * [description]
 *
 * @package WordPress
 * @subpackage domainname
 * @since 1.0
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

class MB_view_section{
  /**
   *1 - DEFINIR LES VALEURS (repeter)
   */
   const META_KEY = 'view_section';
   const NONCE    = '_view_section';
   const TITLE_MB = 'Section réservation';
   const SCREEN   = array('evenements');

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
    if (current_user_can('publish_posts', $POST)){
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
      $value = get_post_meta($POST->ID, self::META_KEY, true);
    ?>
    <div class="components-base-control__field">
         <input type="hidden"
                name="<?php echo self::META_KEY; ?>"
                value="0"
         />
         <input class="inspector-checkbox-control-0"
                type="checkbox"
                name="<?php echo self::META_KEY; ?>"
                <?php echo checked($value, '1'); ?>
         />
         <label class="components-checkbox-control__label" for="montheme_sponsorise">
            Ajouter la section réservation
         </label>
      </div>
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
      if($_POST[self::META_KEY] === '0'){
        delete_post_meta($POST_ID, self::META_KEY);
      } else {
        update_post_meta($POST_ID,self::META_KEY, 1);
      }
    }
  }
}
