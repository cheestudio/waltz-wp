<?php
/* Theme Initialization
========================================================= */
require_once locate_template('/init/shortcodes.php');    // Shortcodes
require_once locate_template('/init/constants.php');    // Initial theme setup and constants
require_once locate_template('/init/scripts.php');    // Theme Scripts and Stylesheets
require_once locate_template('/init/helpers.php');   // Other default theme functions
require_once locate_template('/init/custom.php');   // Custom function additions
require_once locate_template('/init/cpt.php');     // Custom Post Types

function randomize_custom_post_type_order() {
  $post_type = 'work';
  $posts = get_posts(array(
      'post_type' => $post_type,
      'numberposts' => -1,
      'orderby' => 'rand'
  ));

  foreach ($posts as $index => $post) {
      wp_update_post(array(
          'ID' => $post->ID,
          'menu_order' => $index
      ));
  }
}

// add_action('init', 'randomize_custom_post_type_order');