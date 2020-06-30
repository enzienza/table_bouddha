<?php
/**
 * File about gestion of dispay of page 'custom-drinkpage'
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


class tablebouddha_custom_drinkpage{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   */
  const SUB3_TITLE  = 'Page boissons';
  const SUB3_MENU   = 'Page boissons';
  const PERMITION   = 'manage_options';
  const SUB3_GROUP  = 'custom_drinkpage';
  const NONCE       = '_custom_drinkpage';

  // definit les section
  const SECTION_HERO    = 'section_hero_drinkpage';
  const SECTION_INFO    = 'section_info_drinkpage';
  const SECTION_BOOKING = 'section_booking_drinkpage';



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
      self::SUB3_TITLE,                   // page_title
      self::SUB3_MENU,                    // menu_title
      self::PERMITION,                    // capability
      self::SUB3_GROUP,                   // slug_menu
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
          Gestion de la page des boissons
        </h1>
        <p class="description">
          Sur cette page vous pouvez gérer l'affichage
          général de la page des boissons
        </p>
      </div>

      <form class="" action="options.php" method="post" enctype="multipart/form-data">
        <?php
          wp_nonce_field(self::NONCE, self::NONCE);
          settings_fields(self::SUB3_GROUP);
          do_settings_sections(self::SUB3_GROUP);
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
    register_setting(self::SUB3_GROUP, 'yes_hero_drinkpage');
    register_setting(
      self::SUB3_GROUP,
      'add_hero_drinkpage',
      [self::class, 'handle_file_hero_drinkpage']
    );
    register_setting(self::SUB3_GROUP, 'view_logo_drinkpage');
    register_setting(self::SUB3_GROUP, 'view_namesite_drinkpage');
    register_setting(self::SUB3_GROUP, 'yex_message_drinkpage');
    register_setting(self::SUB3_GROUP, 'title_hero_drinkpage');
    register_setting(self::SUB3_GROUP, 'text_hero_drinkpage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_HERO,                      // SLUG_SECTION
      'Section Hero',                          // TITLE
      [self::class, 'display_section_hero'],   // CALLBACK
      self::SUB3_GROUP
    ); // Section_1

    // ADD FIELD ---------------------------
    add_settings_field(
      'hero_drinkpage',                             // SLUG_FIELD
      'Image d\'arrière plan',                      // LABEL
      [self::class,'field_hero_drinkpage'],         // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'element_drinkpage',                          // SLUG_FIELD
      'Ce qui doit être présent',                   // LABEL
      [self::class,'field_element_drinkpage'],      // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    add_settings_field(
      'message_hero_drinkpage',                     // SLUG_FIELD
      'Gestion d\'un message',                   // LABEL
      [self::class,'field_message_hero_drinkpage'], // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_HERO
    ); // section_1

    /* --- SECTION 2 : INFO ------------------ */
    // SAVE SETTING ------------------------
    register_setting(self::SUB3_GROUP, 'hidden_info_drinkpage');
    register_setting(self::SUB3_GROUP, 'title_info_drinkpage');
    register_setting(self::SUB3_GROUP, 'text_info_drinkpage');
    register_setting(
      self::SUB3_GROUP,
      'image_info_drinkpage',
      [self::class, 'handle_file_info_drinkpage']
    );

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_INFO,                           // SLUG_SECTION
      'Section info',                               // TITLE
      [self::class, 'display_section_description'], // CALLBACK
      self::SUB3_GROUP
    ); // Section_2

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_info_drinkpage',                      // SLUG_FIELD
      'Cacher la section',                          // LABEL
      [self::class,'field_hidden_info_drinkpage'],  // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'title_drinkpage',                            // SLUG_FIELD
      'Ajouter un titre',                           // LABEL
      [self::class,'field_title_drinkpage'],        // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'description_drinkpage',                      // SLUG_FIELD
      'Ajouter une description',                    // LABEL
      [self::class,'field_description_drinkpage'],  // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    add_settings_field(
      'image_drinkpage',                            // SLUG_FIELD
      'Ajouter une image',                          // LABEL
      [self::class,'field_image_drinkpage'],        // CALLBACK
      self::SUB3_GROUP ,                            // SLUG_PAGE
      self::SECTION_INFO
    ); // section_2

    /* --- SECTION 3 : BOOKING --------------- */
    // SAVE SETTING ------------------------
    register_setting(self::SUB3_GROUP, 'hidden_booking_drinkpage');
    register_setting(self::SUB3_GROUP, 'view_icon_drinkpage');
    register_setting(self::SUB3_GROUP, 'view_phone_drinkpage');
    register_setting(self::SUB3_GROUP, 'texte_booking_drinkpage');

    // ADD SECTION -------------------------
    add_settings_section(
      self::SECTION_BOOKING,                      // SLUG_SECTION
      'Section réservation',                      // TITLE
      [self::class, 'display_section_booking'],   // CALLBACK
      self::SUB3_GROUP
    ); // Section_3

    // ADD FIELD ---------------------------
    add_settings_field(
      'hidden_booking_drinkpage',                     // SLUG_FIELD
      'Cacher la section',                            // LABEL
      [self::class,'field_hidden_booking_drinkpage'], // CALLBACK
      self::SUB3_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'element_booking_drinkpage',                     // SLUG_FIELD
      'Ce qui doit être présent',                            // LABEL
      [self::class,'field_element_booking_drinkpage'], // CALLBACK
      self::SUB3_GROUP ,                              // SLUG_PAGE
      self::SECTION_BOOKING
    ); // section_3

    add_settings_field(
      'texte_booking_drinkpage',                     // SLUG_FIELD
      'Gestion du texte',                            // LABEL
      [self::class,'field_texte_booking_drinkpage'], // CALLBACK
      self::SUB3_GROUP ,                              // SLUG_PAGE
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
  public static function handle_file_hero_drinkpage($options){
   if(!empty($_FILES['add_hero_drinkpage']['tmp_name'])){
     $urls = wp_handle_upload($_FILES['add_hero_drinkpage'], array('test_form' => FALSE));
     $temp = $urls['url'];
     return $temp;
   } // end -> if(!empty($_FILES['add_hero_drinkpage']['tmp_name']))

   //no upload. old file url is the new value.
   return get_option('add_hero_drinkpage');
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function handle_file_info_drinkpage($options){
    if(!empty($_FILES['image_info_drinkpage']['tmp_name'])){
      $urls = wp_handle_upload($_FILES['image_info_drinkpage'], array('test_form' => FALSE));
      $temp = $urls['url'];
      return $temp;
    } // end -> if(!empty($_FILES['image_info_drinkpage']['tmp_name']))

    //no upload. old file url is the new value.
    return get_option('image_info_drinkpage');
  }


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
  /* ----- SECTION 1 : HERO ----- */
  public static function field_hero_drinkpage(){
   $yes_hero_drinkpage = esc_attr(get_option('yes_hero_drinkpage'));
   $add_hero_drinkpage = esc_attr(get_option('add_hero_drinkpage'));
   ?>
     <p>
       <input type="checkbox"
               id="yes_hero_drinkpage"
               name="yes_hero_drinkpage"
               value="1"
               <?php checked(1, $yes_hero_drinkpage, true) ?>
       />
       <span class="info">
         Ajouter l'image comme d'arrière plan
       </span>
     </p>
     <p class="height-space">
       <input type="file"
              id="add_hero_drinkpage"
              name="add_hero_drinkpage"
              value="<?php echo get_option('add_hero_drinkpage'); ?>"
       />
     </p>
     <p>
       <img src="<?php echo get_option('add_hero_drinkpage'); ?>"
            class="img-hero"
            alt=""
       />
     </p>
   <?php
  }

  public static function field_element_drinkpage(){
   $view_logo_drinkpage     = esc_attr(get_option('view_logo_drinkpage'));
   $view_namesite_drinkpage = esc_attr(get_option('view_namesite_drinkpage'));
   ?>
     <p class="description">
       Cocher ce qui doit être présent sur l'image (par-dessus)
     </p>
     <p>
       <input type="checkbox"
               id="view_logo_drinkpage"
               name="view_logo_drinkpage"
               value="1"
               <?php checked(1, $view_logo_drinkpage, true) ?>
       />
       <span>Ajouter le logo</span>
     </p>
     <p>
       <input type="checkbox"
               id="view_namesite_drinkpage"
               name="view_namesite_drinkpage"
               value="1"
               <?php checked(1, $view_namesite_drinkpage, true) ?>
       />
       <span>Ajouter le nom du site</span>
     </p>
   <?php
  }

  public static function field_message_hero_drinkpage(){
   $yex_message_drinkpage = esc_attr(get_option('yex_message_drinkpage'));
   $title_hero_drinkpage = esc_attr(get_option('title_hero_drinkpage'));
   $text_hero_drinkpage = esc_attr(get_option('text_hero_drinkpage'));
   ?>
     <p class="description">
       Définir un message personnaliser
     </p>
     <p class="height-space">
       <input type="checkbox"
               id="yex_message_drinkpage"
               name="yex_message_drinkpage"
               value="1"
               <?php checked(1, $yex_message_drinkpage, true) ?>
       />
       <span>Afficher le texte</span>
     </p>
     <p class="height-space">
       <label for="$title_hero_drinkpage">
         Ajouter un titre
       </label>
       <input type="text"
              id="title_hero_drinkpage"
              name="title_hero_drinkpage"
              class="large-text"
              value="<?php echo $title_hero_drinkpage ?>"
       />
     </p>
     <p>
       <label for="text_hero_drinkpage">
         Ajouter du texte
       </label>
       <textarea
           name="text_hero_drinkpage"
           id="text_hero_drinkpage"
           class="large-text code"
       ><?php echo $text_hero_drinkpage ?>
       </textarea>
     </p>
   <?php
  }

  /* ----- SECTION 2 : INFO ----- */
  public static function field_hidden_info_drinkpage(){
      $hidden_info_drinkpage = esc_attr(get_option('hidden_info_drinkpage'));
    ?>
      <input type="checkbox"
             id="hidden_info_drinkpage"
             name="hidden_info_drinkpage"
             value="1"
             <?php checked(1, $hidden_info_drinkpage, true); ?>
      />
      <span>
        Masquer cette section de la page dédier aux cartes
      </span>
    <?php
  }

  public static function field_title_drinkpage(){
    $title_info_drinkpage = esc_attr(get_option('title_info_drinkpage'));
    ?>
      <input type="text"
             id="title_info_drinkpage"
             name="title_info_drinkpage"
             value="<?php echo $title_info_drinkpage ?>"
             class="large-text"
      />
    <?php
  }

  public static function field_description_drinkpage(){
    $text_info_drinkpage = esc_attr(get_option('text_info_drinkpage'));
    ?>
      <textarea
          name="text_info_drinkpage"
          id="text_info_drinkpage"
          class="large-text code"
      ><?php echo $text_info_drinkpage ?>
      </textarea>
    <?php
  }

  public static function field_image_drinkpage(){
    $image_info_drinkpage = esc_attr(get_option('image_info_drinkpage'));
    ?>
      <p>
        <input type="file"
               id="image_info_drinkpage"
               name="image_info_drinkpage"
               value="<?php echo get_option('image_info_drinkpage') ?>"
        />
      </p>
      <p>
        <img src="<?php echo get_option('image_info_drinkpage'); ?>"
             class="img-hero"
             alt=""
        />
      </p>
    <?php
  }


  /* ----- SECTION 3 : BOOKING ----- */
  public static function field_hidden_booking_drinkpage(){
      $hidden_booking_drinkpage = esc_attr(get_option('hidden_booking_drinkpage'));
    ?>
    <input type="checkbox"
           id="hidden_booking_drinkpage"
           name="hidden_booking_drinkpage"
           value="1"
           <?php checked(1, $hidden_booking_drinkpage, true); ?>
    />
    <span>
      Masquer cette section de la page dédier aux cartes
    </span>
    <?php
  }

  public static function field_element_booking_drinkpage(){
      $view_icon_drinkpage = esc_attr(get_option('view_icon_drinkpage'));
      $view_phone_drinkpage = esc_attr(get_option('view_phone_drinkpage'));
    ?>
      <p class="description">
        Cocher ce qui doit être présent dans la section
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_icon_drinkpage"
               name="view_icon_drinkpage"
               value="1"
               <?php checked(1, $view_icon_drinkpage, true); ?>
        />
        <span>Afficher l'icone</span>
      </p>
      <p class="height-space">
        <input type="checkbox"
               id="view_phone_drinkpage"
               name="view_phone_drinkpage"
               value="1"
               <?php checked(1, $view_phone_drinkpage, true); ?>
        />
        <span>Afficher le numéro de téléphone</span>
      </p>
    <?php
  }

  public static function field_texte_booking_drinkpage(){
      $texte_booking_drinkpage = esc_attr(get_option('texte_booking_drinkpage'));
    ?>
    <p class="description">
      Définir le texte à afficher
    </p>
    <p class="height-space">
      <input type="text"
             id="texte_booking_drinkpage"
             name="texte_booking_drinkpage"
             value="<?php echo $texte_booking_drinkpage ?>"
             class="large-text"
      />
    </p>
    <?php
  }
}
