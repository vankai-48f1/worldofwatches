<div class="category-sidebar-container">
    <aside class='mag-page-section mag-page-sidebar col-xs-12 col-sm-4 col-md-4 sidebar-container'>
        <div class='issue-cover'>
            <?php
            $page = get_page_by_path('artrepublik');
            wp_reset_postdata();
            wp_reset_query();
            $art_page_id = $page->ID;
            $issue_cover = get_field('magazine_issue_cover', $art_page_id);
            $issue_cover_thumb = $issue_cover['url'];
            $issue_cover_title = $issue_cover['title'];
            $article_obj = get_field('artitle_issue', $art_page_id);
            ?>
                <a href="<?php echo !empty($article_obj) ? esc_url(get_permalink($article_obj)) : 'javascript:void(0)'; ?>" title="<?php echo $issue_cover_title; ?>" alt="<?php echo $issue_cover_title; ?>">
                    <img src="<?= $issue_cover_thumb; ?>" title="<?php echo $issue_cover_title; ?>" alt="<?php echo $issue_cover_title; ?>">
                    <h2><?php echo $issue_cover_title; ?></h2>
                </a>
            <?php
            ?>
        </div>
        
        <?php get_template_part('ad-zones/mpu1'); ?>
        
        <div class='social'>
          <div class='social__platforms'>
            <a href='https://www.facebook.com/artrepublik.official' class='social__platform social__platform--fb'>
              <svg version="1.1" id="Layer_1" class="black-fb" x="0px" y="0px"
                viewBox="0 0 155.5 144" xml:space="preserve">
              <path id="fb" d="M38.9,68.1h14.4v75.4h31V68.1h19.3l5.3-22.8H84.3v-8.5c-1.6-6.3,2.2-12.8,8.5-14.5c1.6-0.4,3.3-0.5,5-0.2
                c4.8,0.5,9.3,2.4,13.2,5.3L116.6,6c-8-3-16.3-4.9-24.8-5.5c-7.9-0.2-15.8,1.2-23.2,4.2c-5.3,2.7-9.5,7-12,12.4
                c-2.5,6.1-3.7,12.6-3.3,19.2v9H38.9L38.9,68.1L38.9,68.1z"/>
              </svg>
            </a>
            <a href='https://www.instagram.com/art_republik/' class='social__platform social__platform--ig'>
              <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-instagram" style="margin-left: -4px;"
                viewBox="0 0 155.5 144" xml:space="preserve">
              <g>
                <path class="st0" d="M77.7,13c19.2,0,21.5,0.1,29.1,0.4c7,0.3,10.8,1.5,13.4,2.5c3.4,1.3,5.8,2.9,8.3,5.4c2.5,2.5,4.1,4.9,5.4,8.3
                  c1,2.5,2.2,6.3,2.5,13.4c0.3,7.6,0.4,9.9,0.4,29.1s-0.1,21.5-0.4,29.1c-0.3,7-1.5,10.8-2.5,13.4c-1.3,3.4-2.9,5.8-5.4,8.3
                  c-2.5,2.5-4.9,4.1-8.3,5.4c-2.5,1-6.3,2.2-13.4,2.5c-7.6,0.3-9.9,0.4-29.1,0.4s-21.5-0.1-29.1-0.4c-7-0.3-10.8-1.5-13.4-2.5
                  c-3.4-1.3-5.8-2.9-8.3-5.4c-2.5-2.5-4.1-4.9-5.4-8.3c-1-2.5-2.2-6.3-2.5-13.4c-0.3-7.6-0.4-9.9-0.4-29.1s0.1-21.5,0.4-29.1
                  c0.3-7,1.5-10.8,2.5-13.4c1.3-3.4,2.9-5.8,5.4-8.3c2.5-2.5,4.9-4.1,8.3-5.4c2.5-1,6.3-2.2,13.4-2.5C56.2,13.1,58.5,13,77.7,13
                  M77.7,0c-19.5,0-22,0.1-29.7,0.4C40.4,0.8,35.2,2,30.6,3.8c-4.7,1.8-8.7,4.3-12.7,8.3c-4,4-6.5,8-8.3,12.7
                  c-1.8,4.6-3,9.8-3.3,17.5C5.8,50,5.8,52.5,5.8,72c0,19.5,0.1,22,0.4,29.7c0.3,7.7,1.6,12.9,3.3,17.5c1.8,4.7,4.3,8.7,8.3,12.7
                  c4,4,8,6.5,12.7,8.3c4.6,1.8,9.8,3,17.5,3.3c7.7,0.4,10.1,0.4,29.7,0.4s22-0.1,29.7-0.4c7.7-0.3,12.9-1.6,17.5-3.3
                  c4.7-1.8,8.7-4.3,12.7-8.3c4-4,6.5-8,8.3-12.7c1.8-4.6,3-9.8,3.3-17.5c0.4-7.7,0.4-10.1,0.4-29.7s-0.1-22-0.4-29.7
                  c-0.3-7.7-1.6-12.9-3.3-17.5c-1.8-4.7-4.3-8.7-8.3-12.7c-4-4-8-6.5-12.7-8.3c-4.6-1.8-9.8-3-17.5-3.3C99.7,0.1,97.3,0,77.7,0
                  L77.7,0z"/>
                <path class="st0" d="M77.7,35c-20.4,0-37,16.5-37,37s16.5,37,37,37s37-16.5,37-37S98.1,35,77.7,35z M77.7,96c-13.2,0-24-10.7-24-24
                  s10.7-24,24-24s24,10.7,24,24S91,96,77.7,96z"/>
                <circle class="st0" cx="116.1" cy="33.6" r="8.6"/>
              </g>
              </svg>
            </a>
          </div>
        </div>
        
        <?php get_template_part('ad-zones/mpu2'); ?>
        
        <?php get_template_part('templates/common/editors-pick'); ?>
        
        <div class="small-mc-newsletter">
            <?php get_template_part('templates/common/mc-newsletter'); ?>
        </div>
    </aside>
</div>

