<?php
/**
 * Template Name: evenements
 *
 * The template for displaying for post-type emporters
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>


<?php get_header(); ?>

<?php
  /**
   * SI 'yes_hero_eventpage' checked = 1
   * ==> Afficher image en background
   */
?>
<?php if(checked(1, get_option('yes_hero_eventpage'), false)){ ?>
  <section class="hero" style="background-image: url(<?php echo get_option('add_hero_eventpage') ?>)">
    <div class="filter">
      <?php if(checked(1, get_option('yex_message_eventpage'), false)){ ?>
        <div class="jumb-message container">
          <h1 class="msg-title"><?php echo get_option('title_hero_eventpage'); ?></h1>
          <p class="msg-text">
            <?php echo get_option('text_hero_eventpage'); ?>
          </p>
        </div>
      <?php } else { ?>
        <?php
          if(
            (checked(1, get_option('view_logo_eventpage'), false)) &&
            (checked(1, get_option('view_namesite_eventpage'), false))
          ){
        ?>
          <div class="jumbtitle">
            <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="">
            <h1><?php bloginfo('title'); ?></h1>
          </div>
        <?php } elseif(checked(1, get_option('view_logo_eventpage'), false)){ ?>
          <div class="jumbtitle">
            <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="">
          </div>
        <?php } elseif(checked(1, get_option('view_namesite_eventpage'), false)){ ?>
          <div class="jumbtitle">
            <h1><?php bloginfo('title'); ?></h1>
          </div>
        <?php } ?>



      <?php } ?>
    </div>
  </section>
<?php } else { ?>
  <section class="hero" style="background-image: url()">
    <div class="filter">
      <div class="jumbtitle">
        <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="">
        <h1><?php bloginfo('title'); ?></h1>
      </div>
    </div>
  </section>
<?php } ?>


<?php
/**
 * SI 'hidden_info_eventpage' checked = 0
 * ==> Afficher la section
 */
?>
<?php if(checked(1, get_option('hidden_info_eventpage'), false)){ ?>
  <section class="info-page container" style="padding-top:5%">
    <h1>
      <?php echo get_option('title_info_eventpage'); ?>
    </h1>
    <p class="flip flip-medium">
      <span class="deg1"></span>
      <span class="deg2"></span>
      <span class="deg3"></span>
    </p>
  </section>
<?php } else { ?>
  <section class="info-page container">
    <div class="row">
      <div class="col-md-8 col-12">
        <h1>
          <?php echo get_option('title_info_eventpage'); ?>
        </h1>
        <p class="flip flip-medium">
          <span class="deg1"></span>
          <span class="deg2"></span>
          <span class="deg3"></span>
        </p>
        <p class="info-text">
          <?php echo get_option('text_info_eventpage'); ?>
        </p>
      </div>
      <div class="col-md-4 col-12 img-info">
        <img src="<?php echo get_option('image_info_eventpage') ?>" class="" alt="">
      </div>
    </div>
  </section>
<?php } ?>


<?php
  /**
   * MAIN ==> CPT_emporter
   */
?>
<div class="container my-5">

</div>


<?php
/**
 * SI 'hidden_boocking_eventpage' checked = 0
 * ==> Afficher section.booking
 */
?>
<?php if(checked(1, get_option('hidden_booking_eventpage'), false)){ ?>
  <section></section>
<?php } else { ?>
  <section class="revervation">
    <ul>
      <?php if(checked(1, get_option('view_icon_eventpage'), false)){ ?>
        <li>
          <span class="icons flaticon-reservation"></span>
        </li>
      <?php } ?>
      <li class="booking">
        <p class="booking-text">
          <?php echo get_option('texte_booking_eventpage'); ?>
        </p>
        <?php if(checked(1, get_option('view_phone_eventpage'), false)){ ?>
          <p class="booking-phone">
            <?php echo get_option('phone'); ?>
          </p>
        <?php } ?>
      </li>
    </ul>
  </section>
<?php } ?>


<?php get_footer(); ?>
