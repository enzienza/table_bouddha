<?php
/**
 * Loads 'nav-tabs' template-part on pages :
 * page-cartes | page-boissons | page-emporters
 *
 * @package WordPress
 * @subpackage tablebouddha
 * @since 2.0
 */
?>




<li class="nav-item">
  <a
    class="nav-link"
    id="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
    data-toggle="tab"
    href="#<?php $title = sanitize_title(get_the_title()); echo $title;?>"
    role="tab"
    aria-controls="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
    aria-selected="true"
  >
    <p class="item-icon"><i class="icons <?php echo get_post_meta(get_the_ID(), MB_use_faticons::META_KEY, true); ?>"></i></p>
    <p class="item-name"><?php the_title(); ?></p>
  </a>
</li>
