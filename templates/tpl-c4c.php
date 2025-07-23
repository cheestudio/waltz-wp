<?php
/* Template Name: C4C
========================================================= */?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<?php
$c4c_headers = get_field('c4c_headers');
$c4c_intro_copy = get_field('c4c_intro_copy');
$c4c_blocks = get_field('c4c_blocks');
?>

<section class="c4c-intro">
  <div class="container">
    <div class="c4c-intro--primary">

      <div class="c4c-intro--content services-content">
        <div class="c4c-intro--logo">
          <img src="<?= home_url();?>/wp-content/uploads/2023/01/C4C-Horizontal-Color.svg" alt="">
        </div>
        <div class="c4c-intro--image">
          <img src="<?= home_url();?>/wp-content/uploads/2023/01/c4c-header-image.png" alt="">
        </div>
        <div class="c4c-intro--headers stacked">
          <div class="hover-text">
            <?=$c4c_headers['primary'];?>
          </div>
          <div class="hover-text">
            <?=$c4c_headers['secondary'];?>
          </div>
        </div>
        <?=$c4c_intro_copy;?>
      </div>
    </div>
  </div>

  <div class="c4c-intro--secondary">
    <div class="c4c-callouts">
      <div class="grid container">
        <?php $i = 0;foreach ($c4c_blocks as $block): $i++;?>
        <?php
      if (!empty($block['link']['url'])) {?>
        <a class="c4c-callout-entry bare-link" <?=!empty($block['link']['target']) ? 'target="_blank"' : null;?> href="<?=esc_url($block['link']['url']);?>" title="<?=esc_attr($block['link']['title']);?>">
          <div class="inner-copy">
            <h4 class="c4c-callout-entry--header"><?=$block['header'];?></h4>
            <?php if ($i == 1) {?>
            <img class="box-accent pencil" src="<?= home_url();?>/wp-content/uploads/2023/01/c4c-tangerine-moon.svg" alt="">
            <?php }?>
            <?php if ($i == 2) {?>
            <img class="box-accent heart" src="<?= home_url();?>/wp-content/uploads/2023/01/c4c-pink-heart.svg" alt="">
            <?php }?>
            <div class="c4c-callout-entry--copy">
            <?=$block['copy'];?>
            </div>
            <div class="arrow-link">
              <span><?=esc_html($block['link']['title']);?></span>
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51">
                  <g>
                    <g transform="rotate(-45 25.5 25.5)">
                      <path fill="#2d302d" d="M35.469 8.675V28.96l4.695 4.697-1.85 1.849-5.186-5.187.01-.01-23.73-23.73-4.897 4.896 26.06 26.06h-.011l2.85 2.852-1.85 1.85-4.699-4.701H6.608v6.926h35.788V8.675z" />
                    </g>
                  </g>
                </svg>
              </span>
            </div>
          </div>
        </a>
        <?php }?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</section>


<?php if (have_posts()): ?>
<?php while (have_posts()): the_post();?>
<div class="c4c-content">
  <?php the_content();?>
</div>
<?php endwhile;?>
<?php endif;?>



<?php get_footer();?>