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
      <div class="col-md-4 col-12">
        <h2>Coordonne</h2>
        <div class="row block-logo">
          <div class="col-2">

            <img class="logo"
                 src="<?php echo get_template_directory_uri().'/assets/img/logo-grey.png' ?>"
                 alt=""
            >

          </div>
          <div class="col blog-address">
            <p class="title">
              <?php bloginfo('title'); ?>
            </p>
            <p class="address">
              <?php echo get_option('adresse') ?>
            </p>
            <p><?php echo get_option('phone') ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <h2>Lien utile</h2>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'navbar-nav mr-auto'
          ]);
         ?>
      </div>
      <div class="col-md-4 col-12">
        <h2>horaire</h2>
        <?php get_template_part('parts/footer/horaire'); ?>
      </div>
    </div>
  </div>
</div>


<footer role="contentinfo">
  <?php bloginfo('name') ?> ©2020 |
  <!-- Designed by <a href="http://enzalombardo.be" target="_blank">Enza Lombardo</a> -->
  Created by <a href="http://www.enzalombardo.be/" target="_blank">Enza Lombardo</a>
</footer>
<?php wp_footer(); ?>
</body>
</html>
