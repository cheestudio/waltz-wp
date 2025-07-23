<?php
/* STYLESHEETS AND SCRIPTS
========================================================= */

/* Front End Styles */

function theme_styles()
{
  $cache_bust = filemtime(get_stylesheet_directory() . '/style.min.css');
  wp_register_style('main-stylesheet', get_stylesheet_directory_uri() . '/style.min.css', array(), $cache_bust, 'all');
  wp_enqueue_style('main-stylesheet');
}
add_action('wp_enqueue_scripts', 'theme_styles');

/* Custom Gutenberg Styles */

function gutenberg_editor_styles()
{
  $cache_bust = filemtime(get_stylesheet_directory() . '/editor.css');
  wp_register_style('editor-stylesheet', get_stylesheet_directory_uri() . '/editor.css', array(), $cache_bust, 'all');
  wp_enqueue_style('editor-stylesheet');
}
add_action('enqueue_block_editor_assets', 'gutenberg_editor_styles');


/* Custom JS */

function custom_scripts()
{
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  $js1_bust = '?' . filemtime(get_stylesheet_directory() . '/assets/js/all.min.js');
  $js2_bust = '?' . filemtime(get_stylesheet_directory() . '/assets/js/campaigns.js');
  wp_register_script('custom_main', get_template_directory_uri() . '/assets/js/all.min.js', false, $js1_bust, true);
  wp_register_script('campaigns', get_template_directory_uri() . '/assets/js/campaigns.js', false, $js2_bust, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom_main');
  if (is_page_template('templates/tpl-campaign-clients.php') || is_page_template('templates/tpl-campaign-visitors.php')) {
    wp_enqueue_script('campaigns');
  }
}
add_action('wp_enqueue_scripts', 'custom_scripts', 100);

/* Default TinyMCE Editor Styles */

add_editor_style('editor-styles.css');


/* Google Analytics */

function add_google_analytics()
{
  ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z0F0PG6KD4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-Z0F0PG6KD4', {
      debug_mode: true
    });
  </script>
  <?php
}
add_action('wp_head', 'add_google_analytics');

/* FacetWP Portfolio Search Tracking */

function add_facetwp_tracking()
{
  ?>
  <script>
    document.addEventListener('facetwp-loaded', function() {
      if (FWP.loaded) {
        const searchValue = FWP.facets['search'];
        if (searchValue && searchValue.length > 0) {
          gtag('event', 'Portfolio User Search', {
            event_category: 'User Interaction',
            event_label: 'Portfolio Search',
            portfolio_search_term: searchValue
          });
        }
      }
    });
  </script>
  <?php
}
add_action('wp_head', 'add_facetwp_tracking');

/* FontAwesome for Front Page */

function add_fontawesome_frontpage()
{
  if (is_front_page()) {
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php
  }
}
add_action('wp_head', 'add_fontawesome_frontpage');