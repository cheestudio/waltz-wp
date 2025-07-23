<?php
/* Template Name: Portfolio Landing
========================================================= */ ?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<?php $header = get_field('portfolio_header'); ?>

<section class="portfolio-clients">
  <div class="container">

    <h1 class="hover-text"><?= $header;?> </h1>

    <!-- <ul class="portfolio-nav">
      <li><button onclick="FWP.reset()">Most Recent</button></li>
      <li></li>
    </ul> -->

    <div class="portfolio-nav">
    <button class="clear-all-facets" onclick="FWP.reset()">Most Recent</button>
    <?= facetwp_display( 'facet', 'client_type' ) ?>
    <?= facetwp_display( 'facet', 'work_type' ) ?>
    </div>

    <div class="client-loop">
      <div id="results">
        <?php
				$args = array
				(					
					'post_type'      => 'client',
					'orderby'        => 'menu_order',
					'posts_per_page' => 6,
					'facetwp' => true,
				);
				$clients = new WP_Query($args);
				if ($clients->have_posts() ) :
					while ($clients->have_posts() ) :
						$clients->the_post();
						$tagline = get_field( 'client_tagline' );
						$image = get_field( 'hero_image' );
						?>

        <div class="client-entry">
          <div class="client-entry--image">
            <div class="image-overlay"></div>
            <a data-cursor="View"
              href="<?php the_permalink();?>"><?= wp_get_attachment_image( $image['id'], 'large' ); ?></a>
          </div>
          <div class="client-entry--info">
            <div class="client-name small-header"><?php the_title(); ?></div>
            <div class="client-tagline">
            <a href="<?php the_permalink();?>"><?= $tagline;?></a>
            </div>
          </div>
        </div>

        <?php endwhile;?>
      </div>

      <div class="portfolio-load-more">
        <?= facetwp_display( 'facet', 'load_more' ) ?>
      </div>

      <?php else: ?>

      <h4>No more projects to display</h4>

      <?php endif;?>
      <?php wp_reset_postdata(); ?>



    </div>

  </div>
</section>

<?php $testimonials = get_field('portfolio_testimonials_rep'); ?>
<section class="portfolio-testimonials glide" id="testimonialSlider">
  <div class="testimonial-slider glide__track" data-glide-el="track">
    <div class="glide__slides">
      <?php foreach ($testimonials as $testimonial): ?>
      <div class="testimonial-slide glide__slide" data-cursor="swipe">
        <div class="flex testimonial-slide-wrap">
          <div class="testimonial-slide--info">
            <div class="photo">
              <?= wp_get_attachment_image( $testimonial['photo']['id'], 'square' ); ?>
            </div>
            <div class="name">
              <?= $testimonial['name'];?>
            </div>
            <div class="title">
              <?= $testimonial['title'];?>
            </div>
          </div>
          <div class="testimonial-slide--copy">
            <?= $testimonial['copy'];?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>


<?php 
	$partners = get_field('portfolio_partners'); 
	$columns = $partners['partner_columns'];
	$outro = esc_html(get_field('portfolio_outro'));
	?>
<section class="partners-list">
  <div class="container">
    <div class="partners-list--intro">
      <h2 class="header hover-text"><?= $partners['header'];?></h2>
      <div class="copy"><?= $partners['copy'];?> </div>
    </div>
    <div class="partners-list--columns">
      <?php foreach ($columns as $col): ?>
      <div class="partner-col-entry">
        <?= $col['content'];?>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<?php get_footer(); ?>