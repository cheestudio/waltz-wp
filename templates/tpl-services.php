<?php
/* Template Name: Services
========================================================= */?>

<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<?php $services = get_field('services_list_rel');?>
<section class="services-content">
  <div class="container">
    <div class="services-content--header">
      <div class="hover-text first-line">
        BRINGING YOUR
      </div>
      <div class="hover-text second-line">BRAND TO LIFE</div>
      <div class="hover-text third-line">ACROSS PIXELS,</div>
      <div class="hover-text fourth-line">PRINT & SPACE</div>
    </div>
    <div class="services-content--services arrow-link-list">
      <?php
if ($services): ?>
      <ul>
        <?php foreach ($services as $post): ?>
        <?php setup_postdata($post);?>
        <li><a class="bare-link" href="<?php the_permalink();?>">
            <span class="text"><?php the_title();?></span>
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51">
                <g>
                  <g transform="rotate(-45 25.5 25.5)">
                    <path fill="#2d302d" d="M35.469 8.675V28.96l4.695 4.697-1.85 1.849-5.186-5.187.01-.01-23.73-23.73-4.897 4.896 26.06 26.06h-.011l2.85 2.852-1.85 1.85-4.699-4.701H6.608v6.926h35.788V8.675z" />
                  </g>
                </g>
              </svg>
            </span>
          </a></li>
        <?php endforeach;?>
      </ul>
      <?php wp_reset_postdata();?>
      <?php endif;?>
    </div>
  </div>
</section>

<?php
$creative_process = get_field('creative_process_group');
$steps = $creative_process['steps'];
?>


<section class="creative-process">
  <div class="container">
    <div class="creative-process--intro">
      <?=$creative_process['intro'];?>
    </div>
    <div class="creative-process--steps">
      <?php $i = 0;foreach ($steps as $step): $i++;?>
      <div class="step-entry entry-0<?=$i;?>">
        <div class="step-entry--copy">
          <?=$step['copy'];?>
        </div>
        <div class="step-entry--path">
          <?php if 
            ($i == 1) {

              echo '<svg version="1.1" class="service-path service-path-01" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="95.7px" height="167.4px" viewBox="0 0 95.7 167.4" style="enable-background:new 0 0 95.7 167.4;" xml:space="preserve">
              <style type="text/css">
                .line-dash{fill:none;stroke:#FFFFFF;stroke-width:2.5;stroke-miterlimit:10;stroke-dasharray:9,6;}
                .line-cover{fill:none;stroke:#B5E3D8;stroke-width:3.5;stroke-miterlimit:10;}
              </style>
              <path class="line-dash" d="M6.3,0.4C4,7.3-10.2,63.2,22.5,113.8c16.7,26.2,42.8,44.9,72.9,52.4"/>
              <path class="line-cover" d="M95.4,166.2C65.3,158.7 39.2,140 22.5,113.8C-10.2,63.2 4,7.3 6.3,0.4"/>
              </svg>';          

            } elseif ($i == 2) {
              
              echo '<svg version="1.1" class="service-path service-path-03" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="47.2px" height="101.1px" viewBox="0 0 47.2 101.1" style="enable-background:new 0 0 47.2 101.1;" xml:space="preserve">
              <style type="text/css">
                .line-dash{fill:none;stroke:#FFFFFF;stroke-width:2.5;stroke-miterlimit:10;stroke-dasharray:9,6;}
                .line-cover{fill:none;stroke:#B5E3D8;stroke-width:3.5;stroke-miterlimit:10;}
              </style>
              <path class="line-dash" d="M44,0.2c7.8,39.1-9.5,78.8-43.4,99.8"/>
              <path class="line-cover" d="M0.7,100C34.5,79.1,51.8,39.3,44,0.2"/>
              </svg>';

            } elseif ($i == 3) {
              
              echo '<svg version="1.1" class="service-path service-path-02" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              width="148.5px" height="154.3px" viewBox="0 0 148.5 154.3" style="enable-background:new 0 0 148.5 154.3;" xml:space="preserve"
             >
           <style type="text/css">
             .line-dash{fill:none;stroke:#FFFFFF;stroke-width:2.5;stroke-miterlimit:10;stroke-dasharray:9,6;}
             .line-cover{fill:none;stroke:#B5E3D8;stroke-width:3.5;stroke-miterlimit:10;}
           </style>
           <path class="line-dash" d="M66.3,0.9c0,0-25.5,26-33.4,31.4S12.7,45.5,5.2,36.5S2,11.2,12.3,9.1
             c11-2.2,16,1.2,18.5,7c4.4,10.9,7.9,22.1,10.5,33.5c3.2,14,5.8,28.1,16.6,48.4c0,0,24.3,43.6,90.4,55"/>
           <path class="line-cover" d="M148.3,153.1c-66-11.4-90.4-55-90.4-55C47.2,77.8,44.5,63.7,41.4,49.7C38.8,38.3,35.3,27,30.9,16.2
             c-2.5-5.9-7.5-9.2-18.5-7C2,11.2-2.4,27.5,5.2,36.5s19.9,1.1,27.7-4.3S66.3,0.9,66.3,0.9"/>
           </svg>';

            }
            ?>
        </div>
      </div>
      <?php endforeach;?>

    </div>
  </div>
</section>

<?php $outro = get_field('services_outro');?>
<section class="services-outro members-block">
  <div class="services-waves"></div>
  <small>THE WALTZ WAY</small>
  <div class="container grid">
    <?php $i = 0;foreach ($outro as $entry): $i++;?>
    <div class="services-outro-entry">
      <div class="icon fade-entry">
        <?=wp_get_attachment_image($entry['icon']['id'], 'full');?>
      </div>
      <div class="title hover-text text-entry-0<?=$i;?>">
        <?=$entry['title'];?>
      </div>
      <div class="copy">
        <?=$entry['copy'];?>
      </div>
    </div>
    <?php endforeach;?>

  </div>
</section>
<?php get_footer();?>