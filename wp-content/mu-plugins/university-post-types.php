<?php

add_action( 'init', 'university_post_types' );
function university_post_types () {
  register_post_type( 'event', array(
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event',
    ),
    'menu_icon' => 'dashicons-calendar',
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
  ));
}

?>
