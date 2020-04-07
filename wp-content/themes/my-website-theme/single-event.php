<?php
  get_header(  );
?>

<?php
  while (have_posts()): the_post();
  // WordPress function that returns the number of posts
  // keeps track of which post we are working with and repalces the count variable
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?> );"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> <?php the_title() ?> </h1>
      <div class="page-banner__intro">
        <p> Don't forget to replace me later</p>
      </div>
    </div>
  </div>



  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'event' ); ?>">
          <i class="fa fa-home" aria-hidden="true"></i> Event Archive
        </a>
        <span class="metabox__main">
          Posted by <?php the_author_posts_link(  ); ?> on <?php the_time( $d = 'd M, Y' ) ?> in <?php echo get_the_category_list( $separator = ', ' ) ?>
        </span>
      </p>
    </div>

    <div class="generic-content">
      <?php the_content(  ) ?>
    </div>
  </div>
  <?php
  endwhile
?>
<?php
  get_footer(  );
?>
