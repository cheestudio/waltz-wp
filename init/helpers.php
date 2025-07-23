<?php
/* HELPER FUNCTIONS
========================================================= */

/* Custom Login Screen
========================================================= */
add_action( 'login_enqueue_scripts', 'custom_login_screen' );
function custom_login_screen() { ?>
  <style type="text/css">
    body {
      background: #8194dd !important;
    }
    #login h1 a {
      background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/img/svg/logo.svg');
      padding-bottom: 0px;
      background-size: 100%;
      width: 80px;
    }
    #login a {
      transition: .6s cubic-bezier(.23,1,.32,1);
      color: #2D302D !important;
      font-weight: 700;
    }
    #login a:hover {
      color: #fff !important;
    }
    #login #wp-submit {
      background: white;
      border-radius: 0;
      border: none;
      box-shadow: none;
      color: #2D302D;
      cursor: pointer;
      display: inline-block;
      font-size: 16px;
      font-weight: 500;
      text-transform: uppercase;
      line-height: 1;
      padding: 0;
      text-align: center;
      text-shadow: none;
      transition: .6s cubic-bezier(.23,1,.32,1);
      user-select: none;
      vertical-align: baseline;
      white-space: nowrap;
      zoom: 1;
      -moz-user-select: none;
      -ms-user-select: none;
      -webkit-user-drag: none;
      -webkit-user-select: none;
    }
    #login #wp-submit:hover {
      border-color: black;
      color: black;
      background: white;
    }
    #loginform {
      border: none;
    }
  </style>
<?php }

/* Gravity Forms Button Markup
========================================================= */
/**
 * Filters the next, previous and submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );
 
    return $dom->saveHtml( $new_button );
}


/* Gravity Forms anchor creation
========================================================= */
add_filter( 'gform_confirmation_anchor', '__return_false' );


/* Enable Gravity Forms field label visibility
========================================================= */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/* Remove Legend
========================================================= */

add_filter( 'gform_required_legend', '__return_empty_string' );

/* Responsive IFRAME tags
========================================================= */
add_filter('embed_oembed_html', 'responsive_embed', 10, 3);
function responsive_embed($html, $url, $attr) {
  return $html!=='' ? '<div class="embed-container">'.$html.'</div>' : '';
}


/* Add Slug to Body Class
========================================================= */
add_filter( 'body_class', 'post_name_in_body_class' );
function post_name_in_body_class( $classes ){
  if( is_singular() ) {
   global $post;
   $parent = get_page($post->post_parent);
   array_push( $classes, "{$post->post_name}" );
   array_push( $classes, "{$parent->post_name}" );
 }
 return $classes;
}


/* Replace "Howdy" on Admin
========================================================= */
add_filter( 'admin_bar_menu', 'replace_howdy',10000);
function replace_howdy( $wp_admin_bar ) {
  $my_account=$wp_admin_bar->get_node('my-account');
  $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );
  $wp_admin_bar->add_node( array(
    'id' => 'my-account',
    'title' => $newtitle,
  ) );
}


/* Hide Help on Admin
========================================================= */
add_action('admin_head', 'hide_help');
function hide_help() {
  echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
  </style>';
}


/* Remove footer branding
========================================================= */
add_filter( 'admin_footer_text', '__return_false' );


/* Stop images getting wrapped up in <p> tags when using the_content()
========================================================= */
add_filter('the_content', 'remove_img_ptags');
function remove_img_ptags($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
// for ACF wizzy fields
add_filter ('acf_the_content', 'img_p_class_content_filter', 20);
function img_p_class_content_filter($content) {
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}


/* Always show Kitchen Sink
========================================================= */
add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );
function unhide_kitchensink( $args ) {
  $args['wordpress_adv_hidden'] = false;
  return $args;
}


/* Remove Emoji scripts from head
========================================================= */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* Remove the additional CSS section, introduced in 4.7, from the Customizer.
========================================================= */
add_action( 'customize_register', 'prefix_remove_css_section', 15 );
function prefix_remove_css_section( $wp_customize ) {
  $wp_customize->remove_section( 'custom_css' );
}


/* Show Single Post/Page Content (without loop)
========================================================= */
function show_content() {
 $current_page = get_queried_object();
 $content      = apply_filters( 'the_content', $current_page->post_content );
 echo $content;
}


/* Remove hard-coded width on WordPress Captions
========================================================= */
add_filter('img_caption_shortcode_width', 'my_img_caption_shortcode_width', 10, 3);
function my_img_caption_shortcode_width($width, $atts, $content) {
  return 0;
}


/* Custom Wizzy Toolbar
========================================================= */
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_custom_toolbars' );
function my_custom_toolbars( $toolbars )
{
  $toolbars['Full'] = array();
  $toolbars['Full'][1] = array(
    'formatselect',
    'bold',
    'italic',
    'underline',
    'forecolor',
    'strikethrough',
    'superscript',
    'charmap',
    'blockquote',
    'bullist',
    'numlist',
    'alignleft',
    'aligncenter',
    'alignright',
    'alignjustify',
    'symbol',
    'link',
    'unlink',
    'removeformat',
    'fullscreen',
    'hr'
  );
  return $toolbars;
}

