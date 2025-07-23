<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>
<?php if (have_posts()):
    $title = esc_html(get_field('title_position'));
    $secondary_title = esc_html(get_field('secondary_title'));
    $bio = get_field('bio');
    $bio_image = get_field('bio_image');
    ?>
		<?php while (have_posts()): the_post();?>
				<section class="team-single">
					<div class="container grid">
						<div class="team-single--info">
							<div class="name">
								<?php the_title('<h1>', '</h1>');?>
							</div>
							<div class="title">
								<h4><?=$title;?></h4>
							</div>
							<?php if ($secondary_title) {?>
							<div class="secondary-title">
								<h4><?=$secondary_title;?></h4>
							</div>
							<?php }?>
							<hr>
							<div class="bio">
								<?=$bio;?>
							</div>
						</div>
						<div class="team-single--photo">
							<div class="photo-wrap">
								<img src="<?=$bio_image;?>" alt="<?php the_title();?>" width="536" height="793">
							</div>
						</div>
					</div>
				</section>

			<?php endwhile;?>
	<?php endif;?>


<?php get_footer();?>
