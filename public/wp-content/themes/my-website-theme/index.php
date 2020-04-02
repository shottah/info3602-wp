<?php
// This is the main entry point for the custom
// theme. This page also is the default for the
// site's called "default" or "index" page.

// This loop in Wordpress is known as "The Loop"
// and it is the main control structure format
// used for displaying any number of posts for
// a given format in the website.
//
// E.g. This is a simple loop which simply outputs
// the word "Hello" in h2 tags for every post that
// exists on the website.
//
// have_posts() returns true if there are currently
// any existing posts that have not been iterated.
while (have_posts()) {
  // the_post() function acts as an iterator
  // for the loop so it can cycle through all
  // existing posts.
  the_post();
  ?> <h2> Hello </h2> <?php
}

 ?>
