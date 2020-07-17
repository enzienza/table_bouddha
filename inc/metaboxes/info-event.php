<?php
/**
 * file who adds a metabox to adding the date and heure of event
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

class MB_info_event{
  /**
   *1 - DEFINIR LES VALEURS (repeter)
   */
  // const META_KEY = 'info_event';
  const NONCE    = '_info_event';
  const TITLE_MB = 'Information';
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
    if(current_user_can('publish_posts', $POST)){
      add_meta_box(
        'MB_info_event',             // ID_META_BOX
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
      $date_event = get_post_meta($POST->ID, 'date_event', true);
      $heure_event = get_post_meta($POST->ID, 'heure_event', true);
    ?>
      <div class="components-base-control__field">
        <p>
            <label for="date_event">Date</label>
            <input type="date"
                   id="date_event"
                   name="date_event"
                   value="<?php echo $date_event; ?>"
            />
        </p>
        <p>
            <label for="heure_event">Heure</label>
            <input type="time"
                   id="heure_event"
                   name="heure_event"
                   value="<?php echo $heure_event; ?>"
            />
        </p>
      </div>
    <?php
  }

  /**
   *5 - SAUVEGARDER LES DONNEES DE LA METABOX
   */
  public static function save($POST_ID){
    if(
      // array_key_exists(self::META_KEY, $_POST) &&
      current_user_can('publish_posts', $POST_ID)
      // && wp_verify_nonce($_POST[self::NONCE], self::NONCE)
    ){
      if(isset($_POST['date_event'])){
        update_post_meta(
          $POST_ID,
          'date_event',
          $_POST['date_event']
        );
      }
      if(isset($_POST['heure_event'])){
        update_post_meta(
          $POST_ID,
          'heure_event',
          esc_html($_POST['heure_event'])
        );
      }
    }
  }
}
