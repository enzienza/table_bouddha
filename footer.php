<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */


?>


<div class="footer-info">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-12 block-location">
        <h2>Coordonnées</h2>
        <div class="row block-logo">
          <div class="col-2">

            <img class="logo"
                 src="<?php echo get_template_directory_uri().'/assets/img/logo-grey.png' ?>"
                 alt=""
            />

          </div>
          <div class="col blog-address">
            <p class="title">
              <?php bloginfo('title'); ?>
            </p>
            <p class="address">
              <?php echo get_option('adresse') ?>
            </p>
            <p><?php echo get_option('phone') ?></p>

            <?php if(checked(1, get_option('yes_facebook'), false)) : ?>
              <a href="<?php echo(get_option('url_facebook')); ?>" target="_blank">
                <span class="icons flaticon-facebook"></span>
              </a>
            <?php endif ?>

            <?php if(checked(1, get_option('yes_instagram'), false)) : ?>
              <a href="<?php echo(get_option('url_instagram')); ?>" target="_blank">
                <span class="icons flaticon-instagram"></span>
              </a>
            <?php endif ?>

            <?php if(checked(1, get_option('yes_twitter'), false)) : ?>
              <a href="<?php echo(get_option('url_twitter')); ?>" target="_blank">
                <span class="icons flaticon-twitter"></span>
              </a>
            <?php endif ?>


          </div>
        </div>
      </div>


      <div class="col-md-4 col-12 block-link">
        <h2>Liens utiles</h2>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'navbar-nav mr-auto'
          ]);
         ?>
      </div>
      <div class="col-md-4 col-12 block-timetable">
        <h2>Horaires</h2>
        <?php get_template_part('parts/footer/horaire'); ?>
      </div>
    </div>
  </div>
</div>


<a href="#" class="scrollTop">
  <span class="icons flaticon-up"></span>
</a><!-- /.scrollTop -->

<footer role="contentinfo">
  <?php bloginfo('name') ?> ©2020 |
  <!-- Designed by <a href="http://enzalombardo.be" target="_blank">Enza Lombardo</a> -->
  Created by <a href="http://www.enzalombardo.be/" target="_blank">Enza Lombardo</a>
</footer>


<?php wp_footer(); ?>
</body>
</html>
