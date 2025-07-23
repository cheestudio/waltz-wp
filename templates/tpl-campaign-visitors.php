<?php
/* Template Name: Campaign (Visitors)
========================================================= */ ?>

<?php
if (!defined('ABSPATH')) exit;
get_header();
?>


<section class="campaign-hero new-visitors">
  <div class="spotlight-overlay">
    <img class="spotlight-black" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Waltz-Hero-Anniversary-Spotlight-Black.svg" alt="">
  </div>
  <img class="spotlight-neon" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Waltz-Hero-Anniversary-Spotlight-Neon-Step3.png" alt="">
  <div class="container">
    <div class="campaign-hero--header">
      <h1>Setting the Stage for Your Success</h1>
    </div>
  </div>



</section>

<section class="campaign-intro new-visitors">
  <div class="container">
    <div class="inner">
      <h2>Waltz Creative guides B2B and B2C clients through the steps needed to get your target audience moving.</h2>
      <p>Together, we’ll employ the right tactics and high-impact creative work to hit your mark, shine your brightest and leave your audience applauding. As your trusted and experienced partner, we put your brand center stage for your strongest performance yet.</p>
      <div class="button-wrap">
      <a class="get-started-top-link" href="#" onclick="window.open('#contact-us', '_blank');return false;">Let's Get Started</a>
      </div>
    </div>
    <div class="texture-group clients">
      <img data-parallax="-1" class="dots" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Texture-Dots-A.svg" alt="">
      <img data-parallax="1" class="confetti" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Texture-Confetti-White.svg" alt="">
      <img data-parallax="-1" class="diamonds" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Diamonds.svg" alt="">
    </div>
  </div>
</section>

<?php get_template_part('partials/elements/campaign--services-grid', null, [
  'class' => 'new-visitors'
]); ?>

<section class="campaign-countdown-split new-visitors-outro">
  <div class="container">
    <div class="primary">
      <h2>We’re counting down to our 20th Anniversary!</h2>
      <p>As we celebrate this exciting milestone, we reflect on a journey defined by groundbreaking projects and lasting partnerships. We are grateful for our incredible team and visionary clients who are the heartbeat of this agency. Together, we've turned dreams into reality, setting the stage for a future filled with even greater achievements. Cheers to another 20 years filled with boundless possibilities and fueled by the spirit of creativity!</p>
      <div class="flex">
        <div class="button-wrap">
          <a href="https://waltzcreative.com" class="button learn-more-top-link" target="_blank" rel="noopener">Learn More</a>
        </div>
        <div>
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/20-year-mark.svg" alt="Waltz 20 years">
        </div>
      </div>
    </div>
    <div class="secondary">
      <figure>
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/temp-hero.jpg" alt="2024 Hero">
      </figure>
      <?php get_template_part('partials/elements/campaign--countdown'); ?>
      <img class="countdown-accent" data-parallax="-0.8" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Texture-Dots-B.svg" alt="" aria-hidden="true">
    </div>
  </div>
</section>

<section class="campaign-split new-visitors">
  <div class="container">
    <div class="primary">
      <h2>Supporting Roles & Headlining Acts</h2>
      <p>For 20 years Waltz Creative has proudly served businesses and nonprofits, helping them shine brighter and perform better. Drawing from a diverse range of specialties, styles and influences, our talented team consistently delivers the innovative strategies, unexpected creative work and unmatched service to drive lasting success.</p>
      <p>We leverge our expertise to help you stand out, move your brand forward and generate leads. Let Waltz guide you to more clicks, better engagement, greater sales and captivating creative that moves your audience.</p>
      <p>Stronger together, we collaborate enthusiastically to find the right approach for each client.</p>
      <div class="button-wrap">
        <a class="waltz-this-way-services" href="https://waltzcreative.com/services/" title="Learn more about Waltz Creative" target="_blank">Waltz This Way</a>
      </div>
    </div>
    <div class="secondary">
      <?php get_template_part('partials/elements/campaign--homepage'); ?>
    </div>
  </div>
</section>

<section class="campaign-form" id="contact-us">
  <div class="container">
    <div class="inner">
      <h2>Let's Get Started</h2>
      <?php gravity_form(12, false, false, false, '', true); ?>
      <div class="graphic-group">
        <img class="sunburst" data-parallax="0.5" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Sunburst.svg" alt="" aria-hidden="true">
        <img class="flower" data-parallax="-0.5" src="<?php bloginfo('template_directory'); ?>/assets/img/campaign/Flower.svg" alt="" aria-hidden="true">
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
function sendClickEvent(event) {
  gtag('event', 'click', {
    'event_category': 'New Visitors Clicks',
    'event_label': event.target.className,
    'value': 1
  });
}
document.addEventListener('click', sendClickEvent);
</script>

<?php get_footer(); ?>