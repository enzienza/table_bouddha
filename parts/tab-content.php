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



<div
  class="tab-pane fade container"
  id="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
  role="tabpanel"
  aria-labelledby="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
>
  <div class="">
    <?php the_content(); ?>
  </div>
</div>
