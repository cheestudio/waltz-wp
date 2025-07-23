<?php $secondary_featured_image = get_field('secondary_featured_image');?>
<article class="post-entry scrolled">
    <div class="post-entry--image">
      <a data-tilt data-cursor="view" href = "<?php the_permalink();?>" title = "Read more about <?php the_title();?>" class="bare-link">
      <span class="image">
  <?php if ($secondary_featured_image): ?>
      <?=wp_get_attachment_image($secondary_featured_image['id'], 'large');?>
      <?php else: ?>
        <?php the_post_thumbnail('large');?>
<?php endif;?>
      </span>
      <span class="box-highlight"></span>
    </a>
  </div>

<div class="post-entry--info">
  <div class="post-entry--title">
    <div class="post-entry--categories">
      <?php $category = get_the_category();?>
      <small><?=$category[0]->cat_name;?></small>
    </div>
    <h3>
      <a href = "<?php the_permalink();?>" title = "Read more about <?php the_title();?>"><?php the_title();?></a>
    </h3>
  </div>

  <div class="post-entry--excerpt">
    <?php the_excerpt();?>
    <div class="post-entry--read-more">
      <a href="<?php the_permalink();?>"><small>Read More</small></a>
    </div>
  </div>
</div>

</article>
