<?php
foreach ($team as $member):
    $placeholder = get_field('placeholder_image', $member->ID);
    $name = esc_html(get_the_title($member->ID));
    $title = esc_html(get_field('title_position', $member->ID));
    $hover_image = get_field('profile_image_hover', $member->ID);
    ?>
			<?php if (!$placeholder): //do not link placeholder profiles ?>
				<div class="team-member-entry bio-entry">
						<a data-cursor="View" href="<?=get_permalink($member->ID);?>" class="bare-link<?php if ($hover_image) { echo ' hovered'; } ?>" title="View <?=strtok($name, " ");?>'s Bio">
							<?php else: ?>
						<div class="team-member-entry <?php if ($hover_image) { echo ' hovered'; }?>">
						<?php endif;?>
					<div class="team-member-entry--image">
						<img class="rest hover-image" src="<?=get_field('profile_image', $member->ID);?>" alt="<?=get_the_title($member->ID);?> - <?=get_field('title_position', $member->ID);?>" width="398" height="398">
						<?php if ($hover_image) {?>
						<img class="hover hover-image" src="<?=$hover_image;?>" alt=" " width="398" height="398">
						<?php }?>
					</div>
					<?php if (!$placeholder) { //no info for placeholder profiles ?>
						<div class="team-member-entry--info">
							<div class="name-title">
								<?=$name;?> | <?=$title;?>
							</div>
						</div>
					<?php }?>
					<?php if (!$placeholder): //do not link placeholder profiles?>
							</a>
							</div>
							<?php else: ?>
					</div>
				<?php endif;?>
			<?php endforeach;?>