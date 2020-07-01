<?php
/**
 * File about gestion of dispay of page 'custom-errorpage'
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

class tablebouddha_custom_errorpage{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   */
  const SUB6_TITLE      = 'Page erreur';
  const SUB6_MENU       = 'Page erreur';
  const PERMITION       = 'manage_options';
  const SUB6_GROUP      = 'custom_errorpage';
  const NONCE           = '_custom_errorpage';

  // definit les section
  const SECTION_THEME1  = 'section_theme1_errorpage';
  const SECTION_THEME2  = 'section_theme2_errorpage';


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
    add_submenu_page(
      tablebouddha_customtheme::GROUP,    // slug parent
      self::SUB6_TITLE,                   // page_title
      self::SUB6_MENU,                    // menu_title
      self::PERMITION,                    // capability
      self::SUB6_GROUP,                   // slug_menu
      [self::class, 'render']             // CALLBACK
    );
  }

  /**
   * 4 - TEMPLATE DES PAGES
   */
  public static function render(){
    ?>
    <div class="wrap">
      <h1 class="wp-heagin-inline">
        Gestion de la page d'erreur
      </h1>
      <p class="description">
        Sur cette page vous pouvez gérer l'affichage
        général de la page d'erreur
      </p>

      <form class="form-errorpage" action="options.php" method="post" enctype="multipart/form-data">
        <?php
          wp_nonce_field(self::NONCE, self::NONCE);
          settings_fields(self::SUB6_GROUP);
          do_settings_sections(self::SUB6_GROUP);
        ?>
        <?php submit_button(); ?>
      </form>
    <?php
  }

  /**
   * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
   */
  public static function registerSettings(){
    /* --- SECTION 1 : THEME1 ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB6_GROUP, 'chose_theme1');
    register_setting(self::SUB6_GROUP, 'type_error_theme1');
    register_setting(self::SUB6_GROUP, 'maintext_theme1');
    register_setting(self::SUB6_GROUP, 'message_theme1');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_THEME1,                                       // SLUG_SECTION
      '<h2 style="border-top: 1px solid #cecece;">Tempate 1</h2>',// TITLE
      [self::class, 'display_section_theme1_errorpage'],          // CALLBACK
      self::SUB6_GROUP
    ); // Section

    // ADD FIELD ---------------------------
    add_settings_field(
      'theme1_errorpage',                                // SLUG_FIELD
      'Gestion du template',                             // LABEL
      [self::class,'field_theme1_errorpage'],            // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME1
    ); // section 1

    add_settings_field(
      'theme1_type_errorpage',                           // SLUG_FIELD
      'Type d\'erreur',                                  // LABEL
      [self::class,'field_theme1_type_errorpage'],       // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME1
    ); // section 1

    add_settings_field(
      'theme1_maintext_errorpage',                       // SLUG_FIELD
      'Texte principal',                                 // LABEL
      [self::class,'field_theme1_maintext_errorpage'],   // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME1
    ); // section 1

    add_settings_field(
      'theme1_message_errorpage',                        // SLUG_FIELD
      'Message d\'erreur',                               // LABEL
      [self::class,'field_theme1_message_errorpage'],    // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME1
    ); // section 1


    /* --- SECTION 2 : THEME2 ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB6_GROUP, 'chose_theme2');
    register_setting(self::SUB6_GROUP, 'maintext_theme2');
    register_setting(self::SUB6_GROUP, 'subtext_theme2');
    register_setting(self::SUB6_GROUP, 'message_theme2');


    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_THEME2,                              // SLUG_SECTION
      '<h2 style="margin-top:3em; border-top: 1px solid #cecece;">Tempate 2</h2>', // TITLE
      [self::class, 'display_section_theme2_errorpage'], // CALLBACK
      self::SUB6_GROUP
    ); // Section

    // ADD FIELD ---------------------------
    add_settings_field(
      'theme2_errorpage',                                // SLUG_FIELD
      'Gestion du template',                             // LABEL
      [self::class,'field_theme2_errorpage'],            // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME2
    ); // section 2

    add_settings_field(
      'theme2_type_errorpage',                           // SLUG_FIELD
      'Type d\'erreur',                                  // LABEL
      [self::class,'field_theme2_type_errorpage'],       // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME2
    ); // section 2

    add_settings_field(
      'theme2_maintext_errorpage',                       // SLUG_FIELD
      'Texte principal',                                 // LABEL
      [self::class,'field_theme2_maintext_errorpage'],   // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME2
    ); // section 2

    add_settings_field(
      'theme2_subtext_errorpage',                       // SLUG_FIELD
      'Texte simple',                                 // LABEL
      [self::class,'field_theme2_subtext_errorpage'],   // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME2
    ); // section 2

    add_settings_field(
      'theme2_message_errorpage',                       // SLUG_FIELD
      'Message d\'erreur',                                 // LABEL
      [self::class,'field_theme2_message_errorpage'],   // CALLBACK
      self::SUB6_GROUP ,                                 // SLUG_PAGE
      self::SECTION_THEME2
    ); // section 2
  }


  /**
   * 6 - DEFINIR LES SECTIONS DE LA PAGE
   */
  /* ----- SECTION 1 : THEME_1 ----- */
   public static function display_section_theme1_errorpage(){
     ?>
      <p class="description">
        Section dédier à l'affichage du 1er template d'erreur
      </p>
      <p class="img-template-error">
        <img class="img-hero"
             src="<?php echo get_template_directory_uri().'/assets/img/template_error_1.png' ?>"
             alt=""
        />
      </p>
     <?php
   }

  /* ----- SECTION 2 : THEME_2 ----- */
  public static function display_section_theme2_errorpage(){
    ?>
      <p class="description">
        Section dédier à l'affichage du 1er template d'erreur
      </p>
      <p class="img-template-error">
        <img class="img-hero"
             src="<?php echo get_template_directory_uri().'/assets/img/template_error_2.png' ?>"
             alt=""
        />
      </p>
    <?php
  }

  /**
   * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
   */

  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  /* ----- SECTION 1 : THEME_1 ----- */
  public static function field_theme1_errorpage(){
    $chose_theme1 = esc_attr(get_option('chose_theme1'));
    ?>
      <p>
        <input type="checkbox"
               id="chose_theme1"
               name="chose_theme1"
               value="1"
               <?php checked(1, $chose_theme1, true) ?>
        />
        <span class="info">
          Choisir ce theme
        </span>
      </p>
    <?php
  }

  public static function field_theme1_type_errorpage(){
      //$type_error_theme1 = esc_attr(get_option('type_error_theme1'));
    ?>
      <p>
        <span class="info">
          Erreur 404
        </span>
      </p>
    <?php
  }

  public static function field_theme1_maintext_errorpage(){
      $maintext_theme1 = esc_attr(get_option('maintext_theme1'));
    ?>
      <p>
        <input type="text"
               id="maintext_theme1"
               name="maintext_theme1"
               value="<?php echo $maintext_theme1 ?>"
               class="large-text"
        />
      </p>
    <?php
  }

  public static function field_theme1_message_errorpage(){
      $message_theme1 = esc_attr(get_option('message_theme1'));
    ?>
      <p>
        <textarea
            name="message_theme1"
            id="message_theme1"
            class="large-text code"
        ><?php echo $message_theme1 ?>
        </textarea>
      </p>
    <?php
  }


  /* ----- SECTION 2 : THEME_2 ----- */
  public static function field_theme2_errorpage(){
    $chose_theme2 = esc_attr(get_option('chose_theme2'));
    ?>
      <p>
        <input type="checkbox"
               id="chose_theme2"
               name="chose_theme2"
               value="1"
               <?php checked(1, $chose_theme2, true) ?>
        />
        <span class="info">
          Choisir ce theme
        </span>
      </p>
    <?php
  }

  public static function field_theme2_type_errorpage(){
  ?>
    <p>
      <span class="info">
        Erreur 404
      </span>
    </p>
  <?php
  }

  public static function field_theme2_maintext_errorpage(){
      $maintext_theme2 = esc_attr(get_option('maintext_theme2'));
    ?>
      <p>
        <input type="text"
               id="maintext_theme2"
               name="maintext_theme2"
               value="<?php echo $maintext_theme2 ?>"
               class="large-text"
        />
      </p>
    <?php
  }

  public static function field_theme2_subtext_errorpage(){
      $subtext_theme2 = esc_attr(get_option('subtext_theme2'));
    ?>
      <p>
        <input type="text"
               id="subtext_theme2"
               name="subtext_theme2"
               value="<?php echo $subtext_theme2 ?>"
               class="large-text"
        />
      </p>
    <?php
  }


  public static function field_theme2_message_errorpage(){
      $message_theme2 = esc_attr(get_option('message_theme2'));
    ?>
      <p>
        <textarea
            name="message_theme2"
            id="message_theme2"
            class="large-text code"
        ><?php echo $message_theme2 ?>
        </textarea>
      </p>
    <?php
  }
}
