<?php
/**
 * file who adds a metabox to ...
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

class MB_test_dynamique{
  /**
   *1 - DEFINIR LES VALEURS (repeter)
   */
   const META_KEY = 'test';
   const NONCE    = '_test';
   const TITLE_MB = 'Test';
   // const SCREEN   = array('cartes', 'post', 'boissons', 'emporters');
   const SCREEN   = array('cartes');


  // const NUMB = '';
  // const = '';
  // const = '';


  // define('CREEN',['carte']);


  /**
   *2 - DEFINIR LES HOOKS ACTIONS
   */
  public static function register(){
    add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
    add_action('save_post', [self::class, 'save']);
    add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
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
          'advanced',                // CONTEXT [ normal | side | advanced ]
          'high'                      // PRIORITY [ default | low | high | core ]
        );
      }
  }

  /**
   *4 - DEFENIR LA METABOX (template & champs)
   */
  public static function render($POST){
      // wp_nonce_field(self::NONCE, self::NONCE);
      // $repeat_items = get_post_meta($POST->ID, self::META_KEY, true);
      $repeat_items = get_post_meta($POST->ID, 'repeat_items', true);
      wp_nonce_field( 'MB_repeat_emporter_nonce', 'MB_repeat_emporter_nonce' );

    ?>
    <div class="components-base-control__field">

      <table id="table-repeatable-fieldset" width="100%">
    		<thead>
    			<tr>
    				<th width="5%"></th>
    				<th width="15%">Numéro</th>
    				<th width="60%">Nom</th>
    				<th width="15%">Prix</th>
    			</tr>
    		</thead>
    		<tbody>

          <!-- <?php //echo self::META_KEY ?> value="<?php //echo $chose_icon ?>" -->
          <?php if($repeat_items) : foreach ( $repeat_items as $field ) { ?>
            <tr>
  						<td>
                <a class="button remove-row" href="#">x</a>
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="numb[]"
                       value="<?php if($field['numb'] != '') echo esc_attr( $field['numb'] ); ?>"
                />
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="name[]"
                       value="<?php if ($field['name'] != '') echo esc_attr( $field['name'] );  ?>"
                />
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="price[]"
                       value="<?php if ($field['price'] != '') echo esc_attr( $field['price'] );  ?>"
                />
              </td>

  					</tr>
          <?php } else : ?>
            <tr>
  						<td>
                <a class="button remove-row" href="#">x</a>
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="numb[]"
                />
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="name[]" value=""
                />
              </td>
  						<td>
                <input type="text"
                       class="widefat"
                       name="price[]" value=""
                />
              </td>
  					</tr>
          <?php endif; ?>

          <!-- empty hidden one for jQuery -->
  				<tr class="empty-row screen-reader-text">
            <td>
              <a class="button remove-row" href="#">x</a>
            </td>
            <td>
              <input type="text"
                     class="widefat"
                     name="numb[]"
              />
            </td>
            <td>
              <input type="text"
                     class="widefat"
                     name="name[]" value=""
              />
            </td>
            <td>
              <input type="text"
                     class="widefat"
                     name="price[]" value=""
              />
            </td>
  				</tr><!-- / .empty-row .screen-reader-text-->

        </tbody>
      </table>

      <!-- START : bouton -->
    	<p>
    		<a id="add-row" class="button add-row button-large" href="#">Ajouter</a>
    		<input type="submit" class="button btn-save button-large" value="Sauvegarder" />
    	</p><!-- / bouton -->

    </div>
    <?php
  }

  /**
   * 5 - SAUVEGARDER LES DONNEES DE LA METABOX
   */
  public static function save($POST_ID){
    // if(
    //   array_key_exists(self::META_KEY, $_POST)
    //   && current_user_can('publish_posts', $POST_ID)
    //   && wp_verify_nonce($_POST[self::NONCE], self::NONCE)
    // ){
    //   if(isset($_POST[self::META_KEY])){
    //     update_post_meta(
    //       $POST_ID,
    //       self::META_KEY,
    //       $_POST[self::META_KEY]
    //     );
    //   }
    // }

    // Check if our nonce is set.
  	if ( ! isset( $_POST['MB_repeat_emporter_nonce'] ) )
  		return $POST_ID;

  	$nonce = $_POST['MB_repeat_emporter_nonce'];

  	// Verify that the nonce is valid.
  	if ( !wp_verify_nonce( $nonce, 'MB_repeat_emporter_nonce' ) )
  		return $POST_ID;

  	// Check the user's permissions.
  	if(!current_user_can('edit_post', $POST_ID))
  		return $POST_ID;

      $count = count( $numbs );

    	for($i = 0; $i < $count; $i++) {
    		if($numbs[$i] != '') :
    			$new[$i]['numb'] = stripslashes( strip_tags( $numbs[$i]));

    		if($names[$i] == '')
    			$new[$i]['name'] = '';
    		else
    			$new[$i]['name'] = stripslashes( $names[$i]); // and however you want to sanitize

    		if($prices[$i] == '')
    			$new[$i]['price'] = '';
    		else
    				$new[$i]['price'] = stripslashes( $prices[$i]); // and however you want to sanitize
    		endif;
    	}

    	if(!empty($new) && $new != $old)
    		update_post_meta($POST_ID, 'repeat_items', $new);
    	elseif(empty($new) && $old)
    		delete_post_meta( $POST_ID, 'repeat_items', $old);


  }


  /**
   * 6 - UTILISATION DU SCRIPT
   */
  public static function registerScripts () {
    wp_enqueue_script(
      'test',
      get_template_directory_uri().'/assets/js/test.js',
      [],
      false,
      true
    );
  }
}
