<article class="article-single">

  <div class="article-single__title">
    <?= $subtitle;?> 
  </div>

  <div class="grid single-post-grid">
    <div class="article-single__meta">
      <?php include( locate_template('partials/posts/post-meta.php') ); ?>
    </div>
    
    <div class="article-single__content">
      <?php the_content(); ?>
    </div>
  </div>

</article>


<?php //comments_template('/partials/posts/comments.php'); ?>
