<?php
/* Template Name: Careers
========================================================= */?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<?php
$hero = get_field('careers_hero');
$positions = get_field('careers_open_positions');
$perks = get_field('careers_perks');
$testimonials = get_field('careers_testimonials');
$mantras = get_field('careers_mantras');

?>

<section class="careers-hero careers-split">
  <div class="flex reverse">
    <div class="image" style="background-image:url(<?=$hero['image']['url'];?>);">
    </div>
    <div class="content">
      <div class="inner">
        <h1 class="hover-text"><?=$hero['primary_header'];?></h1>
        <h2 class="hover-text"><?=$hero['secondary_header'];?></h2>
        <div class="copy">
          <?=$hero['copy'];?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="careers-positions careers-split">
  <div class="flex">
    <div class="image" style="background-image:url(<?=$positions['image']['url'];?>);">
    </div>
    <div class="content">
      <div class="inner">
        <small>Open Positions</small>
        <div class="copy">
          <div class="open-positions">
            <div class="arrow-link-list">
              <ul>
                <?php foreach ($positions['open_positions'] as $position):
 $link = $position['link'];
 ?>
                <li>
                  <?php
 if (!empty($link['url'])) {?>
                  <a class="bare-link" <?=!empty($link['target']) ? 'target="_blank"' : null;?> href="<?=esc_url($link['url']);?>" title="<?=esc_attr($link['title']);?>">
                    <span class="text"><?=esc_html($link['title']);?></span>
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51"><g><g transform="rotate(-45 25.5 25.5)"><path fill="#2d302d" d="M35.469 8.675V28.96l4.695 4.697-1.85 1.849-5.186-5.187.01-.01-23.73-23.73-4.897 4.896 26.06 26.06h-.011l2.85 2.852-1.85 1.85-4.699-4.701H6.608v6.926h35.788V8.675z"/></g></g></svg>
                    </span>
                  </a>
                  <?php }?>
                </li>
                <?php endforeach;?>
              </ul>
            </div>
          </div>
          <?=$positions['copy'];?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="careers-perks careers-split">
  <div class="flex reverse">
    <div class="image" style="background-image:url(<?=$perks['image']['url'];?>);">
    </div>
    <div class="content">
      <div class="inner">
        <small>The Perks</small>
        <?php foreach ($perks['perks'] as $perk): ?>
        <div class="perk-entry">
          <div class="title">
            <?=$perk['title'];?>
          </div>
          <div class="description">
            <?=$perk['description'];?>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</section>

<section class="career-testimonials portfolio-testimonials glide" id="testimonialSlider">
  <div class="testimonial-slider glide__track" data-glide-el="track">
    <div class="glide__slides">
      <?php foreach ($testimonials as $testimonial): ?>
      <div class="testimonial-slide glide__slide" data-cursor="swipe">
        <div class="flex testimonial-slide-wrap">
          <div class="testimonial-slide--info">
            <div class="photo">
              <?=wp_get_attachment_image($testimonial['photo']['id'], 'square');?>
            </div>
            <div class="name">
              <?=$testimonial['name'];?>
            </div>
            <div class="title">
              <?=$testimonial['title'];?>
            </div>
          </div>
          <div class="testimonial-slide--copy">
            <?=$testimonial['copy'];?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<section class="careers-mantras">
  <div class="container">
    <small>OUR MANTRAS</small>
    <div class="grid">
      <?php foreach ($mantras as $mantra): ?>
      <div class="mantra-entry">
        <div class="image">
        <?=wp_get_attachment_image($mantra['badge_image']['id'], 'full');?>
        </div>
        <p class="byline">
        <?= $mantra['byline'];?>
        </p>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<?php get_footer();?>