/* ACF - WP Admin Styles
========================================================= */
add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
  ?>
  <style type="text/css">
    .acf-block-fields > .acf-field-group > .acf-label label,
    .acf-block-fields > .acf-field-repeater > .acf-label label {
      display: block;
      text-align: center;
      font-size: 20px;
      color: #555;
      line-height: 1;
      margin-bottom: 20px;
      text-transform: uppercase;
    }
    #poststuff .acf-postbox .postbox-header h2{
      display: block;
      text-align: center;
      font-size: 20px;
      color: #555;
      line-height: 1;
      text-transform: uppercase;
    }
  </style>
  <?php
}

/* ACF Options Page
========================================================= */
if (class_exists('ACF')) {
  acf_add_options_page([
   'page_title' => 'Theme Options',
   'menu_title' => 'Theme Options',
   'menu_slug' => 'theme-options',
   'capability' => 'edit_theme_options',
   'position' => '999',
   'autoload' => true,
  ]);
 }

/* Block/TinyMCE/ACF Editor Colors
========================================================= */

/* Global Color Definitions */

$color_vars = array(
  'Black' => '2D302D',
  'White' => 'ffffff',
  'Yellow' => 'EAFF00',
  'GreenLight' => 'b5e3d8',
  'GreenMed' => '47d7ac',
  'GreenDark' => '00b2a9',
  'Blue' => '8194dd',
  'Purple' => '514163',
  'Pink' => 'e59bdc',
);

/* Block Editor Colors 
-----------------------------------*/

// Disable Custom Colors (optional)
//add_theme_support( 'disable-custom-colors' );

function block_editor_color_map() {
  global $color_vars;
  $colors = array();
  foreach ($color_vars as $name => $hex) {
   $colors[] = array(
    'name'  => __( $name ),
    'slug'  => strtolower($name),
    'color' => '#'.$hex,
  );
 }
 return $colors;
}

function custom_block_editor_colors(){
  $colors = block_editor_color_map();
  add_theme_support( 'editor-color-palette', $colors );
}
add_action( 'after_setup_theme', 'custom_block_editor_colors' );


/* Branded Color Picker for ACF 
-----------------------------------*/

function output_the_colors() {

// use defined Block Editor color array
  $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) ); 

  if ( !$color_palette )
    return;

  ob_start();

  echo '[';
  foreach ( $color_palette as $color ) {
    echo "'" . $color['color'] . "', ";
  }
  echo ']';

  return ob_get_clean();
}

function custom_acf_colors() { 
  $custom_colors = output_the_colors();
  ?>
  <script type="text/javascript">
    (function($) {
     acf.add_filter('color_picker_args', function( args, $field ){
      args.palettes = <?php echo $custom_colors; ?>
      // return colors
      return args;
    });
   })(jQuery);
 </script>
<?php }
add_action('acf/input/admin_footer', 'custom_acf_colors');

/* Add Custom Colors to ACF Wizzy  
-----------------------------------*/

function custom_tinymce_colors( $init ) {
  global $color_vars;
  $colors_custom = array();
  foreach ( $color_vars as $name => $hex ) {
    $colors_custom[] = $hex;
    $colors_custom[] = $name;
  }
  $colors = $colors_custom;
  $init['textcolor_map']  = json_encode($colors);
  return $init;
}
add_filter( 'tiny_mce_before_init', 'custom_tinymce_colors' );


/* ACF Block Class/ID
========================================================= */

function block_class_id($block_entry,$class) {
  $className = $class;
  $id = $block_entry['id'];
  if( !empty($block_entry['anchor']) ) {
    $id = $block_entry['anchor'];
  }
  if( !empty($block_entry['className']) ) {
    $className .= ' ' . $block_entry['className'];
  }
  if( !empty($block_entry['align']) ) {
    $className .= ' align' . $block_entry['align'];
  }
  echo 'id="'.esc_attr($id).'" class="'.esc_attr($className).'"';
}

/* Numerical Pagination
========================================================= */
function post_pagination( $pages = '', $range = 2 ) {
  $showitems = ( $range * 2 ) + 1;
  global $paged;

  if ( empty($paged) ) $paged = 1;
  if ( $pages == '' ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if ( !$pages ) {
      $pages = 1;
    }
  }

  if ( 1 != $pages ) {
    if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) 
      echo "<a class='first-link' href='" . get_pagenum_link(1) . "' title='Go to First Page'><<</a>";
    if ( $paged > 1 && $showitems < $pages ) 
      echo "<a class='prev-link' href='" . get_pagenum_link($paged - 1) . "' title='Go to Previous Page'><</a>";

    for ( $i = 1; $i <= $pages; $i++ ) {
      if ( 1 != $pages && ( !($i >= $paged+$range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) ) {
        echo ($paged == $i) ? "<span class='current'>{$i}</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' title='Go to Page {$i}'>{$i}</a>";
      }
    }

    if ( $paged < $pages && $showitems < $pages ) 
      echo "<a class='next-link' href='" . get_pagenum_link($paged + 1) . "' title='Go to Next Page'>></a>";
    if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) 
      echo "<a class='last-link' href='" . get_pagenum_link($pages) . "' title='Go to Last Page'>>></a>";
  }
}

/* Disable Gutenberg Per Post Type
========================================================= */
add_filter('use_block_editor_for_post', '__return_false', 10);

/* Move Yoast to bottom of edit page
========================================================= */
add_filter('wpseo_metabox_prio', function () {
  return 'low';
});