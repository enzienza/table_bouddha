<?php
/**
 * Loads 'card' template-part on page "page-evenements"
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>

<div class="col-lg-4 col-md-6 col-12 my-3">
  <a href="<?php the_permalink(); ?>">
    <div class="card card-event">
      <div class="card-image-top">
        <img src="<?php the_post_thumbnail_url(); ?>"
             alt="<?php the_title(); ?>"
        />
      </div>
      <div class="card-body">
        <h3 class="card-title">
          <?php the_title(); ?>
        </h3>
        <ul class="block-info">
    			<li class="item-info-event">
    				<span class="icons flaticon-calendar-1"></span>
    				<p>
    					<?php
                $date = get_post_meta(get_the_ID(), 'date_event', true);
                if($date != ''){echo date_i18n("j M Y", strtotime($date));}
              ?>
    				</p>
    			</li>
    			<li class="item-info-event">/</li>
    			<li class="item-info-event">
    				<span class="icons flaticon-time"></span>
    				<p>
    					<?php echo get_post_meta(get_the_ID(), 'heure_event', true); ?>
    				</p>
    			</li>
    		</ul>
        <p class="btn">
          Voir detail
        </p>
      </div>
    </div>
  </a>
</div>
