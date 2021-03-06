<?php
/**
 * theme functionality files
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */


/**
 * *** INDEX ***
 *
 * 1 - Customize
 * 2 - Options-Theme
 * 3 - Post-Type
 * 4 - Metaboxes
 * 5 - Taxonomys
 *
 */


/**
 * 1 - Customize
 * Directory about customize of theme
 */
require_once('inc/customize/config.php');
require_once('inc/customize/config-admin.php');
require_once('inc/customize/custom-dashboard.php');
require_once('inc/customize/custom-column.php');

/**
 * 2 - Options-Theme
 * Directory about option of theme
 */
require_once('inc/options-theme/generality.php');
tablebouddha_generality::register();

require_once('inc/options-theme/horaire.php');
tablebouddha_timetable::register();

require_once('inc/options-theme/custom-theme.php');
tablebouddha_customtheme::register();

require_once('inc/options-theme/custom-homepage.php');
tablebouddha_custom_homepage::register();

require_once('inc/options-theme/custom-cartepage.php');
tablebouddha_custom_cartepage::register();

require_once('inc/options-theme/custom-drinkpage.php');
tablebouddha_custom_drinkpage::register();

require_once('inc/options-theme/custom-takeawaypage.php');
tablebouddha_custom_takeawaypage::register();

require_once('inc/options-theme/custom-eventpage.php');
tablebouddha_custom_eventpage::register();

require_once('inc/options-theme/custom-errorpage.php');
tablebouddha_custom_errorpage::register();

/**
 * 3 - Post-Type
 * Directory about Custom Post Types created for theme
 */
require_once('inc/post-type/cartes.php');
require_once('inc/post-type/boissons.php');
require_once('inc/post-type/emporters.php');
require_once('inc/post-type/evenements.php');

/**
 * 4 - Metaboxes
 * Directory about metaboxes created for theme
 */
require_once('inc/metaboxes/flaticons.php');
MB_use_faticons::register();

require_once('inc/metaboxes/info-event.php');
MB_info_event::register();

require_once('inc/metaboxes/view_section.php');
MB_view_section::register();

/**
 * 5 - Taxonomys
 * Directory about taxonomys created for theme
 */
// require_once('inc/taxonomys/nom.php');
