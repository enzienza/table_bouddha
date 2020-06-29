<?php
/**
 * The front page template file
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>

<?php get_header(); ?>


<?php
/**
 * SI 'yes_video' checked = 1
 * ==> Afficher video en background
 */
 ?>
<?php if(checked(1, get_option('yes_video'), false)) { ?>
  <section id="bg-video">
    <?php if(checked(1, get_option('sound_video'), false)){ ?>
      <video autoplay loop id="video-background">
        <source src="<?php echo get_option('add_video'); ?>" type="video/mp4">
        <source src="<?php echo get_option('add_video'); ?>" type="video/ogg">
      </video>
    <?php } else { ?>
      <video autoplay loop muted id="video-background">
        <source src="<?php echo get_option('add_video'); ?>" type="video/mp4">
        <source src="<?php echo get_option('add_video'); ?>" type="video/ogg">
      </video>
    <?php } ?>

    <div class="filter">
      <?php if(checked(1, get_option('yes_message_video'), false)){ ?>
        <div class="container" style="padding-top:5%">
          <div class="row jumbtitle">
            <?php
              if(
                (checked(1, get_option('view_logo_video'), false)) &&
                (checked(1, get_option('view_namesite_video'), false))
              ){
            ?>
              <div class="col-md-3 col-12">
                <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>" style="padding-top:10%; width: 14em;" >
                <h1 class="small-title">
                  <?php bloginfo('title'); ?>
                </h1>
              </div>
              <div class="col-md-9 col-12 view-message">
                <?php echo get_option('message_video'); ?>
              </div>
            <?php } elseif(checked(1, get_option('view_logo_video'), false)) { ?>
              <div class="col-md-3 col-12">
                <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>" style="padding-top:10%; width: 14em;" >
              </div>
              <div class="col-md-9 col-12 view-message">
                <?php echo get_option('message_video'); ?>
              </div>
            <?php } elseif(checked(1, get_option('view_namesite_video'), false)){ ?>
              <div class="col-md-3 col-12" style="padding-top:15%">
                <h1 class="small-title">
                  <?php bloginfo('title'); ?>
                </h1>
              </div>
              <div class="col-md-9 col-12 view-message" style="padding-top:15%">
                <?php echo get_option('message_video'); ?>
              </div>
            <?php } else { ?>
              <div class="col-12 view-message" style="padding-top:15%">
                <?php echo get_option('message_video'); ?>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php
        } elseif(
          (checked(1, get_option('view_logo_video'), false)) &&
          (checked(1, get_option('view_namesite_video'), false))
        ) {
      ?>
        <div class="jumbtitle">
          <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>">
          <h1><?php bloginfo('title'); ?></h1>
        </div>
      <?php } elseif(checked(1, get_option('view_logo_video'), false)){ ?>
        <div class="jumbtitle">
          <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>">
        </div>
      <?php } elseif(checked(1, get_option('view_namesite_video'), false)) {?>
        <div class="jumbtitle">
          <h1 style="padding-top:15%"><?php bloginfo('title'); ?></h1>
        </div>
      <?php } ?>
    </div>


    <div class="info-contact">
      <?php
        if (
          (checked(1, get_option('view_address_video'), false)) &&
          (checked(1, get_option('view_phone_video'), false))
        ){
      ?>
        <ul>
          <li class="item-info-contact">
            <span class="icons flaticon-localization"></span>
            <p><?php echo get_option('adresse') ?></p>
          </li>
          <li class="item-info-contact">
            <p> | </p>
          </li>
          <li class="item-info-contact">
            <span class="icons flaticon-phone"></span>
            <p><?php echo get_option('phone') ?></p>
          </li>
        </ul>

      <?php } elseif (checked(1, get_option('view_address_video'), false)) { ?>
        <ul>
          <li class="item-info-contact">
            <span class="icons flaticon-localization"></span>
            <p><?php echo get_option('adresse') ?></p>
          </li>
        </ul>
      <?php } elseif (checked(1, get_option('view_phone_video'), false)) { ?>
        <ul>
          <li class="item-info-contact">
            <span class="icons flaticon-phone"></span>
            <p><?php echo get_option('phone') ?></p>
          </li>
        </ul>
      <?php } ?>
    </div>
  </section>

<?php } elseif(checked(1, get_option('yes_image'), false)){ ?>
<section id="bg-image" style="background-image: url(<?php echo get_option('add_image') ?>)">
  <div class="filter">
    <?php if(checked(1, get_option('yes_message_image'), false)){ ?>
      <div class="container" style="padding-top:5%">
        <div class="row jumbtitle">
          <?php
            if(
              (checked(1, get_option('view_logo_image'), false)) &&
              (checked(1, get_option('view_namesite_image'), false))
            ){
          ?>
            <div class="col-md-3 col-12">
              <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>" style="padding-top:10%; width: 14em;" >
              <h1 class="small-title">
                <?php bloginfo('title'); ?>
              </h1>
            </div>
            <div class="col-md-9 col-12 view-message">
              <?php echo get_option('message_image'); ?>
            </div>
          <?php } elseif(checked(1, get_option('view_logo_image'), false)) { ?>
            <div class="col-md-3 col-12">
              <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>" style="padding-top:10%; width: 14em;" >
            </div>
            <div class="col-md-9 col-12 view-message">
              <?php echo get_option('message_image'); ?>
            </div>
          <?php } elseif(checked(1, get_option('view_namesite_image'), false)){ ?>
            <div class="col-md-3 col-12" style="padding-top:15%">
              <h1 class="small-title">
                <?php bloginfo('title'); ?>
              </h1>
            </div>
            <div class="col-md-9 col-12 view-message" style="padding-top:15%">
              <?php echo get_option('message_image'); ?>
            </div>
          <?php } else { ?>
            <div class="col-12 view-message" style="padding-top:15%">
              <?php echo get_option('message_image'); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php
      } elseif(
        (checked(1, get_option('view_logo_image'), false)) &&
        (checked(1, get_option('view_namesite_image'), false))
      ) {
    ?>
      <div class="jumbtitle">
        <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>">
        <h1><?php bloginfo('title'); ?></h1>
      </div>
    <?php } elseif(checked(1, get_option('view_logo_image'), false)){ ?>
      <div class="jumbtitle">
        <img src="<?php echo get_option('img_logo') ?>" class="logo" alt="<?php bloginfo('title'); ?>">
      </div>
    <?php } elseif(checked(1, get_option('view_namesite_image'), false)) {?>
      <div class="jumbtitle">
        <h1 style="padding-top:15%"><?php bloginfo('title'); ?></h1>
      </div>
    <?php } ?>
  </div>


  <div class="info-contact">
    <?php
      if (
        (checked(1, get_option('view_address_image'), false)) &&
        (checked(1, get_option('view_phone_image'), false))
      ){
    ?>
      <ul>
        <li class="item-info-contact">
          <span class="icons flaticon-localization"></span>
          <p><?php echo get_option('adresse') ?></p>
        </li>
        <li class="item-info-contact">
          <p> | </p>
        </li>
        <li class="item-info-contact">
          <span class="icons flaticon-phone"></span>
          <p><?php echo get_option('phone') ?></p>
        </li>
      </ul>

    <?php } elseif (checked(1, get_option('view_address_image'), false)) { ?>
      <ul>
        <li class="item-info-contact">
          <span class="icons flaticon-localization"></span>
          <p><?php echo get_option('adresse') ?></p>
        </li>
      </ul>
    <?php } elseif (checked(1, get_option('view_phone_image'), false)) { ?>
      <ul>
        <li class="item-info-contact">
          <span class="icons flaticon-phone"></span>
          <p><?php echo get_option('phone') ?></p>
        </li>
      </ul>
    <?php } ?>
  </div>
</section>
<?php } ?>



<?php //get_footer(); ?>
