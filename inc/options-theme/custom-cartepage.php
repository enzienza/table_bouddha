<?php
/**
 * File about gestion of dispay of page 'custom-cartepage'
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



class tablebouddha_custom_cartepage{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   */
  const SUB2_TITLE   = 'Page cartes';
  const SUB2_MENU    = 'Page cartes';
  const PERMITION    = 'manage_options';
  const SUB2_GROUP   = 'custom_cartepage';
  const NONCE        = '_custom_cartepage';

  // definit les section
  const SECTION_HERO    = 'section_hero_cartepage';
  const SECTION_INFO    = 'section_info_cartepage';
  const SECTION_BOOKING = 'section_booking_cartepage';



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
      tablebouddha_customtheme::GROUP,     // slug parent
      self::SUB2_TITLE,                    // page_title
      self::SUB2_MENU,                     // menu_title
      self::PERMITION,                     // capability
      self::SUB2_GROUP,                    // slug_menu
      [self::class, 'render']              // CALLBACK
    );
  }

  /**
   * 4 - TEMPLATE DES PAGES
   */
  public static function render(){
    ?>
      <div class="wrap">
        <h1 class="wp-heagin-inline">
          Gestion de la page des cartes
        </h1>
        <p class="description">
         Sur cette page vous pouvez gérer l'affichage
         général de la page des cartes
        </p>
      </div>

      <form class="" action="options.php" method="post" enctype="multipart/form-data">
        <?php
          wp_nonce_field(self::NONCE, self::NONCE);
          settings_fields(self::SUB2_GROUP);
          do_settings_sections(self::SUB2_GROUP);
        ?>
        <?php submit_button(); ?>
      </form>
    <?php
  }

  /**
   * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
   */
  public static function registerSettings(){
    /* --- SECTION 1 : HERO ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB2_GROUP, 'yes_hero_cartepage');
    register_setting(
      self::SUB2_GROUP,
      'add_hero_cartepage',
      [self::class, 'handle_file_hero_cartepage']
    );
    register_setting(self::SUB2_GROUP, 'view_logo_cartepage');
    register_setting(self::SUB2_GROUP, 'view_namesite_cartepage');
    register_setting(self::SUB2_GROUP, 'yex_message_cartepage');
    register_setting(self::SUB2_GROUP, 'title_hero_cartepage');
    register_setting(self::SUB2_GROUP, 'text_hero_cartepage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_HERO,                      // SLUG_SECTION
      'Section Hero',                          // TITLE
      [self::class, 'display_section_hero'],   // CALLBACK
      self::SUB2_GROUP
    ); // Section_1

    // ADD FIELD ---------------------------
    add_settings_field(
      'hero_cartepage',                             // SLUG_FIELD
      'Image d\'arrière plan',                      // LABEL
      [self::class,'field_hero_cartepage'],         // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'element_cartepage',                          // SLUG_FIELD
      'Ce qui doit être présent',                   // LABEL
      [self::class,'field_element_cartepage'],      // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'message_hero_cartepage',                     // SLUG_FIELD
      'Gestion d\'un message',                   // LABEL
      [self::class,'field_message_hero_cartepage'], // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    /* --- SECTION 2 : INFO ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB2_GROUP, 'hidden_info_cartepage');
    register_setting(self::SUB2_GROUP, 'title_info_cartepage');
    register_setting(self::SUB2_GROUP, 'text_info_cartepage');
    register_setting(
      self::SUB2_GROUP,
      'image_info_cartepage',
      [self::class, 'handle_file_info_cartepage']
    );

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_INFO,                           // SLUG_SECTION
      'Section info',                               // TITLE
      [self::class, 'display_section_description'], // CALLBACK
      self::SUB2_GROUP
    ); // Section_2

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_info_cartepage',                      // SLUG_FIELD
      'Cacher la section',                          // LABEL
      [self::class,'field_hidden_info_cartepage'],  // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'title_cartepage',                            // SLUG_FIELD
      'Ajouter un titre',                           // LABEL
      [self::class,'field_title_cartepage'],        // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'description_cartepage',                      // SLUG_FIELD
      'Ajouter une description',                    // LABEL
      [self::class,'field_description_cartepage'],  // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'image_cartepage',                            // SLUG_FIELD
      'Ajouter une image',                          // LABEL
      [self::class,'field_image_cartepage'],        // CALLBACK
      self::SUB2_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    /* --- SECTION 3 : BOOKING --------------- */
    // SAVE SETTING ------------------------
    register_setting(self::SUB2_GROUP, 'hidden_booking_cartepage');
    register_setting(self::SUB2_GROUP, 'view_icon_cartepage');
    register_setting(self::SUB2_GROUP, 'view_phone_cartepage');
    register_setting(self::SUB2_GROUP, 'texte_booking_cartepage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_BOOKING,                      // SLUG_SECTION
      'Section réservation',                      // TITLE
      [self::class, 'display_section_booking'],   // CALLBACK
      self::SUB2_GROUP
    ); // Section_3

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_booking_cartepage',                     // SLUG_FIELD
      'Cacher la section',                            // LABEL
      [self::class,'field_hidden_booking_cartepage'], // CALLBACK
      self::SUB2_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'element_booking_cartepage',                     // SLUG_FIELD
      'Ce qui doit être présent',                            // LABEL
      [self::class,'field_element_booking_cartepage'], // CALLBACK
      self::SUB2_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'texte_booking_cartepage',                     // SLUG_FIELD
      'Gestion du texte',                            // LABEL
      [self::class,'field_texte_booking_cartepage'], // CALLBACK
      self::SUB2_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3
  }


  /**
   * 6 - DEFINIR LES SECTIONS DE LA PAGE
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function display_section_hero(){
    ?>
      <p class="description">
        Section dédier à l'affichage
        du slide de la page des cartes
      </p>
    <?php
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function display_section_description(){
    ?>
      <p class="description">
        Section dédier à l'affichage
        d'une descriptionde la page des cartes
      </p>
    <?php
  }

  /* ----- SECTION 3 : BOOKING ----- */
  public static function display_section_booking(){
    ?>
      <p class="description">
        Section dédier à l'affichagade
        des infos de réservation
      </p>
    <?php
  }


  /**
   * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function handle_file_hero_cartepage($options){
    if(!empty($_FILES['add_hero_cartepage']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['add_hero_cartepage'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['add_hero_cartepage']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('add_hero_cartepage');
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function handle_file_info_cartepage($options){
    if(!empty($_FILES['image_info_cartepage']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['image_info_cartepage'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['image_info_cartepage']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('image_info_cartepage');
  }

  /* ----- SECTION 3 : BOOKING ----- */


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function field_hero_cartepage(){
    $yes_hero_cartepage = esc_attr(get_option('yes_hero_cartepage'));
    $add_hero_cartepage = esc_attr(get_option('add_hero_cartepage'));
    ?>
      <p>
        <input type="checkbox"
                id="yes_hero_cartepage"
                name="yes_hero_cartepage"
                value="1"
                <?php checked(1, $yes_hero_cartepage, true) ?>
        />
        <span class="info">
          Ajouter l'image comme d'arrière plan
        </span>
      </p>
      <p class="height-space">
        <input type="file"
               id="add_hero_cartepage"
               name="add_hero_cartepage"
               value="<?php echo get_option('add_hero_cartepage'); ?>"
        />
      </p>
      <p>
        <img src="<?php echo get_option('add_hero_cartepage'); ?>"
             class="img-hero"
             alt=""
        />
      </p>
    <?php
  }

  public static function field_element_cartepage(){
    $view_logo_cartepage     = esc_attr(get_option('view_logo_cartepage'));
    $view_namesite_cartepage = esc_attr(get_option('view_namesite_cartepage'));
    ?>
      <p class="description">
        Cocher ce qui doit être présent sur l'image (par-dessus)
      </p>
      <p>
        <input type="checkbox"
                id="view_logo_cartepage"
                name="view_logo_cartepage"
                value="1"
                <?php checked(1, $view_logo_cartepage, true) ?>
        />
        <span>Ajouter le logo</span>
      </p>
      <p>
        <input type="checkbox"
                id="view_namesite_cartepage"
                name="view_namesite_cartepage"
                value="1"
                <?php checked(1, $view_namesite_cartepage, true) ?>
        />
        <span>Ajouter le nom du site</span>
      </p>
    <?php
  }

  public static function field_message_hero_cartepage(){
    $yex_message_cartepage = esc_attr(get_option('yex_message_cartepage'));
    $title_hero_cartepage = esc_attr(get_option('title_hero_cartepage'));
    $text_hero_cartepage = esc_attr(get_option('text_hero_cartepage'));
    ?>
      <p class="description">
        Définir un message personnaliser
      </p>
      <p class="height-space">
        <input type="checkbox"
                id="yex_message_cartepage"
                name="yex_message_cartepage"
                value="1"
                <?php checked(1, $yex_message_cartepage, true) ?>
        />
        <span>Afficher le texte</span>
      </p>
      <p class="height-space">
        <label for="$title_hero_cartepage">
          Ajouter un titre
        </label>
        <input type="text"
               id="title_hero_cartepage"
               name="title_hero_cartepage"
               class="large-text"
               value="<?php echo $title_hero_cartepage ?>"
        />
      </p>
      <p>
        <label for="text_hero_cartepage">
          Ajouter du texte
        </label>
        <textarea
            name="text_hero_cartepage"
            id="text_hero_cartepage"
            class="large-text code"
        ><?php echo $text_hero_cartepage ?>
        </textarea>
      </p>
    <?php
  }


  /* ----- SECTION 2 : INFO ----- */
  public static function field_hidden_info_cartepage(){
      $hidden_info_cartepage = esc_attr(get_option('hidden_info_cartepage'));
    ?>
      <input type="checkbox"
             id="hidden_info_cartepage"
             name="hidden_info_cartepage"
             value="1"
             <?php checked(1, $hidden_info_cartepage, true); ?>
      />
      <span>
        Masquer cette section de la page dédier aux cartes
      </span>
    <?php
  }

  public static function field_title_cartepage(){
    $title_info_cartepage = esc_attr(get_option('title_info_cartepage'));
    ?>
      <input type="text"
             id="title_info_cartepage"
             name="title_info_cartepage"
             value="<?php echo $title_info_cartepage ?>"
             class="large-text"
      />
    <?php
  }

  public static function field_description_cartepage(){
    $text_info_cartepage = esc_attr(get_option('text_info_cartepage'));
    ?>
      <textarea
          name="text_info_cartepage"
          id="text_info_cartepage"
          class="large-text code"
      ><?php echo $text_info_cartepage ?>
      </textarea>
    <?php
  }

  public static function field_image_cartepage(){
    $image_info_cartepage = esc_attr(get_option('image_info_cartepage'));
    ?>
      <p>
        <input type="file"
               id="image_info_cartepage"
               name="image_info_cartepage"
               value="<?php echo get_option('image_info_cartepage') ?>"
        />
      </p>
      <p>
        <img src="<?php echo get_option('image_info_cartepage'); ?>"
             class="img-hero"
             alt=""
        />
      </p>
    <?php
  }


  /* ----- SECTION 3 : BOOKING ----- */
  public static function field_hidden_booking_cartepage(){
      $hidden_booking_cartepage = esc_attr(get_option('hidden_booking_cartepage'));
    ?>
    <input type="checkbox"
           id="hidden_booking_cartepage"
           name="hidden_booking_cartepage"
           value="1"
           <?php checked(1, $hidden_booking_cartepage, true); ?>
    />
    <span>
      Masquer cette section de la page dédier aux cartes
    </span>
    <?php
  }

  public static function field_element_booking_cartepage(){
      $view_icon_cartepage = esc_attr(get_option('view_icon_cartepage'));
      $view_phone_cartepage = esc_attr(get_option('view_phone_cartepage'));
    ?>
      <p class="description">
        Cocher ce qui doit être présent dans la section
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_icon_cartepage"
               name="view_icon_cartepage"
               value="1"
               <?php checked(1, $view_icon_cartepage, true); ?>
        />
        <span>Afficher l'icone</span>
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_phone_cartepage"
               name="view_phone_cartepage"
               value="1"
               <?php checked(1, $view_phone_cartepage, true); ?>
        />
        <span>Afficher le numéro de téléphone</span>
      </p>
    <?php
  }

  public static function field_texte_booking_cartepage(){
      $texte_booking_cartepage = esc_attr(get_option('texte_booking_cartepage'));
    ?>
    <p class="description">
      Définir le texte à afficher
    </p>
    <p class="height-space">
      <input type="text"
             id="texte_booking_cartepage"
             name="texte_booking_cartepage"
             value="<?php echo $texte_booking_cartepage ?>"
             class="large-text"
      />
    </p>
    <?php
  }
}
