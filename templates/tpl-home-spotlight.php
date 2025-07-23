<?php
/* Template Name: Home Spotlight
========================================================= */ ?>

<?php
if (!defined('ABSPATH')) {
  exit;
}

get_header();
$homepage_content = get_field('homepage_content');
?>

<div class="ribbon-bg"></div>
<div class="spotlight-effect"></div>
<div class="home-spotlight-hero-wrap">
  <div class="waltz-spotlight-hero">
    <div class="container">
      <div class="spotlight-hover">
        <h1 style="text-transform:uppercase;">Design that <br> moves people</h1>
      </div>
    </div>
  </div>

  <div class="home-spotlight-intro">
    <div class="container">
      <div class="inner">
        <p>Waltz Creative is a full-service marketing and creative agency and an expert at focusing the spotlight on the businesses and nonprofits we’re proud to serve. For over 20 years, we’ve worked with B2B and B2C clients—helping them shine brighter and perform better through strategic thinking and powerful design. Our team of seasoned strategists, designers and marketing specialists will help you dance your way to better engagement, greater sales and captivating creative that moves your target audience.</p>
<p>
Women-owned and results-driven, we bring fresh perspective while honoring your vision—transforming bold strategies into marketing success stories.</p>
        <p><a href="/services">Explore Our Services</a></p>

      </div>
    </div>
  </div>
</div>

<?php $featured_blocks = $homepage_content['featured_blocks'] ?>
<div class="home-portfolio-grid">
  <div class="container">
    <div class="grid">
      <?php foreach ($featured_blocks as $block) : ?>
        <div class="home-portfolio-entry">
          <?php if (!empty($block['link']['url'])) { ?>
            <a class="bare-link entry-link" <?= !empty($block['link']['target']) ? 'target="_blank"' : null; ?> href="<?= esc_url($block['link']['url']); ?>" title="<?= esc_attr($block['link']['title']); ?>">
            </a>
          <?php } ?>
          <div class="home-portfolio-entry-inner">
            <div class="home-portfolio-entry-image">
              <?php if (!empty($block['vimeo_id'])) : ?>
                <div class="embed-container">
                  <iframe src="https://player.vimeo.com/video/<?= $block['vimeo_id']; ?>?title=0&byline=0&portrait=0&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
              <?php else : ?>
                <?= wp_get_attachment_image($block['image']['id'], 'large'); ?>
              <?php endif; ?>
            </div>

            <div class="home-portfolio-entry-content">
              <?= $block['info']; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <small><a href="/case-studies/">SEE MORE +</a></small>
  </div>
</div>


<?php get_footer(); ?>