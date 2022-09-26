<footer class="amp-wp-footer">    
    <?php
    $instaResult= file_get_contents('https://www.instagram.com/luxuo/media/');
    
    
    if( !empty($instaResult) ){
        $insta = json_decode($instaResult);
        $items = $insta->items;
        
        if( !empty($items) ){
    ?>
        <div class="instagram_wrapper">
            <h3>Follow us on Instagram @Luxuo</h3>
            
            <amp-carousel height="150"
                layout="fixed-height"
                type="carousel">
                
                <?php 
                foreach($items as $key=>$ig){
                    $url = $ig->{link};
                    $images = $ig->images;
                    $thumbnail = $images->thumbnail;
                    $img = $thumbnail->url;
                    $text = $ig->caption->text;
                ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_html( $text ); ?>" class="logo_button" target="_blank">
                        <amp-img src="<?php _e( esc_html( $img ) ); ?>" width="150" height="150"></amp-img>
                    </a>
                <?php } ?>
            </amp-carousel>
        </div>
    <?php 
        }
    }
    ?>
    
    <hr>
    
	<div>
		<div class="copyright"> 
            Copyright &copy; 2017 LUXUO. All Rights Reserved.
            
            <div class="footer-follow-us">
                    <div class="menu-social-container footer-social-container">
                      <a href="https://www.facebook.com/luxuo" target="_blank">
                        <svg version="1.1" id="Layer_1" class="black-fb" x="0px" y="0px" style="margin-left:-4px;"
                           viewBox="0 0 155.5 144" xml:space="preserve">
                        <path id="fb" d="M38.9,68.1h14.4v75.4h31V68.1h19.3l5.3-22.8H84.3v-8.5c-1.6-6.3,2.2-12.8,8.5-14.5c1.6-0.4,3.3-0.5,5-0.2
                          c4.8,0.5,9.3,2.4,13.2,5.3L116.6,6c-8-3-16.3-4.9-24.8-5.5c-7.9-0.2-15.8,1.2-23.2,4.2c-5.3,2.7-9.5,7-12,12.4
                          c-2.5,6.1-3.7,12.6-3.3,19.2v9H38.9L38.9,68.1L38.9,68.1z"/>
                        </svg>
                      </a>
                      <a href="https://www.instagram.com/luxuo" target="_blank">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-instagram" style="margin-left:-4px"
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
                      <a href="https://www.twitter.com/luxuo" target="_blank">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-twitter"
                           viewBox="0 0 155.5 144" xml:space="preserve">
                        <path id="Vector_Logo" d="M155.5,24.3c-6.6,2.7-13.6,4.5-20.7,5.3c7.3-5.3,12.7-12.7,15.5-21.2c-6.1,3.7-13.4,9.2-20.7,10.6
                          c-5.4-6.5-13.4-10.4-21.9-10.6C90,8.5,77.7,22.5,77.7,40.2c-0.3,3.5-0.3,7.1,0,10.6c-26.5-1.3-51.6-17.7-67.3-37.1
                          C7.3,18.5,5.5,24,5.2,29.6c0.5,10.8,6.3,20.8,15.5,26.5c-5,0.2-10-0.8-14.5-3v0.4c0,15.5,10.3,31.4,24.8,34.3
                          c-3.4,0.4-6.9,0.4-10.3,0c-1.7,0.2-3.5,0.2-5.2,0c4.8,12.9,17.3,21.4,31.1,21.2c-11.2,8.5-25,13-39,12.5c-2.6-0.5-5.1-1.1-7.6-1.9
                          c14.4,9.9,31.4,15.4,48.9,15.9c58.6,0,90.7-48.9,90.7-91.3c0-1.4,0-2.8-0.1-4.2C145.8,35.9,151.2,30.5,155.5,24.3z"/>
                        </svg>

                      </a>
                      <a href="https://www.pinterest.com/luxuo" target="_blank">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-pinterest"
                           viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                          <path d="M256,32C132.3,32,32,132.3,32,256c0,91.7,55.2,170.5,134.1,205.2c-0.6-15.6-0.1-34.4,3.9-51.4
                            c4.3-18.2,28.8-122.1,28.8-122.1s-7.2-14.3-7.2-35.4c0-33.2,19.2-58,43.2-58c20.4,0,30.2,15.3,30.2,33.6
                            c0,20.5-13.1,51.1-19.8,79.5c-5.6,23.8,11.9,43.1,35.4,43.1c42.4,0,71-54.5,71-119.1c0-49.1-33.1-85.8-93.2-85.8
                            c-67.9,0-110.3,50.7-110.3,107.3c0,19.5,5.8,33.3,14.8,43.9c4.1,4.9,4.7,6.9,3.2,12.5c-1.1,4.1-3.5,14-4.6,18
                            c-1.5,5.7-6.1,7.7-11.2,5.6c-31.3-12.8-45.9-47-45.9-85.6c0-63.6,53.7-139.9,160.1-139.9c85.5,0,141.8,61.9,141.8,128.3
                            c0,87.9-48.9,153.5-120.9,153.5c-24.2,0-46.9-13.1-54.7-27.9c0,0-13,51.6-15.8,61.6c-4.7,17.3-14,34.5-22.5,48
                            c20.1,5.9,41.4,9.2,63.5,9.2c123.7,0,224-100.3,224-224C480,132.3,379.7,32,256,32z"/>
                        </g>
                        </svg>
                      </a>
                    </div>
                  </div>
        </div>
        
        <?php
            $tncMenus = wp_get_nav_menu_items('Terms and Conditions','');
            $i = 1;
        ?>
        
        <?php
        wp_nav_menu( array(
            'menu'           => 'Terms and Conditions', // Do not fall back to first non-empty menu.
            'theme_location' => '__no_such_location',
        ) );
        ?>
        
		<a href="#top" class="back-to-top"><?php _e( 'Back to top', 'amp' ); ?></a>
	</div>
</footer>
