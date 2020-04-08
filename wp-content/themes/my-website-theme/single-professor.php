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
    <div class="generic-content">
      <?php the_content(  ) ?>
    </div>

    <div class="container">
      <hr class="section-break">
      <h2 class="headline headline--medium">Related Program(s)</h2>
      <ul class="link-list min-list">

        <?php
        $related_programs = get_field('event_programs');
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
