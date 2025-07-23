<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<section class="posts-index">
  <div class="container">

    <div class="posts-index--title">
      <small>
      <?php
        if ( is_category() ) :
          echo single_cat_title( '<strong>CATEGORY: </strong>');

        elseif ( is_tag() ) :
          echo single_tag_title( '<strong>TAG: </strong>' );

        elseif ( is_author() ) :
          the_post();
          echo '<strong>AUTHOR: </strong>' . get_the_author();
          rewind_posts();

        else :
          _e( 'Archives');

        endif; ?>
      </small>
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
</div>


<?php get_footer(); ?>