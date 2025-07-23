<?php 
  get_header();
?>


<section class="posts-index">
  <div class="container">

    <div class="posts-index--title">
      <h1>Show <span>&</span> Tell</h1>
    </div>

    <div class="posts-index--header">
      <div class="posts-index--nav">
        <?=facetwp_display('facet', 'blog_categories')?>
      </div>
      <div class="posts-index--subscribe subscribe-form">
        <small>Subscribe FOR UPDATES</small>
        <?php gravity_form(8, false, false, false, '', true);?>
      </div>
    </div>

    <div class="posts-index--content">
      <?php if (have_posts()): ?>
      <div class="posts-loop">
        <?php while (have_posts()): the_post();?>
        <?php include locate_template('partials/posts/post-entry.php');?>
        <?php endwhile;?>
      </div>

      <div class="load-more">
        <?=facetwp_display('facet', 'load_more')?>
      </div>

      <?php else: ?>
      <h2>No Posts Found</h2>
      <?php get_search_form();?>

      <?php endif;?>
    </div>

    <noscript>
      <?php if ($wp_query->max_num_pages > 1): ?>
      <div class="posts-index--pagination">
        <?php include locate_template('partials/posts/post-pagination.php');?>
      </div>
      <?php endif;?>
    </noscript>

  </div>
</section>


<?php get_footer();?>