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


class tablebouddha_option{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   * afin d'evite les fautes de frappe
   */
  // page info - level
  const SUB2_TITLE  = 'Option Theme';
  const SUB2_MENU   = 'Option Theme';
  const PERMITION   = 'manage_options';
  const SUB2_GROUP  = 'option_tablebouddha';

  // definit les section
  // const SECTION_TIMETABLE = 'section_horaire_tablebouddha';

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
       self::SUB2_TITLE,                    // page_title
       self::SUB2_MENU,                     // menu_title
       self::PERMITION,                    // capability
       self::SUB2_GROUP,                    // slug_menu
       [self::class, 'render']             // CALLBACK
     );
   }

  /**
   * 4 - TEMPLATE DES PAGES
   */
   public static function render(){
     ?>
       <div class="wrap">
         <h1 class="wp-heagin-inline">Option du Thème</h1>
         <p class="description">
           Sur cette page vous pouvez gérer les heures
           d'ouverture du restaurant
         </p>
       </div>
       <form class="form-timetable" action="options.php" method="post" enctype="multipart/form-data">
         <?php settings_fields(self::SUB2_GROUP); ?>
         <?php do_settings_sections(self::SUB2_GROUP); ?>
         <?php submit_button(); ?>
       </form>
     <?php
   }

  /**
   * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
   */
  public static function registerSettings(){
    
  }

  /**
   * 6 - DEFINIR LES SECTIONS DE LA PAGE
   */


  /**
   * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
   *     le fichier sera stocké dans le dossier upload
   */


  /**
   * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
   */
}
