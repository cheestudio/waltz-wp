<?php
/* Template Name: Contact
========================================================= */?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<section class="contact-content">
  <div class="container">

    <h1 class="hover-text">LET’S DANCE</h1>

    <div class="contact-grid grid">
      <div class="contact-grid--form">
        <?php gravity_form(5, false, false, false, '', true);?>
      </div>
      <div class="contact-grid--cta">
        <h3>Suffering from 2 left feet?</h3>
        <p>Input your symptoms and we’ll offer some potential treatments to get your brand back on the right foot.</p>
        <a href="#assessment" class="bare-link start-assessment" data-lity>Start</a>
      </div>
    </div>

  </div>
</section>

<aside id="assessment" class="lity-hide">
  <div class="inner">
    <?php gravity_form(6, false, false, false, '', true);?>
  </div>
</aside>


<?php get_footer();