<div id="client-popup-<?= $work_id; ?>" class="client-popup <?= $popup_class; ?>">
  <?php if (!empty($popup_video)) {
    preg_match('/src="(.+?)"/', $popup_video, $matches);
    $src = $matches[1];
    $params = array(
      'autoplay'  => 1,
      'muted' => 1,
    );
    $new_src = add_query_arg($params, $src);
    $popup_video = str_replace($src, $new_src, $popup_video);

    $attributes = 'frameborder="0"';
    $popup_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $popup_video);
  ?>
    <div class="client-popup--video">
      <div class="embed-container">
        <?= $popup_video; ?>
      </div>

    </div>
  <?php } ?>

  <?php if (!empty($popup_image)) { ?>
    <div class="client-popup--image">
      <?= wp_get_attachment_image($popup_image['id'], 'full', false, ['class' => $popup_class]); ?>
    </div>
  <?php } ?>

  <div class="client-popup--info flex <?= $popup_class; ?>">
    <div class="client-popup--project-title">
      <div class="client-popup--title h6">
        <?= $project_title; ?>
      </div>

      <?php if (!empty($project_title)) { ?>
        <div class="client-popup--subtitle small-header uppercase">
          <?= $client_name; ?>
        </div>
      <?php } ?>

      <?php if ((!empty($related_link['url'])) || (!empty($related_case_study))) {  ?>
        <div class="client-popup--case-study">
          <?php if (!empty($related_link['url'])) : ?>
            <a <?= !empty($related_link['target']) ? 'target="_blank"' : null; ?> href="<?= esc_url($related_link['url']); ?>" title="<?= esc_attr($related_link['title']); ?>">
              <?= esc_html($related_link['title']); ?>
            </a>
          <?php else: ?>
            <?php if (!empty($related_case_study)) { ?>
              <a href="<?= get_the_permalink($related_case_study[0]->ID); ?>">View Case Study</a>
            <?php } ?>
          <?php endif; ?>
        </div>
      <?php } ?>
    </div>

    <div class="client-popup--info-secondary">

      <?php if ($work_tags && !is_wp_error($work_tags)) : ?>
        <div class="client-popup--tags work-tags flex">
          <p class="small-header uppercase">Tags:</p>
          <div class="work-tags-list">
            <?php foreach ($work_tags as $tag) :
              $tag_slug = $tag->slug;
              $tag_name = $tag->name;
            ?>
              <a href="#" class="term-<?= esc_attr($tag_slug); ?>">#<?= esc_html($tag_name); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($show_award)) { ?>
        <div class="client-popup--award award-tag">
          <div class="award-icon">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/svg/work-award.svg" alt="Award Winner">
          </div>
          <?php if (!empty($award_text)) { ?>
            <div class="award-text">
              <?= $award_text; ?>
            </div>
          <?php } ?>
        </div>
      <?php } ?>


    </div>


  </div>


</div>