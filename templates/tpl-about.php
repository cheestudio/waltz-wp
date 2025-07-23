<?php
/* Template Name: About/Team
========================================================= */?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>



<?php $intro = get_field('about_intro');?>
<section class="about-intro">
  <div class="container">
    <div class="about-intro--header">
      <h1 class="hover-text"><?=esc_html($intro['header']);?></h1>
    </div>
    <div class="about-intro--copy">
      <?=$intro['copy'];?>
    </div>
  </div>
</section>

<?php $team_grid = get_field('team_grid');?>
<section class="team-grid">
  <div class="container">

    <div class="team-grid-row--intro grid">
      <div class="image-block">
        <?=wp_get_attachment_image($team_grid['wide_image']['id'], 'full');?>
        <img class="mobile-image-swap" src="https://waltzcreative.com/wp-content/uploads/2021/06/robert-soren-mobile-square@2x.jpg" alt="">
      </div>
      <div class="members-block grid">
        <div class="team-member-entry hovered">
          <div class="team-member-entry--image">
            <div class="rest hover-image">
              <?=wp_get_attachment_image($team_grid['sticker_image']['id'], 'full');?>
            </div>
            <div class="hover hover-image">
              <?=wp_get_attachment_image($team_grid['sticker_image_hover']['id'], 'full');?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team-grid-row--one grid">
      <div class="copy-block">
        <div class="inner">
          <?=$team_grid['copy_block'];?>
        </div>
      </div>
      <div class="members-block grid">
        <?php $team = $team_grid['team_members_block_1'];?>
        <?php include locate_template('partials/elements/team-entry-loop.php');?>
      </div>
    </div>
    <div class="team-grid-row--two grid">
      <div class="members-block grid">
        <?php $team = $team_grid['team_members_block_2'];?>
        <?php include locate_template('partials/elements/team-entry-loop.php');?>
      </div>
      <div class="image-block">
        <?=wp_get_attachment_image($team_grid['block_image_1']['id'], 'full');?>
      </div>
    </div>
    <div class="team-grid-row--three grid">
      <div class="image-block">
        <?=wp_get_attachment_image($team_grid['block_image_2']['id'], 'full');?>
      </div>
      <div class="members-block grid">
        <?php $team = $team_grid['team_members_block_3'];?>
        <?php include locate_template('partials/elements/team-entry-loop.php');?>
      </div>
    </div>
    <div class="team-grid-row--four">
      <div class="members-block grid">
        <?php $team = $team_grid['additional_team'];?>
        <?php include locate_template('partials/elements/team-entry-loop.php');?>
      </div>
    </div>
</section>

<?php $outro = get_field('about_outro_content');?>
<?php if($outro['image']){ ?>
  <section class="about-outro--image">
    <?=wp_get_attachment_image($outro['image']['id'], 'post-hero');?>
  </section>
  <?php } ?>

<section class="about-outro">
  <div class="container">
    <div class="about-outro--primary">
      <div class="about-outro--header hover-text h1">
        <?=$outro['header'];?>
      </div>
      <div class="about-outro--copy">
        <?=$outro['copy'];?>
      </div>
    </div>
    <div class="about-outro--secondary grid">
      <div class="column">
        <?=$outro['content_column_primary'];?>
      </div>
      <div class="column">
        <?=$outro['content_column_secondary'];?>
      </div>
    </div>
  </div>
</section>

<?php get_footer();?>

