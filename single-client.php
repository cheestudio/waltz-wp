<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>


<?php if (have_posts()): ?>
<section class="client-single">

  <div class="client-single--content">
    <?php while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;?>
  </div>


  <?php
  $current_post = get_the_ID();
$term = get_the_terms(get_the_ID(), 'client_type');
$current_term = $term[0];
$related_projects = new WP_Query(array(
    'post_type' => 'client',
    'client_type' => $term[0]->slug,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'post__not_in' => array($current_post)
));?>
  <?php if ($related_projects->have_posts()): ?>
  <div class="client-single--related">
    <small>Related Work</small>
    <div class="project-slider grid">
      <?php while ($related_projects->have_posts()): $related_projects->the_post();?>
      <?php $image = get_field('hero_image');?>
      <div class="project-entry">
        <a data-cursor="view" href="<?php the_permalink();?>"><?=wp_get_attachment_image($image['id'], 'large');?>
          <h6><?php the_title();?></h6>
        </a>
      </div>
      <?php endwhile;?>
      <?php endif;?>
    </div>
  </div>
  <?php wp_reset_postdata();?>
</section>
<?php endif;?>


<?php get_footer();