<?php
// This is the front page.

// get_header() injects the code from the supplied
// "header.php" file expected in the root directory.
get_header();

// Below code is copied from the target theme's index.html
// and will be reappropriated for a dynamic design.
?>

<div class="page-banner">
<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( $file = 'images/library-hero.jpg' ) ?>);"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">Welcome!</h1>
    <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
    <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
    <a href="<?php echo get_post_type_archive_link( 'program' ); ?>" class="btn btn--large btn--blue">Find Your Major</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
      <?php
      $home_posts = new WP_Query(
        array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'DSC',
        )
      );
      while ($home_posts->have_posts()):
        $home_posts->the_post();
        global $post;
        $event_date = new DateTime(get_field('event_date'));
        ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink( $post ); ?>">
            <span class="event-summary__month"><?php echo $event_date->format('M'); ?></span>
            <span class="event-summary__day"><?php echo $event_date->format('d'); ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink( $post ); ?>"><?php the_title(  ); ?></a></h5>
            <p><?php echo wp_trim_words( get_the_content(  ), $num_words = 18); ?> <a href="<?php the_permalink( $post ); ?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
        <?php
      endwhile;
      ?>
      <p class="t-center no-margin"><a href="<?php echo site_url( $path = '/category/events', $scheme = null ) ?>" class="btn btn--blue">View All Events</a></p>

    </div>
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
      <?php
      $home_posts = new WP_Query(
        array(
          'posts_per_page' => 2,
          'orderby' => 'rand',
        )
      );

      while($home_posts->have_posts()):
        $home_posts->the_post();
        global $post;
        ?>
        <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink( $post ); ?>">
            <span class="event-summary__month"><?php the_time( $d = 'M' ); ?></span>
            <span class="event-summary__day"><?php the_time( $d = 'd' ); ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink( $post ) ?>"><?php the_title(  ); ?></a></h5>
            <p><?php echo wp_trim_words( get_the_content(  ), $num_words = 18); ?> <a href="<?php the_permalink( $post ) ?>" class="nu gray">Read more</a></p>
          </div>
        </div>
        <?php
      endwhile;
        wp_reset_postdata();
      ?>
      <p class="t-center no-margin"><a href="<?php echo site_url( $path = '/blog' ); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
    </div>
  </div>
</div>

<div class="hero-slider">
<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri( $file = 'images/bus.jpg' ) ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">Free Transportation</h2>
      <p class="t-center">All students have free unlimited bus fare.</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri( $file = 'images/apples.jpg' ) ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">An Apple a Day</h2>
      <p class="t-center">Our dentistry program recommends eating apples.</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri( $file = 'images/bread.jpg' ) ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">Free Food</h2>
      <p class="t-center">Fictional University offers lunch plans for those in need.</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
</div>

<?php


// get_footer() injects the code from the supplied
// "footer.php" file expected in the root directory.
get_footer( );
?>
