<?php
/**
 * File about gestion of dispay of page 'custom-eventpage'
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

class tablebouddha_custom_eventpage{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   */
  const SUB5_TITLE   = 'Page événements';
  const SUB5_MENU    = 'Page événements';
  const PERMITION    = 'manage_options';
  const SUB5_GROUP   = 'custom_eventpage';
  const NONCE        = '_custom_eventpage';

  // definit les section
  // definit les section
  const SECTION_HERO    = 'section_hero_eventpage';
  const SECTION_INFO    = 'section_info_eventpage';
  const SECTION_BOOKING = 'section_booking_eventpage';




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
      self::SUB5_TITLE,                    // page_title
      self::SUB5_MENU,                     // menu_title
      self::PERMITION,                     // capability
      self::SUB5_GROUP,                    // slug_menu
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
        Gestion de la page des événements
      </h1>
      <p class="description">
        Sur cette page vous pouvez gérer l'affichage
        général de la page des événements
      </p>
    </div>

      <form class="" action="options.php" method="post" enctype="multipart/form-data">
        <?php
          wp_nonce_field(self::NONCE, self::NONCE);
          settings_fields(self::SUB5_GROUP);
          do_settings_sections(self::SUB5_GROUP);
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
    register_setting(self::SUB5_GROUP, 'yes_hero_eventpage');
    register_setting(
      self::SUB5_GROUP,
      'add_hero_eventpage',
      [self::class, 'handle_file_hero_eventpage']
    );
    register_setting(self::SUB5_GROUP, 'view_logo_eventpage');
    register_setting(self::SUB5_GROUP, 'view_namesite_eventpage');
    register_setting(self::SUB5_GROUP, 'yex_message_eventpage');
    register_setting(self::SUB5_GROUP, 'title_hero_eventpage');
    register_setting(self::SUB5_GROUP, 'text_hero_eventpage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_HERO,                      // SLUG_SECTION
      'Section Hero',                          // TITLE
      [self::class, 'display_section_hero'],   // CALLBACK
      self::SUB5_GROUP
    ); // Section_1

    // ADD FIELD ---------------------------
    add_settings_field(
      'hero_eventpage',                             // SLUG_FIELD
      'Image d\'arrière plan',                      // LABEL
      [self::class,'field_hero_eventpage'],         // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'element_eventpage',                          // SLUG_FIELD
      'Ce qui doit être présent',                   // LABEL
      [self::class,'field_element_eventpage'],      // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'message_hero_eventpage',                     // SLUG_FIELD
      'Gestion d\'un message',                   // LABEL
      [self::class,'field_message_hero_eventpage'], // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    /* --- SECTION 2 : INFO ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB5_GROUP, 'hidden_info_eventpage');
    register_setting(self::SUB5_GROUP, 'title_info_eventpage');
    register_setting(self::SUB5_GROUP, 'text_info_eventpage');
    register_setting(
      self::SUB5_GROUP,
      'image_info_eventpage',
      [self::class, 'handle_file_info_eventpage']
    );

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_INFO,                           // SLUG_SECTION
      'Section info',                               // TITLE
      [self::class, 'display_section_description'], // CALLBACK
      self::SUB5_GROUP
    ); // Section_2

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_info_eventpage',                      // SLUG_FIELD
      'Cacher la section',                          // LABEL
      [self::class,'field_hidden_info_eventpage'],  // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'title_eventpage',                            // SLUG_FIELD
      'Ajouter un titre',                           // LABEL
      [self::class,'field_title_eventpage'],        // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'description_eventpage',                      // SLUG_FIELD
      'Ajouter une description',                    // LABEL
      [self::class,'field_description_eventpage'],  // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'image_eventpage',                            // SLUG_FIELD
      'Ajouter une image',                          // LABEL
      [self::class,'field_image_eventpage'],        // CALLBACK
      self::SUB5_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    /* --- SECTION 3 : BOOKING --------------- */
    // SAVE SETTING ------------------------
    register_setting(self::SUB5_GROUP, 'hidden_booking_eventpage');
    register_setting(self::SUB5_GROUP, 'view_icon_eventpage');
    register_setting(self::SUB5_GROUP, 'view_phone_eventpage');
    register_setting(self::SUB5_GROUP, 'texte_booking_eventpage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_BOOKING,                      // SLUG_SECTION
      'Section réservation',                      // TITLE
      [self::class, 'display_section_booking'],   // CALLBACK
      self::SUB5_GROUP
    ); // Section_3

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_booking_eventpage',                     // SLUG_FIELD
      'Cacher la section',                            // LABEL
      [self::class,'field_hidden_booking_eventpage'], // CALLBACK
      self::SUB5_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'element_booking_eventpage',                     // SLUG_FIELD
      'Ce qui doit être présent',                            // LABEL
      [self::class,'field_element_booking_eventpage'], // CALLBACK
      self::SUB5_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'texte_booking_eventpage',                     // SLUG_FIELD
      'Gestion du texte',                            // LABEL
      [self::class,'field_texte_booking_eventpage'], // CALLBACK
      self::SUB5_GROUP ,                              // SLUG_PAGE
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
  public static function handle_file_hero_eventpage($options){
   if(!empty($_FILES['add_hero_eventpage']['tmp_name'])){
     $urls = wp_handle_upload($_FILES['add_hero_eventpage'], array('test_form' => FALSE));
     $temp = $urls['url'];
     return $temp;
   } // end -> if(!empty($_FILES['add_hero_eventpage']['tmp_name']))

   //no upload. old file url is the new value.
   return get_option('add_hero_eventpage');
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function handle_file_info_eventpage($options){
    if(!empty($_FILES['image_info_eventpage']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['image_info_eventpage'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['image_info_eventpage']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('image_info_eventpage');
  }


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function field_hero_eventpage(){
   $yes_hero_eventpage = esc_attr(get_option('yes_hero_eventpage'));
   $add_hero_eventpage = esc_attr(get_option('add_hero_eventpage'));
   ?>
     <p>
       <input type="checkbox"
               id="yes_hero_eventpage"
               name="yes_hero_eventpage"
               value="1"
               <?php checked(1, $yes_hero_eventpage, true) ?>
       />
       <span class="info">
         Ajouter l'image comme d'arrière plan
       </span>
     </p>
     <p class="height-space">
       <input type="file"
              id="add_hero_eventpage"
              name="add_hero_eventpage"
              value="<?php echo get_option('add_hero_eventpage'); ?>"
       />
     </p>
     <p>
       <img src="<?php echo get_option('add_hero_eventpage'); ?>"
            class="img-hero"
            alt=""
       />
     </p>
   <?php
  }

  public static function field_element_eventpage(){
   $view_logo_eventpage     = esc_attr(get_option('view_logo_eventpage'));
   $view_namesite_eventpage = esc_attr(get_option('view_namesite_eventpage'));
   ?>
     <p class="description">
       Cocher ce qui doit être présent sur l'image (par-dessus)
     </p>
     <p>
       <input type="checkbox"
               id="view_logo_eventpage"
               name="view_logo_eventpage"
               value="1"
               <?php checked(1, $view_logo_eventpage, true) ?>
       />
       <span>Ajouter le logo</span>
     </p>
     <p>
       <input type="checkbox"
               id="view_namesite_eventpage"
               name="view_namesite_eventpage"
               value="1"
               <?php checked(1, $view_namesite_eventpage, true) ?>
       />
       <span>Ajouter le nom du site</span>
     </p>
   <?php
  }

  public static function field_message_hero_eventpage(){
   $yex_message_eventpage = esc_attr(get_option('yex_message_eventpage'));
   $title_hero_eventpage = esc_attr(get_option('title_hero_eventpage'));
   $text_hero_eventpage = esc_attr(get_option('text_hero_eventpage'));
   ?>
     <p class="description">
       Définir un message personnaliser
     </p>
     <p class="height-space">
       <input type="checkbox"
               id="yex_message_eventpage"
               name="yex_message_eventpage"
               value="1"
               <?php checked(1, $yex_message_eventpage, true) ?>
       />
       <span>Afficher le texte</span>
     </p>
     <p class="height-space">
       <label for="$title_hero_eventpage">
         Ajouter un titre
       </label>
       <input type="text"
              id="title_hero_eventpage"
              name="title_hero_eventpage"
              class="large-text"
              value="<?php echo $title_hero_eventpage ?>"
       />
     </p>
     <p>
       <label for="text_hero_eventpage">
         Ajouter du texte
       </label>
       <textarea
           name="text_hero_eventpage"
           id="text_hero_eventpage"
           class="large-text code"
       ><?php echo $text_hero_eventpage ?>
       </textarea>
     </p>
   <?php
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function field_hidden_info_eventpage(){
      $hidden_info_eventpage = esc_attr(get_option('hidden_info_eventpage'));
    ?>
      <input type="checkbox"
             id="hidden_info_eventpage"
             name="hidden_info_eventpage"
             value="1"
             <?php checked(1, $hidden_info_eventpage, true); ?>
      />
      <span>
        Masquer cette section de la page dédier aux cartes
      </span>
    <?php
  }

  public static function field_title_eventpage(){
    $title_info_eventpage = esc_attr(get_option('title_info_eventpage'));
    ?>
      <input type="text"
             id="title_info_eventpage"
             name="title_info_eventpage"
             value="<?php echo $title_info_eventpage ?>"
             class="large-text"
      />
    <?php
  }

  public static function field_description_eventpage(){
    $text_info_eventpage = esc_attr(get_option('text_info_eventpage'));
    ?>
      <textarea
          name="text_info_eventpage"
          id="text_info_eventpage"
          class="large-text code"
      ><?php echo $text_info_eventpage ?>
      </textarea>
    <?php
  }

  public static function field_image_eventpage(){
    $image_info_eventpage = esc_attr(get_option('image_info_eventpage'));
    ?>
      <p>
        <input type="file"
               id="image_info_eventpage"
               name="image_info_eventpage"
               value="<?php echo get_option('image_info_eventpage') ?>"
        />
      </p>
      <p>
        <img src="<?php echo get_option('image_info_eventpage'); ?>"
             class="img-hero"
             alt=""
        />
      </p>
    <?php
  }


  /* ----- SECTION 3 : BOOKING ----- */
  public static function field_hidden_booking_eventpage(){
      $hidden_booking_eventpage = esc_attr(get_option('hidden_booking_eventpage'));
    ?>
    <input type="checkbox"
           id="hidden_booking_eventpage"
           name="hidden_booking_eventpage"
           value="1"
           <?php checked(1, $hidden_booking_eventpage, true); ?>
    />
    <span>
      Masquer cette section de la page dédier aux cartes
    </span>
    <?php
  }

  public static function field_element_booking_eventpage(){
      $view_icon_eventpage = esc_attr(get_option('view_icon_eventpage'));
      $view_phone_eventpage = esc_attr(get_option('view_phone_eventpage'));
    ?>
      <p class="description">
        Cocher ce qui doit être présent dans la section
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_icon_eventpage"
               name="view_icon_eventpage"
               value="1"
               <?php checked(1, $view_icon_eventpage, true); ?>
        />
        <span>Afficher l'icone</span>
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_phone_eventpage"
               name="view_phone_eventpage"
               value="1"
               <?php checked(1, $view_phone_eventpage, true); ?>
        />
        <span>Afficher le numéro de téléphone</span>
      </p>
    <?php
  }

  public static function field_texte_booking_eventpage(){
      $texte_booking_eventpage = esc_attr(get_option('texte_booking_eventpage'));
    ?>
    <p class="description">
      Définir le texte à afficher
    </p>
    <p class="height-space">
      <input type="text"
             id="texte_booking_eventpage"
             name="texte_booking_eventpage"
             value="<?php echo $texte_booking_eventpage ?>"
             class="large-text"
      />
    </p>
    <?php
  }
}
