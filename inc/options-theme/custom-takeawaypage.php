<?php
/**
 * File about gestion of dispay of page 'custom-takeawaypage'
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


class tablebouddha_custom_takeawaypage{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   */
  const SUB4_TITLE  = 'Page emportés';
  const SUB4_MENU   = 'Page emportés';
  const PERMITION   = 'manage_options';
  const SUB4_GROUP  = 'custom_takeawaypage';
  const NONCE       = '_custom_takeawaypage';

  // definit les section
  // definit les section
  const SECTION_HERO    = 'section_hero_takeawaypage';
  const SECTION_INFO    = 'section_info_takeawaypage';
  const SECTION_BOOKING = 'section_booking_takeawaypage';



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
      self::SUB4_TITLE,                    // page_title
      self::SUB4_MENU,                     // menu_title
      self::PERMITION,                     // capability
      self::SUB4_GROUP,                    // slug_menu
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
        Gestion de la page des emportés
      </h1>
      <p class="description">
        Sur cette page vous pouvez gérer l'affichage
        général de la page des emportés
      </p>
    </div>

      <form class="" action="options.php" method="post" enctype="multipart/form-data">
        <?php
          wp_nonce_field(self::NONCE, self::NONCE);
          settings_fields(self::SUB4_GROUP);
          do_settings_sections(self::SUB4_GROUP);
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
    register_setting(self::SUB4_GROUP, 'yes_hero_takeawaypage');
    register_setting(
      self::SUB4_GROUP,
      'add_hero_takeawaypage',
      [self::class, 'handle_file_hero_takeawaypage']
    );
    register_setting(self::SUB4_GROUP, 'view_logo_takeawaypage');
    register_setting(self::SUB4_GROUP, 'view_namesite_takeawaypage');
    register_setting(self::SUB4_GROUP, 'yex_message_takeawaypage');
    register_setting(self::SUB4_GROUP, 'title_hero_takeawaypage');
    register_setting(self::SUB4_GROUP, 'text_hero_takeawaypage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_HERO,                      // SLUG_SECTION
      'Section Hero',                          // TITLE
      [self::class, 'display_section_hero'],   // CALLBACK
      self::SUB4_GROUP
    ); // Section_1

    // ADD FIELD ---------------------------
    add_settings_field(
      'hero_takeawaypage',                             // SLUG_FIELD
      'Image d\'arrière plan',                      // LABEL
      [self::class,'field_hero_takeawaypage'],         // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'element_takeawaypage',                          // SLUG_FIELD
      'Ce qui doit être présent',                   // LABEL
      [self::class,'field_element_takeawaypage'],      // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'message_hero_takeawaypage',                     // SLUG_FIELD
      'Gestion d\'un message',                   // LABEL
      [self::class,'field_message_hero_takeawaypage'], // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    /* --- SECTION 2 : INFO ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB4_GROUP, 'hidden_info_takeawaypage');
    register_setting(self::SUB4_GROUP, 'title_info_takeawaypage');
    register_setting(self::SUB4_GROUP, 'text_info_takeawaypage');
    register_setting(
      self::SUB4_GROUP,
      'image_info_takeawaypage',
      [self::class, 'handle_file_info_takeawaypage']
    );

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_INFO,                           // SLUG_SECTION
      'Section info',                               // TITLE
      [self::class, 'display_section_description'], // CALLBACK
      self::SUB4_GROUP
    ); // Section_2

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_info_takeawaypage',                      // SLUG_FIELD
      'Cacher la section',                          // LABEL
      [self::class,'field_hidden_info_takeawaypage'],  // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'title_takeawaypage',                            // SLUG_FIELD
      'Ajouter un titre',                           // LABEL
      [self::class,'field_title_takeawaypage'],        // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'description_takeawaypage',                      // SLUG_FIELD
      'Ajouter une description',                    // LABEL
      [self::class,'field_description_takeawaypage'],  // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'image_takeawaypage',                            // SLUG_FIELD
      'Ajouter une image',                          // LABEL
      [self::class,'field_image_takeawaypage'],        // CALLBACK
      self::SUB4_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    /* --- SECTION 3 : BOOKING --------------- */
    // SAVE SETTING ------------------------
    register_setting(self::SUB4_GROUP, 'hidden_booking_takeawaypage');
    register_setting(self::SUB4_GROUP, 'view_icon_takeawaypage');
    register_setting(self::SUB4_GROUP, 'view_phone_takeawaypage');
    register_setting(self::SUB4_GROUP, 'texte_booking_takeawaypage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_BOOKING,                      // SLUG_SECTION
      'Section réservation',                      // TITLE
      [self::class, 'display_section_booking'],   // CALLBACK
      self::SUB4_GROUP
    ); // Section_3

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_booking_takeawaypage',                     // SLUG_FIELD
      'Cacher la section',                            // LABEL
      [self::class,'field_hidden_booking_takeawaypage'], // CALLBACK
      self::SUB4_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'element_booking_takeawaypage',                     // SLUG_FIELD
      'Ce qui doit être présent',                            // LABEL
      [self::class,'field_element_booking_takeawaypage'], // CALLBACK
      self::SUB4_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'texte_booking_takeawaypage',                     // SLUG_FIELD
      'Gestion du texte',                            // LABEL
      [self::class,'field_texte_booking_takeawaypage'], // CALLBACK
      self::SUB4_GROUP ,                              // SLUG_PAGE
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
  public static function handle_file_hero_takeawaypage($options){
   if(!empty($_FILES['add_hero_takeawaypage']['tmp_name'])){
     $urls = wp_handle_upload($_FILES['add_hero_takeawaypage'], array('test_form' => FALSE));
     $temp = $urls['url'];
     return $temp;
   } // end -> if(!empty($_FILES['add_hero_takeawaypage']['tmp_name']))

   //no upload. old file url is the new value.
   return get_option('add_hero_takeawaypage');
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function handle_file_info_takeawaypage($options){
    if(!empty($_FILES['image_info_takeawaypage']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['image_info_takeawaypage'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['image_info_takeawaypage']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('image_info_takeawaypage');
  }


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function field_hero_takeawaypage(){
   $yes_hero_takeawaypage = esc_attr(get_option('yes_hero_takeawaypage'));
   $add_hero_takeawaypage = esc_attr(get_option('add_hero_takeawaypage'));
   ?>
     <p>
       <input type="checkbox"
               id="yes_hero_takeawaypage"
               name="yes_hero_takeawaypage"
               value="1"
               <?php checked(1, $yes_hero_takeawaypage, true) ?>
       />
       <span class="info">
         Ajouter l'image comme d'arrière plan
       </span>
     </p>
     <p class="height-space">
       <input type="file"
              id="add_hero_takeawaypage"
              name="add_hero_takeawaypage"
              value="<?php echo get_option('add_hero_takeawaypage'); ?>"
       />
     </p>
     <p>
       <img src="<?php echo get_option('add_hero_takeawaypage'); ?>"
            class="img-hero"
            alt=""
       />
     </p>
   <?php
  }

  public static function field_element_takeawaypage(){
   $view_logo_takeawaypage     = esc_attr(get_option('view_logo_takeawaypage'));
   $view_namesite_takeawaypage = esc_attr(get_option('view_namesite_takeawaypage'));
   ?>
     <p class="description">
       Cocher ce qui doit être présent sur l'image (par-dessus)
     </p>
     <p>
       <input type="checkbox"
               id="view_logo_takeawaypage"
               name="view_logo_takeawaypage"
               value="1"
               <?php checked(1, $view_logo_takeawaypage, true) ?>
       />
       <span>Ajouter le logo</span>
     </p>
     <p>
       <input type="checkbox"
               id="view_namesite_takeawaypage"
               name="view_namesite_takeawaypage"
               value="1"
               <?php checked(1, $view_namesite_takeawaypage, true) ?>
       />
       <span>Ajouter le nom du site</span>
     </p>
   <?php
  }

  public static function field_message_hero_takeawaypage(){
   $yex_message_takeawaypage = esc_attr(get_option('yex_message_takeawaypage'));
   $title_hero_takeawaypage = esc_attr(get_option('title_hero_takeawaypage'));
   $text_hero_takeawaypage = esc_attr(get_option('text_hero_takeawaypage'));
   ?>
     <p class="description">
       Définir un message personnaliser
     </p>
     <p class="height-space">
       <input type="checkbox"
               id="yex_message_takeawaypage"
               name="yex_message_takeawaypage"
               value="1"
               <?php checked(1, $yex_message_takeawaypage, true) ?>
       />
       <span>Afficher le texte</span>
     </p>
     <p class="height-space">
       <label for="$title_hero_takeawaypage">
         Ajouter un titre
       </label>
       <input type="text"
              id="title_hero_takeawaypage"
              name="title_hero_takeawaypage"
              class="large-text"
              value="<?php echo $title_hero_takeawaypage ?>"
       />
     </p>
     <p>
       <label for="text_hero_takeawaypage">
         Ajouter du texte
       </label>
       <textarea
           name="text_hero_takeawaypage"
           id="text_hero_takeawaypage"
           class="large-text code"
       ><?php echo $text_hero_takeawaypage ?>
       </textarea>
     </p>
   <?php
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function field_hidden_info_takeawaypage(){
      $hidden_info_takeawaypage = esc_attr(get_option('hidden_info_takeawaypage'));
    ?>
      <input type="checkbox"
             id="hidden_info_takeawaypage"
             name="hidden_info_takeawaypage"
             value="1"
             <?php checked(1, $hidden_info_takeawaypage, true); ?>
      />
      <span>
        Masquer cette section de la page dédier aux cartes
      </span>
    <?php
  }

  public static function field_title_takeawaypage(){
    $title_info_takeawaypage = esc_attr(get_option('title_info_takeawaypage'));
    ?>
      <input type="text"
             id="title_info_takeawaypage"
             name="title_info_takeawaypage"
             value="<?php echo $title_info_takeawaypage ?>"
             class="large-text"
      />
    <?php
  }

  public static function field_description_takeawaypage(){
    $text_info_takeawaypage = esc_attr(get_option('text_info_takeawaypage'));
    ?>
      <textarea
          name="text_info_takeawaypage"
          id="text_info_takeawaypage"
          class="large-text code"
      ><?php echo $text_info_takeawaypage ?>
      </textarea>
    <?php
  }

  public static function field_image_takeawaypage(){
    $image_info_takeawaypage = esc_attr(get_option('image_info_takeawaypage'));
    ?>
      <p>
        <input type="file"
               id="image_info_takeawaypage"
               name="image_info_takeawaypage"
               value="<?php echo get_option('image_info_takeawaypage') ?>"
        />
      </p>
      <p>
        <img src="<?php echo get_option('image_info_takeawaypage'); ?>"
             class="img-hero"
             alt=""
        />
      </p>
    <?php
  }


  /* ----- SECTION 3 : BOOKING ----- */
  public static function field_hidden_booking_takeawaypage(){
      $hidden_booking_takeawaypage = esc_attr(get_option('hidden_booking_takeawaypage'));
    ?>
    <input type="checkbox"
           id="hidden_booking_takeawaypage"
           name="hidden_booking_takeawaypage"
           value="1"
           <?php checked(1, $hidden_booking_takeawaypage, true); ?>
    />
    <span>
      Masquer cette section de la page dédier aux cartes
    </span>
    <?php
  }

  public static function field_element_booking_takeawaypage(){
      $view_icon_takeawaypage = esc_attr(get_option('view_icon_takeawaypage'));
      $view_phone_takeawaypage = esc_attr(get_option('view_phone_takeawaypage'));
    ?>
      <p class="description">
        Cocher ce qui doit être présent dans la section
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_icon_takeawaypage"
               name="view_icon_takeawaypage"
               value="1"
               <?php checked(1, $view_icon_takeawaypage, true); ?>
        />
        <span>Afficher l'icone</span>
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_phone_takeawaypage"
               name="view_phone_takeawaypage"
               value="1"
               <?php checked(1, $view_phone_takeawaypage, true); ?>
        />
        <span>Afficher le numéro de téléphone</span>
      </p>
    <?php
  }

  public static function field_texte_booking_takeawaypage(){
      $texte_booking_takeawaypage = esc_attr(get_option('texte_booking_takeawaypage'));
    ?>
    <p class="description">
      Définir le texte à afficher
    </p>
    <p class="height-space">
      <input type="text"
             id="texte_booking_takeawaypage"
             name="texte_booking_takeawaypage"
             value="<?php echo $texte_booking_takeawaypage ?>"
             class="large-text"
      />
    </p>
    <?php
  }
}
