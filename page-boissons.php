<?php
/**
 * Template Name: boissons
 *
 * The template for displaying for post-type boissons
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>


<?php get_header(); ?>
<?php
  /**
   * SI 'yes_hero_drinkpage' checked = 1
   * ==> Afficher image en background
   */
?>
<?php if(checked(1, get_option('yes_hero_drinkpage'), false)){ ?>
  <section class="hero" style="background-image: url(<?php echo get_option('add_hero_drinkpage') ?>)">
    <div class="filter">
      <?php if(checked(1, get_option('yex_message_drinkpage'), false)){ ?>
        <div class="jumb-message container">
          <h1 class="msg-title">
            <?php echo get_option('title_hero_drinkpage'); ?>
          </h1>
          <p class="msg-text">
            <?php echo get_option('text_hero_drinkpage'); ?>
          </p>
        </div>
      <?php } else { ?>
        <?php
          if(
            (checked(1, get_option('view_logo_drinkpage'), false)) &&
            (checked(1, get_option('view_namesite_drinkpage'), false))
          ){
        ?>
          <div class="jumb-hero">
            <img src="<?php echo get_option('img_logo') ?>"
                 class="logo"
                 alt="<?php bloginfo('title') ?>"
            />
            <h1>
              <?php bloginfo('title'); ?>
            </h1>
          </div>
        <?php } elseif(checked(1, get_option('view_logo_drinkpage'), false)){ ?>
          <div class="jumb-hero">
            <img src="<?php echo get_option('img_logo') ?>"
                 class="logo logo-center"
                 alt="<?php bloginfo('title') ?>"
            />
          </div>
        <?php } elseif(checked(1, get_option('view_namesite_drinkpage'), false)){ ?>
          <div class="jumb-hero">
            <h1 class="title-center">
              <?php bloginfo('title'); ?>
            </h1>
          </div>
        <?php } ?>



      <?php } ?>
    </div>
  </section>

<?php } else { ?>
  <section class="hero" style="background-image: url()">
    <div class="filter">
      <div class="jumb-hero">
        <img src="<?php echo get_option('img_logo') ?>"
             class="logo"
             alt="<?php bloginfo('title'); ?>"
        />
        <h1>
          <?php bloginfo('title'); ?>
        </h1>
      </div>
    </div>
  </section>
<?php } ?>

<?php if(checked(1, get_option('hidden_info_drinkpage'), false)){ ?>
  <section class="info-page title-info container">
    <h1>
      <?php echo get_option('title_info_drinkpage'); ?>
    </h1>
    <p class="flip flip-large">
      <span class="deg1"></span>
      <span class="deg2"></span>
      <span class="deg3"></span>
    </p>
  </section>
<?php } else { ?>
  <section class="info-page container">
    <div class="row box-mobile">
      <div class="col-md-8 col-12">
        <h1>
          <?php echo get_option('title_info_drinkpage'); ?>
        </h1>
        <p class="flip flip-large">
          <span class="deg1"></span>
          <span class="deg2"></span>
          <span class="deg3"></span>
        </p>
        <p class="info-text">
          <?php echo get_option('text_info_drinkpage'); ?>
        </p>
      </div>
      <div class="col-md-4 col-12 img-info invisible">
        <img src="<?php echo get_option('image_info_drinkpage') ?>"
             class=""
             alt=""
        />
      </div>
    </div>
  </section>
<?php } ?>


<?php
  /**
   * Filtre / tabs
   */
?>
<section class="container main-drinkpage my-5">

  <ul class="nav nav-tabs">


    <?php
        wp_reset_postdata();

        $args = array(
            'post_type'      => 'boissons',
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
  <!-- <div class="tab-content" id="myTabContent"> -->
  <div class="tab-content">
    <?php
      wp_reset_postdata();

      $args = array(
          'post_type'      => 'boissons',
          'posts_per_page' => -1,
          'orderby'        => 'id',
          'order'          => 'ASC'
      );
      $my_query = new WP_query($args);
      if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
     ?>
        <?php get_template_part('parts/tab-content'); ?>
      <?php endwhile; endif;  wp_reset_postdata(); ?>
  </div><!-- /.tab-content -->


</section>


<?php
/**
 * SI 'hidden_boocking_drinkpage' checked = 0
 * ==> Afficher section.booking
 */
?>
<?php if(checked(1, get_option('hidden_booking_drinkpage'), false)){ ?>
  <section></section>
<?php } else { ?>
  <section class="revervation">
    <ul>
      <?php if(checked(1, get_option('view_icon_drinkpage'), false)){ ?>
        <li>
          <span class="icons flaticon-reservation"></span>
        </li>
      <?php } ?>
      <li class="booking">
        <p class="booking-text">
          <?php echo get_option('texte_booking_drinkpage'); ?>
        </p>
        <?php if(checked(1, get_option('view_phone_drinkpage'), false)){ ?>
          <p class="booking-phone">
            <?php echo get_option('phone'); ?>
          </p>
        <?php } ?>
      </li>
    </ul>
  </section>
<?php } ?>


<?php get_footer(); ?>
