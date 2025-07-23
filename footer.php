<?php // VARs & optional ACF code
$logo = get_template_directory_uri() . '/assets/img/svg/waltz-creative-logo-horiz-white.svg';
$phone = get_field('company_phone', 'option');
$email = get_field('company_email', 'option');
$address = get_field('company_address', 'option');
$copyright = get_field('company_copyright', 'option');
$footer_code = get_field('footer_code', 'option');
$footer_blocks = get_field('footer_blocks', 'option');
$footer_cta = get_field('footer_cta');
?>

<?php if (!empty($footer_cta['content'])) { ?>
  <section class="footer-cta" style="background-color:<?= $footer_cta['background_color']; ?>;">
    <div class="container">
      <div class="inner">
        <?= $footer_cta['content']; ?>
      </div>
    </div>
  </section>
<?php } ?>

</main>


<footer class="footer" style="position:relative;z-index:10;">
  <div class="container ">
    <div class="footer-blocks">
      <div class="footer-block-entry subscribe">
        <small>Subscribe FOR UPDATES</small>
        <?php gravity_form(4, false, false, false, '', true); ?>
      </div>
      <?php foreach ($footer_blocks as $block) : ?>
        <div class="footer-block-entry">
          <small><?= $block['title']; ?></small>
          <div class="footer-block-entry--content">
            <?= $block['content']; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="footer-coda">
      <div class="footer-logo">
        <a href="<?= home_url(); ?>" aria-label="Return to Homepage">
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/Waltz-20Anniv-Lockup.svg" alt="Waltz 20th Anniversary">
        </a>
      </div>
      <div class="footer-privacy">
        <div class="copyright-menu">&copy; <?= do_shortcode('[year]') ?> WALTZ CREATIVE
          <ul>
            <li><a href="/privacy-policy/">Privacy</a></li>
            <li><a href="/cookie-policy-us/">Cookies</a></li>
          </ul>
        </div>
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/women-owned-logo-pink.svg" alt="Womed Owned Business">
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<?php if (isset($footer_code)) {
  echo $footer_code;
} ?>
<?php
if (is_page_template('templates/tpl-campaign-clients.php') || is_page_template('templates/tpl-campaign-visitors.php')) {
?>
  <script type="text/javascript">
    window._mfq = window._mfq || [];
    (function() {
      var mf = document.createElement("script");
      mf.type = "text/javascript";
      mf.defer = true;
      mf.src = "//cdn.mouseflow.com/projects/55d33fd0-ce84-442a-b339-405c098ad82f.js";
      document.getElementsByTagName("head")[0].appendChild(mf);
    })();
  </script>
<?php } ?>
<?php if (is_page_template('templates/tpl-portfolio-masonry.php')) { ?>
  <a class="portfolio-back-to-top bare-link" href="#" aria-label="hidden">
    <div class="wrap">
      <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/icon-dropdown-arrow.svg" alt="Back to top">
    </div>
  </a>
<?php } ?>
</body>

</html>