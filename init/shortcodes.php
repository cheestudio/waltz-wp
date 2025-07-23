<?php

/* Button
========================================================= */
add_shortcode('button', 'ebutton');
function ebutton($atts, $content = null) {
 extract(shortcode_atts(array(
  'align'  => '',
  'url'    => '',
  'target' => ''
), $atts));

  $output = '<div class="button-wrap"';
  if ( $align ) {
    $output .=' style="text-align: '.$align.'"';
  }
  $output .= '><a';
  if ( $target ) {
    $output .=' target="'.$target.'"';
  }
  $output .= ' href="'.$url.'" class="button">'.do_shortcode( $content ).'</a></div>';
  return $output;
}

/* Current Year (for use within WYSIWYG editor, such as a Copyright Date)
========================================================= */
add_shortcode( 'year', 'jr_cy_y' );
function jr_cy_y() {
  $date = getdate();
  return $date['year'];
}

/* Award Tag
========================================================= */
add_shortcode('award', 'award_tag');
function award_tag($atts) {
  extract(shortcode_atts(array(
    'text' => ''
  ), $atts));

  $output = '<div class="award-tag">';
  $output .= '<div class="award-icon">';
  $output .= '<img src="' . get_bloginfo('template_directory') . '/assets/img/svg/work-award.svg" alt="Award Winner">';
  $output .= '</div>';
  
  if(!empty($text)) {
    $output .= '<div class="award-text">';
    $output .= $text;
    $output .= '</div>';
  }
  
  $output .= '</div>';
  
  return $output;
}
