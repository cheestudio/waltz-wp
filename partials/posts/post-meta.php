
  <?php // Do not display on Search Results page
  if ( !is_search() ) : ?>
    <div class="post-meta">

          <?php // Author
          $author_id = get_the_author_meta('ID');
          $name = get_the_author_meta('display_name');
          $url  = get_author_posts_url($author_id); 
          $photo = get_field('author_photo','user_'.$author_id);
          ?>

          <div class="authors meta-entry">
            <div class="author-inner">
              <span class="author-photo"><?= wp_get_attachment_image( $photo['id'], 'thumbnail' ); ?></span>
              <span class="name">By <?= $name; ?></span>
            </div>
        </div>


        <small class="date meta-entry">
          <time datetime="<?= get_the_time( 'c' ); ?>"><?= get_the_date(); ?></time>
        </small>

      <?php // Tags
      if ( get_the_tags() ): ?>
        <small class="tags meta-entry">
          <strong>Tags: </strong><?php the_tags( '' ); ?>
        </small>
      <?php endif; ?>


      <?php // Categories
      if ( get_the_category() ) : ?>
        <small class="categories meta-entry">
          <?php the_category( ', ' ); ?>
        </small>
      <?php endif; ?>


    </div>
  <?php endif; ?>
