<?php
/**
 * This file regroup a link table that allows to manage
 * the display of all pages of theme
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


class tablebouddha_customtheme{
  /**
   * 1 - DEFINIR LES ELEMENTS (repeter)
   * afin d'evite les fautes de frappe
   */
   // page info - level 1
   const INFO_TITLE = 'Custom Theme';
   const INFO_MENU  = 'Custom Theme';
   const PERMITION  = 'manage_options';
   const DASHICON   = 'dashicons-admin-multisite';
   const GROUP      = 'customtheme_tablebouddha';
   const NONCE      = '_customtheme_tablebouddha';


   // definit les section
   // const SECTION_IMG    = 'section_image_tablebouddha';
   // const SECTION_INFO   = 'section_info_tablebouddha';
   // const SECTION_url    = 'section_url_tablebouddha';

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
       3                                   // POSITION
     );
   }

  /**
   * 4 - TEMPLATE DES PAGES
   */
  public static function render(){
    ?>
      <div class="wrap">
        <h1 class="wp-heagin-inline">Personnaliser le theme</h1>
        <p class="description">
          Sur cette page vous pouvez gérer l'affiche du theme
        </p>
      </div>


      <table class="widefat importers striped">

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page d'accueil
            </span>
            <span class="importer-action">
              <a href="?page=custom_homepage" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page d'accueil
            </span>
          </td>
        </tr>

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page cartes
            </span>
            <span class="importer-action">
              <a href="?page=custom_cartepage" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page des cartes
            </span>
          </td>
        </tr>

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page boissons
            </span>
            <span class="importer-action">
              <a href="?page=custom_drinkpage" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page des boissons
            </span>
          </td>
        </tr>

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page emportés
            </span>
            <span class="importer-action">
              <a href="" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page des emportés
            </span>
          </td>
        </tr>

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page événements
            </span>
            <span class="importer-action">
              <a href="" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page des événements
            </span>
          </td>
        </tr>

        <tr class="importer-item">
          <td class="import-system">
            <span class="importer-title">
              Page erreur
            </span>
            <span class="importer-action">
              <a href="" class="install-now">
                Gérer la page
              </a>
            </span>
          </td>
          <td class="desc">
            <span class="importer-desc">
              Lien pour gérer l'affichage de la page d'erreur
            </span>
          </td>
        </tr>

      </table>
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
