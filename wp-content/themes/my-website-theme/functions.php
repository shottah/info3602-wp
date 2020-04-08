<?php
// This file acts as the initialiser and handles
// all loading of files, settings, and moditifcations
// specific to this theme. This is loaded after the
// Wordpress environment is loaded, and can overwrite
// certain Wordpress default functionalities.

// This function enqueues the style sheets required for
// this theme.
function university_files() {
  // The default or main stylesheet "style.css" is the
  // target of the "get_stylesheet_uri()" function.
  wp_enqueue_style( 'university_main_styles', get_stylesheet_uri());
  wp_enqueue_style( 'university_main_styles_extended', get_stylesheet_directory_uri() . '/css/style.css');
  wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('custom-google-font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

  // The following will activate javascript code that
  // is required for various elements on the website
  // such as the slider on the homepage.
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), array('jquery'), '1.0',true);
}

// This function changes some basic Wordpress functionality
// by generating a unique title for each page.
function university_features() {
  // This will add the functionality of having a custom
  // title on the browser's tab instead of a URI.
  add_theme_support('title-tag');

  // This will add a custom menu to the WP backend area
  // and allow us to access new menus.
  register_nav_menu('header_main_menu', 'Header Main Menu');

  // This will add a the ability to create a 1:1 relationship
  // between a featured image or thumbnail and the post.
  add_theme_support( 'post-thumbnails');
}

// This function overrides the builtin WP_Query default
// functionality.
function university_adjust_program_queries($query) {
  if (!is_admin() AND is_post_type_archive( $post_types = 'program' )
    AND $query->is_main_query()):
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  endif;
  wp_reset_postdata();
}

// This wordpress hook is performing an action on any
// file it expects to be "queued" for execution.
// It accepts the type of action, and the function
// to be executed.
add_action( 'wp_enqueue_scripts', 'university_files');
add_action( 'after_setup_theme', 'university_features');
 ?>
