<?php
/**
 * The display model for a single event
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>


<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="hero" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
	<div class="filter">
		<h1 class="big-title">
			<?php the_title(); ?>
		</h1>

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
	</div>
</section>

<section class="container my-5 text-center">
	<div class="row">
		<div class="col-12 single-event">
			<?php the_content(); ?>
		</div>
	</div>
</section>



<?php if(get_post_meta(get_the_ID(), MB_view_section::META_KEY, true) === '1') : ?>
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
<?php endif ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
