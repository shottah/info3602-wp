<?php
  get_header(  );
?>

<?php
  while (have_posts()): the_post();
  // WordPress function that returns the number of posts
  // keeps track of which post we are working with and repalces the count variable
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_field('page_banner_background_image')['url']; ?> );"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> <?php the_title() ?> </h1>
      <div class="page-banner__intro">
        <p><?php the_field('page_banner_subtitle'); ?></p>
      </div>
    </div>
  </div>



  <div class="container container--narrow page-section">
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">
          <?php the_post_thumbnail(  ); ?>
        </div>
        <div class="two-thirds">
          <?php the_content( $more_link_text = null, $strip_teaser = false ) ?>
        </div>
      </div>
    </div>

    <div class="container">
      <hr class="section-break">
      <h2 class="headline headline--medium">Related Program(s)</h2>
      <ul class="link-list min-list">

        <?php
        $related_programs = get_field('professor_programs');
        if ($related_programs):
          foreach ($related_programs as $program):
            ?>
            <li>
              <a href="<?php echo get_the_permalink( $program ) ?>">
                <?php echo get_the_title( $program ) ?>
              </a>
            </li>
            <?php
          endforeach;
        endif;
        ?>
      </ul>
    </div>
  </div>
  <?php
  endwhile
?>
<?php
  get_footer(  );
?>
