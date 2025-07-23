<?php
/* Template Name: 20th Anniversary
========================================================= */ ?>

<?php
if (!defined('ABSPATH')) {
  exit;
}

get_header();
$homepage_content = get_field('homepage_content');
?>

<div class="ribbon-bg"></div>
<div class="home-spotlight-hero-wrap">
  <div class="waltz-spotlight-hero">
    <div class="anniversary-animation mobile">

      <iframe src="https://player.vimeo.com/video/922147094?title=0&byline=0&portrait=0&controls=1&autoplay=1&muted=1&background=1&loop=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

    </div>
    <div class="container">
      <div class="anniversary-copy">
        <h1>Cheers to TWENTY</h1>
        <p>years filled with boundless possibilities and fueled by the spirit of creativity!</p>
      </div>
    </div>
    <div class="anniversary-animation desktop">
        <iframe src="https://player.vimeo.com/video/918405193?title=0&byline=0&portrait=0&controls=1&autoplay=1&muted=1&background=1&loop=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  </div>

  <div class="home-spotlight-intro">
    <div class="container flex">
      <div class="inner anniversary-intro">
        <h4>We’re counting down to our 20th Anniversary!</h4>

        <p>As we celebrate this exciting milestone, we reflect on a journey defined by groundbreaking projects and lasting partnerships. We are grateful for our incredible team and visionary clients who are the heartbeat of Waltz. Together, we've turned dreams into reality, setting the stage for a future filled with even greater achievements. Cheers to another 20 years filled with boundless possibilities and fueled by the spirit of creativity!</p>

        <p>Together, let’s elevate your brand! We tailor our services to your unique needs and meet you where you are.</p>
        <p><a href="/services">Our Services</a></p>
      </div>

      <div class="anniversary-countdown-desktop">
        <div class="tick" data-did-init="handleTickInit">
          <div data-repeat="true" data-layout="horizontal fit" data-transform="preset(d, h, m, s) -> delay">
            <div class="tick-group">
              <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                <span data-view="flip"></span>
              </div>
              <span data-key="label" data-view="text" class="tick-label"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="anniversary-countdown-mobile">
      <?php get_template_part('partials/elements/campaign--countdown'); ?>
      </div>

      <script>
        function handleTickInit(tick) {
          const date = Tick.helper.date('2024-04-15T12:00:00');

          Tick.count.down(date).onupdate = function(value) {
            tick.value = value;
          };
        }
      </script>

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
    <small><a href="/portfolio/">SEE MORE +</a></small>
  </div>
</div>


<?php get_footer(); ?>