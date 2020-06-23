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

<div class="container my-5">

  <h1 class="title-page">
    Nos boissons
  </h1>

  <!--ul class="nav nav-tabs">


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
  </ul-->


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


</div>

<?php get_footer(); ?>
