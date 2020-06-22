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
// require_once('inc/customize/column-cartes');


/**
 * 2 - Options-Theme
 * Directory about option of theme
 */
require_once('inc/options-theme/generality.php');
tablebouddha_generality::register();

require_once('inc/options-theme/horaire.php');
tablebouddha_timetable::register();


/**
 * 3 - Post-Type
 * Directory about Custom Post Types created for theme
 */
require_once('inc/post-type/cartes.php');
require_once('inc/post-type/boissons.php');
require_once('inc/post-type/emporters.php');


/**
 * 4 - Metaboxes
 * Directory about metaboxes created for theme
 */
 // require_once('inc/metaboxes/nom.php');
 // MB_Nom::register();


/**
 * 5 - Taxonomys
 * Directory about taxonomys created for theme
 */
// require_once('inc/taxonomys/nom.php');
