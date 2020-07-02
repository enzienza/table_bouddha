<?php
/**
 * Template Name: cartes
 *
 * The template for displaying for post-type cartes
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>


<?php get_header(); ?>

<?php
  /**
   * SI 'yes_hero_cartepage' checked = 1
   * ==> Afficher image en background
   */
?>
<?php if(checked(1, get_option('yes_hero_cartepage'), false)){ ?>
  <section class="hero" style="background-image: url(<?php echo get_option('add_hero_cartepage') ?>)">
    <div class="filter">
      <?php if(checked(1, get_option('yex_message_cartepage'), false)){ ?>
        <div class="jumb-message container">
          <h1 class="msg-title"><?php echo get_option('title_hero_cartepage'); ?></h1>
          <p class="msg-text">
            <?php echo get_option('text_hero_cartepage'); ?>
          </p>
        </div>
      <?php } else { ?>
        <?php
          if(
            (checked(1, get_option('view_logo_cartepage'), false)) &&
            (checked(1, get_option('view_namesite_cartepage'), false))
          ){
        ?>
          <div class="jumbtitle">
            <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="">
            <h1><?php bloginfo('title'); ?></h1>
          </div>
        <?php } elseif(checked(1, get_option('view_logo_cartepage'), false)){ ?>
          <div class="jumbtitle">
            <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="">
          </div>
        <?php } elseif(checked(1, get_option('view_namesite_cartepage'), false)){ ?>
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
   * SI 'hidden_info_cartepage' checked = 0
   * ==> Afficher <section.info-page>
   */
?>

<?php if(checked(1, get_option('hidden_info_cartepage'), false)){ ?>
  <section class="info-page container" style="padding-top:5%">
    <h1><?php echo get_option('title_info_cartepage'); ?></h1>
    <p class="flip">
      <span class="deg1"></span>
      <span class="deg2"></span>
      <span class="deg3"></span>
    </p>
  </section>
<?php } else { ?>
  <section class="info-page container">
    <div class="row">
      <div class="col-md-8 col-12">
        <h1><?php echo get_option('title_info_cartepage'); ?></h1>
        <p class="flip">
          <span class="deg1"></span>
          <span class="deg2"></span>
          <span class="deg3"></span>
        </p>
        <p class="info-text">
          <?php echo get_option('text_info_cartepage'); ?>
        </p>
      </div>
      <div class="col-md-4 col-12 img-info">
        <img src="<?php echo get_option('image_info_cartepage') ?>" class="" alt="">
      </div>
    </div>
  </section>
<?php } ?>


<?php
  /**
   * Filtre / tabs
   */
?>
<section class="container my-5">

  <ul class="nav nav-tabs">


    <?php
        wp_reset_postdata();

        $args = array(
            'post_type'      => 'cartes',
            'posts_per_page' => -1,
            'orderby'        => 'id',
            'order'          => 'ASC'
        );
        $my_query = new WP_query($args);
        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
     ?>
    <?php get_template_part('parts/nav-tabs'); ?>

    <?php endwhile; endif;  wp_reset_postdata(); ?>
  </ul>

  <?php
    /**
     * tab-content
     */
  ?>
  <div class="tab-content" id="myTabContent">
    <!-- <div class="tab-content"> -->
    <?php
      // wp_reset_postdata();
      //
      // $args = array(
      //     'post_type'      => 'cartes',
      //     'posts_per_page' => -1,
      //     'orderby'        => 'id',
      //     'order'          => 'ASC'
      // );
      // $my_query = new WP_query($args);
      // if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
    ?>
      <?php //get_template_part('parts/tab-content'); ?>
      <?php //endwhile; endif;  wp_reset_postdata(); ?>
  </div><!-- /.tab-content -->


</section>


<?php
  /**
   * SI 'hidden_boocking_cartepage' checked = 0
   * ==> Afficher section.booking
   */
?>
<?php if(checked(1, get_option('hidden_booking_cartepage'), false)){ ?>
  <section></section>
<?php } else { ?>
  <section class="revervation">
    <ul>
      <?php if(checked(1, get_option('view_icon_cartepage'), false)){ ?>
        <li>
          <span class="icons flaticon-reservation"></span>
        </li>
      <?php } ?>
      <li class="booking">
        <p class="booking-text">
          <?php echo get_option('texte_booking_cartepage'); ?>
        </p>
        <?php if(checked(1, get_option('view_phone_cartepage'), false)){ ?>
          <p class="booking-phone">
            <?php echo get_option('phone'); ?>
          </p>
        <?php } ?>
      </li>
    </ul>
  </section>
<?php } ?>

<?php get_footer(); ?>
