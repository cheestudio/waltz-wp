<?php // Assign custom mobile logo path, or will use Desktop instead
$menu_blocks = get_field('menu_blocks', 'option');
?>
<div class="nav-wrap">

  <div class="nav-toggle-wrap">

    <div class="breadcrumbs scroll-down">
      <?php
      if (is_page_template('templates/tpl-campaign-clients.php') || is_page_template('templates/tpl-campaign-visitors.php')) {
        echo '<span class="current-title"><a href="https://waltzcreative.com">Main Site</a></span>';
      } else {
        echo breadcrumbs();
      }
      ?>
    </div>


    <button class="navbar-toggle" title="Tap to Open Menu" data-cursor="Explore">
      <div class="icon-bars">
        <div class="icon-bar-entry">
          <span class="icon-bar top"></span>
        </div>
        <div class="icon-bar-entry">
          <span class="icon-bar middle"></span>
        </div>
        <div class="icon-bar-entry">
          <span class="icon-bar bottom"></span>
        </div>
      </div>
    </button>
  </div>

  <div class="nav-inner">

    <div class="flex">
      <div class="nav-menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary_nav',
          'container' => '',
          'container_class' => '',
          'menu_id' => '',
          'menu_class' => 'mobile-menu',
          'echo' => true,
          'fallback_cb' => 'wp_page_menu',
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth' => 1,
        )); ?>

      </div>
      <div class="nav-info">

        <!-- <a href="/schipper-design-rebrands-itself/" target="_blank" rel="noopener" class="nav-stamp primary">
          <span class="inner-text">
            LEARN ABOUT OUR REBRAND
          </span>
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/schipper-stamp.svg" alt="">
        </a> -->

        <div class="nav-info-entries">
          <?php foreach ($menu_blocks as $block) : ?>
            <div class="nav-info--entry">
              <div class="title">
                <?= $block['title']; ?>
              </div>
              <div class="content">
                <?= $block['content']; ?>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="nav-info--entry subscribe">
            <div class="title">STAY UPDATED</div>
            <?php gravity_form(7, false, false, false, '', true); ?>

          </div>
        </div>
      </div>
    </div>

  </div>

</div>