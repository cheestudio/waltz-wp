<?php
if (!defined('ABSPATH')) {
 exit;
}

get_header();
$subtitle = get_field('subtitle_content');
$hero_image = get_the_post_thumbnail_url($post->ID, 'post-hero');
?>

<?php if (have_posts()): ?>
  <section class="post-single">

<div class="post-single--hero">
<?php the_post_thumbnail('post-hero');?>
</div>

    <div class="container">

      <div class="post-single--content">
        <?php while (have_posts()): the_post();?>
	          <?php include locate_template('partials/posts/post-single.php');?>
	        <?php endwhile;?>
      </div>

    </div>

  </section>
<?php endif;?>


<?php get_footer();?>
