<?php
/**
 * File about gestion of restaurant opening hours
 * Submenu of generatity
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
 * 7 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
 */


 class tablebouddha_timetable{
   /**
    * 1 - DEFINIR LES ELEMENTS (repeter)
    * afin d'evite les fautes de frappe
    */
    // page info - level 2
    const SUB_TITLE  = 'Horaire';
    const SUB_MENU   = 'Horaire';
    const PERMITION  = 'manage_options';
    const SUB_GROUP  = 'timetable_tablebouddha';


    // definit les section
    const SECTION_TIMETABLE = 'section_horaire_tablebouddha';

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
        tablebouddha_generality::GROUP,     // slug parent
        self::SUB_TITLE,                    // page_title
        self::SUB_MENU,                     // menu_title
        self::PERMITION,                    // capability
        self::SUB_GROUP,                    // slug_menu
        [self::class, 'render']             // CALLBACK
      );
    }

   /**
    * 4 - TEMPLATE DES PAGES
    */
   public static function render(){
     ?>
       <div class="wrap">
         <h1 class="wp-heagin-inline">Horaires</h1>
         <p class="description">
           Sur cette page vous pouvez gérer les heures
           d'ouverture du restaurant
         </p>
       </div>
       <form class="form-timetable" action="options.php" method="post" enctype="multipart/form-data">
         <?php settings_fields(self::SUB_GROUP); ?>
         <?php do_settings_sections(self::SUB_GROUP); ?>
         <?php submit_button(); ?>
       </form>
     <?php
   }


   /**
    * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
    */
    public static function registerSettings(){
      // SAVE SETTING -------
      register_setting(self::SUB_GROUP, 'lundi_mide_de');
      register_setting(self::SUB_GROUP, 'lundi_mide_a');
      register_setting(self::SUB_GROUP, 'lundi_soir_de');
      register_setting(self::SUB_GROUP, 'lundi_soir_a');
      register_setting(self::SUB_GROUP, 'lundi_fermer');

      register_setting(self::SUB_GROUP, 'mardi_mide_de');
      register_setting(self::SUB_GROUP, 'mardi_mide_a');
      register_setting(self::SUB_GROUP, 'mardi_soir_de');
      register_setting(self::SUB_GROUP, 'mardi_soir_a');
      register_setting(self::SUB_GROUP, 'mardi_fermer');

      register_setting(self::SUB_GROUP, 'mercredi_mide_de');
      register_setting(self::SUB_GROUP, 'mercredi_mide_a');
      register_setting(self::SUB_GROUP, 'mercredi_soir_de');
      register_setting(self::SUB_GROUP, 'mercredi_soir_a');
      register_setting(self::SUB_GROUP, 'mercredi_fermer');

      register_setting(self::SUB_GROUP, 'jeudi_mide_de');
      register_setting(self::SUB_GROUP, 'jeudi_mide_a');
      register_setting(self::SUB_GROUP, 'jeudi_soir_de');
      register_setting(self::SUB_GROUP, 'jeudi_soir_a');
      register_setting(self::SUB_GROUP, 'jeudi_fermer');

      register_setting(self::SUB_GROUP, 'vendredi_mide_de');
      register_setting(self::SUB_GROUP, 'vendredi_mide_a');
      register_setting(self::SUB_GROUP, 'vendredi_soir_de');
      register_setting(self::SUB_GROUP, 'vendredi_soir_a');
      register_setting(self::SUB_GROUP, 'vendredi_fermer');

      register_setting(self::SUB_GROUP, 'samedi_mide_de');
      register_setting(self::SUB_GROUP, 'samedi_mide_a');
      register_setting(self::SUB_GROUP, 'samedi_soir_de');
      register_setting(self::SUB_GROUP, 'samedi_soir_a');
      register_setting(self::SUB_GROUP, 'samedi_fermer');

      register_setting(self::SUB_GROUP, 'dimanche_mide_de');
      register_setting(self::SUB_GROUP, 'dimanche_mide_a');
      register_setting(self::SUB_GROUP, 'dimanche_soir_de');
      register_setting(self::SUB_GROUP, 'dimanche_soir_a');
      register_setting(self::SUB_GROUP, 'dimanche_fermer');

      // ADD SECTION --------
      add_settings_section(
        self::SECTION_TIMETABLE,                     // SLUG_SECTION
        'Les heures d\'ouverture',                              // TITLE
        [self::class, 'display_section_timetable'],  // CALLBACK
        self::SUB_GROUP
      );

      // ADD FIELD ----------
      add_settings_field(
        'heure_lundi',                                    // SLUG_FIELD
        'Lundi',                                          // LABEL
        [self::class,'field_heure_lundi_tablebouddha'],   // CALLBACK
        self::SUB_GROUP ,                                 // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_mardi',                                    // SLUG_FIELD
        'Mardi',                                          // LABEL
        [self::class,'field_heure_mardi_tablebouddha'],   // CALLBACK
        self::SUB_GROUP ,                                 // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_mercredi',                                  // SLUG_FIELD
        'Mercredi',                                        // LABEL
        [self::class,'field_heure_mercredi_tablebouddha'], // CALLBACK
        self::SUB_GROUP ,                                  // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_jeudi',                                    // SLUG_FIELD
        'Jeudi',                                          // LABEL
        [self::class,'field_heure_jeudi_tablebouddha'],   // CALLBACK
        self::SUB_GROUP ,                                 // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_vendredi',                                    // SLUG_FIELD
        'Vendredi',                                          // LABEL
        [self::class,'field_heure_vendredi_tablebouddha'],   // CALLBACK
        self::SUB_GROUP ,                                   // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_samedi',                                    // SLUG_FIELD
        'Samedi',                                          // LABEL
        [self::class,'field_heure_samedi_tablebouddha'],   // CALLBACK
        self::SUB_GROUP ,                                  // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

      add_settings_field(
        'heure_dimanche',                                  // SLUG_FIELD
        'Dimanche',                                        // LABEL
        [self::class,'field_heure_dimanche_tablebouddha'], // CALLBACK
        self::SUB_GROUP ,                                  // SLUG_PAGE
        self::SECTION_TIMETABLE
      );

    }

   /**
    * 6 - DEFINIR LES SECTIONS DE LA PAGE
    */
    public static function display_section_timetable(){
      ?>
        Section dédiée uniquement aux heures d'ouverture
      <?php
    }


   /**
    * 7 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
    */
    public static function field_heure_lundi_tablebouddha(){
      $lundi_mide_de = esc_attr(get_option('lundi_mide_de'));
      $lundi_mide_a  = esc_attr(get_option('lundi_mide_a'));
      $lundi_soir_de = esc_attr(get_option('lundi_soir_de'));
      $lundi_soir_a  = esc_attr(get_option('lundi_soir_a'));
      $lundi_fermer  = esc_attr(get_option('lundi_fermer'));

      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="lundi_mide_de"
                   name="lundi_mide_de"
                   value="<?php echo $lundi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="lundi_mide_a"
                   name="lundi_mide_a"
                   value="<?php echo $lundi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="lundi_soir_de"
                   name="lundi_soir_de"
                   value="<?php echo $lundi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="lundi_soir_a"
                   name="lundi_soir_a"
                   value="<?php echo $lundi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="lundi_fermer"
                   name="lundi_fermer"
                   value="1"
                   <?php checked(1, $lundi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_mardi_tablebouddha(){
      $mardi_mide_de = esc_attr(get_option('mardi_mide_de'));
      $mardi_mide_a  = esc_attr(get_option('mardi_mide_a'));
      $mardi_soir_de = esc_attr(get_option('mardi_soir_de'));
      $mardi_soir_a  = esc_attr(get_option('mardi_soir_a'));
      $mardi_fermer  = esc_attr(get_option('mardi_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="mardi_mide_de"
                   name="mardi_mide_de"
                   value="<?php echo $mardi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="mardi_mide_a"
                   name="mardi_mide_a"
                   value="<?php echo $mardi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="mardi_soir_de"
                   name="mardi_soir_de"
                   value="<?php echo $mardi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="mardi_soir_a"
                   name="mardi_soir_a"
                   value="<?php echo $mardi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="mardi_fermer"
                   name="mardi_fermer"
                   value="1"
                   <?php checked(1, $mardi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_mercredi_tablebouddha(){
      $mercredi_mide_de = esc_attr(get_option('mercredi_mide_de'));
      $mercredi_mide_a  = esc_attr(get_option('mercredi_mide_a'));
      $mercredi_soir_de = esc_attr(get_option('mercredi_soir_de'));
      $mercredi_soir_a  = esc_attr(get_option('mercredi_soir_a'));
      $mercredi_fermer  = esc_attr(get_option('mercredi_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="mercredi_mide_de"
                   name="mercredi_mide_de"
                   value="<?php echo $mercredi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="mercredi_mide_a"
                   name="mercredi_mide_a"
                   value="<?php echo $mercredi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="mercredi_soir_de"
                   name="mercredi_soir_de"
                   value="<?php echo $mercredi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="mercredi_soir_a"
                   name="mercredi_soir_a"
                   value="<?php echo $mercredi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="mercredi_fermer"
                   name="mercredi_fermer"
                   value="1"
                   <?php checked(1, $mercredi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_jeudi_tablebouddha(){
      $jeudi_mide_de = esc_attr(get_option('jeudi_mide_de'));
      $jeudi_mide_a  = esc_attr(get_option('jeudi_mide_a'));
      $jeudi_soir_de = esc_attr(get_option('jeudi_soir_de'));
      $jeudi_soir_a  = esc_attr(get_option('jeudi_soir_a'));
      $jeudi_fermer  = esc_attr(get_option('jeudi_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="jeudi_mide_de"
                   name="jeudi_mide_de"
                   value="<?php echo $jeudi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="jeudi_mide_a"
                   name="jeudi_mide_a"
                   value="<?php echo $jeudi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="jeudi_soir_de"
                   name="jeudi_soir_de"
                   value="<?php echo $jeudi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="jeudi_soir_a"
                   name="jeudi_soir_a"
                   value="<?php echo $jeudi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="jeudi_fermer"
                   name="jeudi_fermer"
                   value="1"
                   <?php checked(1, $jeudi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_vendredi_tablebouddha(){
      $vendredi_mide_de = esc_attr(get_option('vendredi_mide_de'));
      $vendredi_mide_a  = esc_attr(get_option('vendredi_mide_a'));
      $vendredi_soir_de = esc_attr(get_option('vendredi_soir_de'));
      $vendredi_soir_a  = esc_attr(get_option('vendredi_soir_a'));
      $vendredi_fermer  = esc_attr(get_option('vendredi_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="vendredi_mide_de"
                   name="vendredi_mide_de"
                   value="<?php echo $vendredi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="vendredi_mide_a"
                   name="vendredi_mide_a"
                   value="<?php echo $vendredi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="vendredi_soir_de"
                   name="vendredi_soir_de"
                   value="<?php echo $vendredi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="vendredi_soir_a"
                   name="vendredi_soir_a"
                   value="<?php echo $vendredi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="vendredi_fermer"
                   name="vendredi_fermer"
                   value="1"
                   <?php checked(1, $vendredi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_samedi_tablebouddha(){
      $samedi_mide_de = esc_attr(get_option('samedi_mide_de'));
      $samedi_mide_a  = esc_attr(get_option('samedi_mide_a'));
      $samedi_soir_de = esc_attr(get_option('samedi_soir_de'));
      $samedi_soir_a  = esc_attr(get_option('samedi_soir_a'));
      $samedi_fermer  = esc_attr(get_option('samedi_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="samedi_mide_de"
                   name="samedi_mide_de"
                   value="<?php echo $samedi_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="samedi_mide_a"
                   name="samedi_mide_a"
                   value="<?php echo $samedi_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="samedi_soir_de"
                   name="samedi_soir_de"
                   value="<?php echo $samedi_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="samedi_soir_a"
                   name="samedi_soir_a"
                   value="<?php echo $samedi_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="samedi_fermer"
                   name="samedi_fermer"
                   value="1"
                   <?php checked(1, $samedi_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

    public static function field_heure_dimanche_tablebouddha(){
      $dimanche_mide_de = esc_attr(get_option('dimanche_mide_de'));
      $dimanche_mide_a  = esc_attr(get_option('dimanche_mide_a'));
      $dimanche_soir_de = esc_attr(get_option('dimanche_soir_de'));
      $dimanche_soir_a  = esc_attr(get_option('dimanche_soir_a'));
      $dimanche_fermer  = esc_attr(get_option('dimanche_fermer'));
      ?>
        <div class="">
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="dimanche_mide_de"
                   name="dimanche_mide_de"
                   value="<?php echo $dimanche_mide_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="dimanche_mide_a"
                   name="dimanche_mide_a"
                   value="<?php echo $dimanche_mide_a ?>"
            />
          </p>
          <p>
            <span class="space">de</span>
            <input type="time"
                   id="dimanche_soir_de"
                   name="dimanche_soir_de"
                   value="<?php echo $dimanche_soir_de ?>"
            />
            <span class="space">à</span>
            <input type="time"
                   id="dimanche_soir_a"
                   name="dimanche_soir_a"
                   value="<?php echo $dimanche_soir_a ?>"
            />
          </p>
          <p>
            <input type="checkbox"
                   id="dimanche_fermer"
                   name="dimanche_fermer"
                   value="1"
                   <?php checked(1, $dimanche_fermer, true) ?>
            />
            <span>Jour de fermeture</span>
          </p>
        </div>
      <?php
    }

}
