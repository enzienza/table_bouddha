<?php  ?>


<div
  class="tab-pane fade show active"
  id="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
  role="tabpanel"
  aria-labelledby="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
>
  <div class="my-5">
    <?php the_content(); ?>
  </div>
</div>
