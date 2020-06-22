<?php  ?>




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
    <i></i>
    <?php the_title(); ?>
  </a>
</li>
