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
  wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('custom-google-font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

// This wordpress hook is performing an action on any
// file it expects to be "queued" for execution.
// It accepts the type of action, and the function
// to be executed.
add_action( 'wp_enqueue_scripts', 'university_files');
 ?>
