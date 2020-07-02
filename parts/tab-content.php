<?php  ?>


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
