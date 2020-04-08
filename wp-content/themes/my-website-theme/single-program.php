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
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program' ) ?>">
          <i class="fa fa-home" aria-hidden="true"></i> Program Archive
        </a>
        <span class="metabox__main">
          Posted by <?php the_author_posts_link(  ); ?> on <?php the_time( $d = 'd M, Y' ) ?> in <?php echo get_the_category_list( $separator = ', ' ) ?>
        </span>
      </p>
    </div>

    <div class="generic-content">
      <?php the_content(  ); ?>
    </div>

    <div class="container">
      <?php
      $related_professors = new WP_Query(
          array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'professor_programs',
                'compare' => 'LIKE',
                'value' => '"'. get_the_id().'"',
              ), // meta_query[0]: get professors who's programs match $post
            ), // meta_query
          ) // wp_query array
      );
      if ($related_professors->have_posts()):
        ?>
        <hr class="section-break">
          <h2 class="headline headline--medium"><?php the_title( ) . 'Professors'?></h2>
          <ul class="professor-cards">
            <?php while($related_professors->have_posts()):
              $related_professors->the_post();
              ?>
              <li class="professor-card__list-item">
                <a class="professor-card" href="<?php the_permalink();?>">
                  <img class="professor-card__image" src="<?php the_post_thumbnail_url('professor_landscape');?>"/>
                  <span class="professor-card__name"> <?php the_title(); ?></span>
                </a>
              </li>
              <?php
            endwhile;
            ?>
          </ul>
          <?php
      endif;
      wp_reset_postdata();
      ?>
    </div>

    <div class="container">
      <hr class="section-break">
      <h2 class="headline headline--medium">Related <?php the_title(  ) ?> Event(s)</h2>
        <?php
        $related_events = new WP_Query(
          array(
            'post_type' => 'event',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric',
              ), // meta_query[0]: show events occuring after now
              array(
                'key' => 'event_programs',
                'compare' => 'LIKE',
                'value' => '"'.get_the_id().'"'
              ), // meta_query[1]: show events related to this program
            ), // meta_query: additional filters
          ), // array: options
        ); // WP_Query
        if ($related_events->have_posts()):
          while ($related_events->have_posts()):
            $related_events->the_post();
            $event_date = new DateTime($event->event_date);
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
          endwhile; // while have related event posts
        endif; // if have related event posts
        wp_reset_postdata();
        ?>
    </div>
  </div>
  <?php
endwhile; // while have post data
?>
<?php
  get_footer(  );
?>
