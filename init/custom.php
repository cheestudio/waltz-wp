<?php
/* Custom Functions
========================================================= */

/* Output Descriptions in Nav
========================================================= */

function custom_header_menu_desc($item_output, $item, $depth, $args) {
  if ('primary_nav' == $args->theme_location && !$depth && $item->description) {
    $item_output = str_replace('</a>', '<span class="description">' . $item->description . '</span></a>', $item_output);
  }

  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'custom_header_menu_desc', 10, 4);

/* Attach Single Views to Pages
========================================================= */

function custom_menu_item_classes($classes, $item, $args) {
  if ('primary_nav' !== $args->theme_location) {
    return $classes;
  }

  if ((is_singular('post') || is_category() || is_tag()) && 'Journal' == $item->title) {
    $classes[] = 'current-menu-item';
  }

  if ((is_singular('client')) && 'Portfolio' == $item->title) {
    $classes[] = 'current-menu-item';
  }

  return array_unique($classes);
}
add_filter('nav_menu_css_class', 'custom_menu_item_classes', 10, 3);

/* Breadcrumbs
========================================================= */

function breadcrumbs() {
  $post = '';
  if (!is_home() || is_singular('post')) {
    if (is_singular('client')) :
      $parent_page = '<a href="/portfolio/">Portfolio</a> / ';
    elseif (is_singular('post')) :
      $parent_page = '<a href="/journal/">Journal</a> / ';
    elseif (is_singular('team')) :
      $parent_page = '<a href="/about/">About</a> / ';
    elseif (is_singular('service')) :
      $parent_page = '<a href="/services/">Services</a> / ';
    else :
      global $post;
      $parent_id = wp_get_post_parent_id($post->ID);
      if ($parent_id) {
        return '<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a> / ';
      }
    endif;
    if ($post) {
      return '<span class="current-title">' . get_the_title($post->ID) . '</span>';
    }
  }
}

/* Custom Builder Fonts
========================================================= */

function my_bb_custom_fonts($system_fonts) {
  $system_fonts['GT'] = array(
    'fallback' => 'serif',
    'weights' => array(
      '100', '200', '300', '400', '500', '600', '700', '800', '900',
    ),
  );

  $system_fonts['GTMono'] = array(
    'fallback' => 'sans-serif',
    'weights' => array(
      '100', '200', '300', '400', '500', '600', '700', '800', '900',
    ),
  );
  return $system_fonts;
}
add_filter('fl_builder_font_families_system', 'my_bb_custom_fonts');

/* FacetWP
========================================================= */

add_filter('facetwp_facet_dropdown_show_counts', '__return_false');
add_filter('facetwp_facet_radio_show_counts', '__return_false');

