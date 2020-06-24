<?php
/**
 * File about gestion on restaurant generality
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */

/**
 * --- INDEX ---
 *
 * 1 - DEFINIR LES ELEMENTS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA PAGE
 * 4 - TEMPLATE DES PAGES
 * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
 * 6 - DEFINIR LES SECTIONS DE LA PAGE
 * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
 * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
 */


class tablebouddha_generality{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   * afin d'evite les fautes de frappe
   */
   // page info - level 1
   const INFO_TITLE = 'Généralité';
   const INFO_MENU  = 'Table Bouddha';
   const PERMITION  = 'manage_options';
   const DASHICON   = 'dashicons-admin-generic';
   const GROUP      = 'generality_tablebouddha';


   // definit les section
   const SECTION_IMG    = 'section_image_tablebouddha';
   const SECTION_INFO   = 'section_info_tablebouddha';
   const SECTION_url    = 'section_url_tablebouddha';

  /**
   * 2 - DEFINIR LES HOOKS ACTIONS
   */
   public static function register(){
     add_action('admin_menu', [self::class, 'addMenu']);
     add_action('admin_init', [self::class, 'registerSettings']);
   }

  /**
   * 3 - CONSTRUCTION DE LA PAGE
   */
   public static function addMenu(){
     add_menu_page(
       self::INFO_TITLE,                   // TITLE_PAGE
       self::INFO_MENU,                    // TITLE_MENU
       self::PERMITION,                    // CAPABILITY
       self::GROUP,                        // SLUG_PAGE
       [self::class, 'render'],            // CALLBACK
       self::DASHICON,                     // icon
       2                                   // POSITION
     );
   }

  /**
   * 4 - TEMPLATE DES PAGES
   */
  public static function render(){
    ?>
      <div class="wrap">
        <h1 class="wp-heagin-inline">Table Bouddha</h1>
        <p class="description">
          Sur cette page vous pouvez gérer les informations générales du thème
        </p>
      </div>
      <form class="form-generality" action="options.php" method="post" enctype="multipart/form-data">
        <?php settings_fields(self::GROUP); ?>
        <?php do_settings_sections(self::GROUP); ?>
        <?php submit_button(); ?>
      </form>
    <?php
  }


  /**
   * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
   */
  public static function registerSettings(){
    // SAVE SETTING -------
    register_setting(self::GROUP,'img_logo', [self::class, 'handle_file_logo']);
    //register_setting(self::GROUP,'img_hero', [self::class, 'handle_file_hero']);
    register_setting(self::GROUP, 'adresse');
    register_setting(self::GROUP, 'phone');

    register_setting(self::GROUP, 'yes_facebook');
    register_setting(self::GROUP, 'url_facebook');

    register_setting(self::GROUP, 'yes_instagram');
    register_setting(self::GROUP, 'url_instagram');

    register_setting(self::GROUP, 'yes_twitter');
    register_setting(self::GROUP, 'url_twitter');

    // ADD SECTION --------
    add_settings_section(
      self::SECTION_IMG,                       // SLUG_SECTION
      'Les médias',                            // TITLE
      [self::class, 'display_section_image'],  // CALLBACK
      self::GROUP
    ); // Section 1

    add_settings_section(
      self::SECTION_INFO,                       // SLUG_SECTION
      'Les informations de contact',            // TITLE
      [self::class, 'display_section_info'],    // CALLBACK
      self::GROUP
    ); // Section 2

    add_settings_section(
      self::SECTION_url,                       // SLUG_SECTION
      'Les réseaux sociaux',                      // TITLE
      [self::class, 'display_section_url'],    // CALLBACK
      self::GROUP
    ); // Section 3

    // ADD FIELD ----------
    add_settings_field(
      'logo_tablebouddha',                        // SLUG_FIELD
      'Image du logo',                            // LABEL
      [self::class,'field_logo_tablebouddha'],    // CALLBACK
      self::GROUP ,                               // SLUG_PAGE
      self::SECTION_IMG
    );

    // add_settings_field(
    //   'hero_tablebouddha',                         // SLUG_FIELD
    //   'Image de couverture',                        // LABEL
    //   [self::class,'field_hero_tablebouddha'],      // CALLBACK
    //   self::GROUP ,                                 // SLUG_PAGE
    //   self::SECTION_IMG
    // );

    add_settings_field(
      'location_tablebouddha',                       // SLUG_FIELD
      'Adresse complète',                            // LABEL
      [self::class,'field_location_tablebouddha'],   // CALLBACK
      self::GROUP ,                                  // SLUG_PAGE
      self::SECTION_INFO
    );

    add_settings_field(
      'phone_tablebouddha',                         // SLUG_FIELD
      'Tépéhone',                                   // LABEL
      [self::class,'field_phone_tablebouddha'],     // CALLBACK
      self::GROUP ,                                 // SLUG_PAGE
      self::SECTION_INFO
    );

    add_settings_field(
      'facebook_tablebouddha',                         // SLUG_FIELD
      'Facebook (url)',                                // LABEL
      [self::class,'field_facebook_tablebouddha'],     // CALLBACK
      self::GROUP ,                                    // SLUG_PAGE
      self::SECTION_url
    );

    add_settings_field(
      'instagram_tablebouddha',                         // SLUG_FIELD
      'Instagram (url)',                                // LABEL
      [self::class,'field_instagram_tablebouddha'],     // CALLBACK
      self::GROUP ,                                     // SLUG_PAGE
      self::SECTION_url
    );

    add_settings_field(
      'twitter',                         // SLUG_FIELD
      'Twitter (url)',                                // LABEL
      [self::class,'field_twitter_tablebouddha'],     // CALLBACK
      self::GROUP ,                                     // SLUG_PAGE
      self::SECTION_url
    );
  }

