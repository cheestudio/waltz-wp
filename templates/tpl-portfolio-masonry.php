<?php
/* Template Name: Portfolio - Masonry Filters
========================================================= */ ?>

<?php
if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>

<?php $header = get_field('portfolio_header'); ?>

<section class="work-header">
  <div class="container">
    <h1 class="hover-text">WORK</h1>
  </div>
</section>

<section class="portfolio-wrap">
  <div class="container grid">
    <div class="portfolio-filters">
      <div class="facet-portfolio-categories">
        <div class="expertise-filter filter-entry">
          <h3>Expertise</h3>
          <?= facetwp_display('facet', 'expertise') ?>
        </div>
        <div class="industry-filter filter-entry">
          <h3>Industry</h3>
          <?= facetwp_display('facet', 'industry') ?>
        </div>
      </div>
      <div style="display: none;opacity:0;visibility:hidden;text-indent:-9999px;font-size:0;line-height:0;" aria-label="hidden">
        <?=
        // hidden facet to enable searching by work tags (see main.js)
        facetwp_display('facet', 'work_tags') ?>
      </div>
    </div>

    <div class="client-loop">
      <div class="facet-utility">
        <?= facetwp_display('selections'); ?>
        <?= facetwp_display('facet', 'search') ?>
      </div>
      <div id="results">
        <div class="client-masonry-grid facetwp-template">
          <?php
          $args = array(
            'post_type' => 'work',
            'orderby' => array(
              'menu_order' => 'ASC',
              'date' => 'DESC'
            ),
            'posts_per_page' => 30,
            'facetwp' => true,
          );
          $work = new WP_Query($args);
          if ($work->have_posts()) :
            while ($work->have_posts()) :
              $work->the_post();
              $work_id = get_the_ID();
              $client_name = get_field('client_name') ?: get_the_title();
              $project_title = get_field('project_title');
              $related_case_study = get_field('related_case_study');
              $related_link = get_field('related_link');
              $show_award = get_field('show_award');
              $award_text = get_field('award_text');
              $popup_image = get_field('popup_image');
              $popup_video = get_field('popup_video');
              $work_tags = get_the_terms($work_id, 'work_tags');
              $thumbnail_id = get_post_thumbnail_id($work_id);
              $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'medium_large');
              $image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
              $image_alt = $image_alt ? $image_alt : $client_name;
              if (!empty($thumbnail)) {
                $image_width = $thumbnail[1];
                $image_height = $thumbnail[2];
              }
              if ($popup_image) {
                $popup_class = ($popup_image['height'] > $popup_image['width']) ? 'portrait' : 'landscape';
              } else {
                $popup_class = 'video';
              }
          ?>
              <div class="client-masonry-entry">
                <a class="bare-link client-popup-trigger fancybox" href="#client-popup-<?= $work_id; ?>"
                  data-src="#client-popup-<?= $work_id; ?>" data-fancybox="gallery">
                  <div class="client-masonry-entry-overlay">
                    <span>
                      <?= $client_name; ?>
                    </span>
                  </div>
                  <img src="<?= $thumbnail[0]; ?>" width="<?= $image_width; ?>" alt="<?= esc_attr($image_alt); ?>">
                </a>
              </div>

              <?php include(locate_template('partials/elements/client-popup.php')); ?>

            <?php endwhile; ?>
        </div>

        <div class="portfolio-load-more">
          <?= facetwp_display('facet', 'load_more') ?>
        </div>


      <?php else : ?>

        <h4>No more projects to display</h4>

      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

      </div>

    </div>
</section>

<?php get_footer(); ?>