<?php

get_header(  );

?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">A Static One</h1>
    <div class="page-banner__intro">
      <p>Learn how the school of your dreams got started.</p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
<?php
  while(have_posts()):
    the_post(); ?>
    <a href="<?php the_permalink( $post ) ?>">
      <?php the_title( ) ?>
    </a>
    <p>Posted by John on 6.8.17 in News</p>
    <p><?php the_excerpt() ?></p>
    <?php
  endwhile;
?>
</div>
<?php

get_footer(  );

 ?>