  /**
   * 6 - DEFINIR LES SECTIONS DE LA PAGE
   */
   public static function display_section_image(){
     ?>
       <p class="description">
         Section dédiée aux médias
       </p>
     <?php
   }

  public static function display_section_info(){
    ?>
      <p class="description">
        Section dédiée aux inforamations de contact
      </p>
    <?php
  }

  public static function display_section_url(){
    ?>
      <p class="description">
        Section dédiée aux réseaux sociaux
      </p>
    <?php
  }

  /**
   * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
   *     le fichier sera stocké dans le dossier upload
   */
  public static function handle_file_logo(){
    if(!empty($_FILES['img_logo']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['img_logo'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['img_logo']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('img_logo');
  }

  // public static function handle_file_hero(){
  //   if(!empty($_FILES['img_hero']['tmp_name'])){
  //     $urls = wp_handle_upload($_FILES['img_hero'], array('test_form' => FALSE));
  //     $temp = $urls['url'];
  //     return $temp;
  //   } // end -> if(!empty($_FILES['img_hero']['tmp_name']))
  //
  //   //no upload. old file url is the new value.
  //   return get_option('img_hero');
  // }


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  public static function field_logo_tablebouddha(){
    ?>
      <img src="<?php echo get_option('img_logo'); ?>" class="img-logo" alt="" />
      <input type="file" id="img_logo" name="img_logo" value="<?php echo get_option('img_logo'); ?>">
    <?php
  }

  public static function field_hero_tablebouddha(){
    ?>
      <!-- <img src="<?php //echo get_option('img_hero'); ?>" class="img-hero" alt="" /><br /> -->
      <!-- <input type="file" id="img_hero" name="img_hero" value="<?php //echo get_option('img_hero'); ?>"> -->
    <?php
  }

  public static function field_location_tablebouddha(){
     $adresse = esc_attr(get_option('adresse'));
    ?>
      <input type="text" id="adresse" name="adresse" value="<?php echo $adresse ?>" class="regular-text" />
    <?php
  }

  public static function field_phone_tablebouddha(){
     $phone = esc_attr(get_option('phone'));
    ?>
      <input type="text" id="phone" name="phone" value="<?php echo $phone ?>" class="regular-text" />
    <?php
  }

  public static function field_facebook_tablebouddha(){
     $yes_facebook = esc_attr(get_option('yes_facebook'));
     $url_facebook = esc_attr(get_option('url_facebook'));
    ?>
      <input type="checkbox"
             id="yes_facebook"
             name="yes_facebook"
             value="1"
             <?php checked(1, $yes_facebook, true); ?>

      >
      <input type="text"
             id="url_facebook"
             name="url_facebook"
             value="<?php echo $url_facebook ?>"
             class="regular-text"
      />
    <?php
  }

  public static function field_instagram_tablebouddha(){
     $yes_instagram = esc_attr(get_option('yes_instagram'));
     $url_instagram = esc_attr(get_option('url_instagram'));
    ?>
      <input type="checkbox"
             id="yes_instagram"
             name="yes_instagram"
             value="1"
             <?php checked(1, $yes_instagram, true); ?>
      />
      <input type="text"
             id="url_instagram"
             name="url_instagram"
             value="<?php echo $url_instagram ?>"
             class="regular-text"
      />
    <?php
  }

  public static function field_twitter_tablebouddha(){
      $yes_twitter = esc_attr(get_option('yes_twitter'));
      $url_twitter = esc_attr(get_option('url_twitter'));
    ?>
      <input type="checkbox"
             id="yes_twitter"
             name="yes_twitter"
             value="1"
             <?php checked(1, $yes_twitter, true); ?>
      />
      <input type="text"
             id="url_twitter"
             name="url_twitter"
             value="<?php echo $url_twitter ?>"
             class="regular-text"
      />
    <?php
  }

}
