<?php
/* Template Name: Home
========================================================= */ ?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<section class="homepage-wave-intro" data-cursor="Scroll">

  <div class="wave-intro-copy copy-01">
    <div class="inner">
      <h1>RALLY</h1>
    </div>
  </div>

  <div class="wave-intro-copy copy-02">
    <div class="inner">
      <h1>REVIVE</h1>
    </div>
  </div>

  <div class="wave-intro-copy copy-03">
    <div class="inner">
      <h1>RESONATE</h1>
    </div>
  </div>

  <img class="homepage-wave-bg" src="<?php bloginfo('template_directory');?>/assets/img/svg/homepage-wave-black.svg" alt="waltz wave">

  <div class="homepage-wave-gradient"></div>

  <div class="homepage-banner-cta-container">

    <div class="homepage-banner-cta-entry first">
      <div class="inner">
        <span class="text">WE RALLY TO SOLVE YOUR MARKETING CHALLENGES</span>
        <a href="<?php bloginfo('url'); ?>/about/" data-cursor="Click">
          <span class="action">ABOUT US <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/icon-arrow-right.svg" alt=""></span>
        </a>
      </div>
    </div>

    <div class="homepage-banner-cta-entry hidden second">
      <div class="inner">
        <span class="text">TO REVIVE YOUR BRAND, WEBSITE, MARKETING & MORE.</span>
        <a href="<?php bloginfo('url'); ?>/services/" data-cursor="Click">
          <span class="action">SERVICES <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/icon-arrow-right.svg" alt=""></span>
        </a>
      </div>
    </div>

    <div class="homepage-banner-cta-entry hidden third">
      <div class="inner">
        <span class="text">WITH CREATIVE SOLUTIONS THAT RESONATE & MOVE PEOPLE.</span>
        <a href="<?php bloginfo('url'); ?>/portfolio/" data-cursor="Click">
          <span class="action">PORTFOLIO <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/icon-arrow-right.svg" alt=""></span>
        </a>
      </div>
    </div>
  </div>

  <a href="<?php bloginfo('url'); ?>/about/" class="nav-stamp hero bare-link" data-cursor="Click">
    <span class="inner-text"> LEARN ABOUT OUR REBRAND </span>
    <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/schipper-stamp-hero.svg" alt="">
  </a>

  <div class="stamp-popup">
    <div class="inner">
      <div class="content">
        <small>Just So You Know!</small>
        <h3>Schipper Design has rebranded <br> itself as Waltz Creative.</h3>
        <p>What does this mean? <a class="bare-link" href="/schipper-design-rebrands-itself/">Let us tell you.</a></p>
        <a href="#" class="close bare-link" data-cursor="Close"><small>AS YOU WERE</small> <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/icon-close.svg" alt="Close Popup"></a>
      </div>
    </div>
  </div>

</section>

<section class="homepage-content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php the_content();?>
  <?php endwhile; ?>
  <?php endif;?>
  <?php wp_reset_query(); ?>
</section>

<?php get_footer();?>