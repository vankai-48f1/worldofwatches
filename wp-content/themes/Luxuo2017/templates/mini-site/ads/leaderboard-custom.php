<?php 
$leaderboard = get_field('desktop_leaderboard_ad');
$mobile_leaderboard_ad = get_field('mobile_leaderboard_ad');
$leaderboard_click_url = get_field('leaderboard_click_url');
if(!empty($leaderboard) || !empty($mobile_leaderboard_ad)){
?>
    <div id="ads-space-leaderboard-custom" class="zone-leaderboard">
        <?php if( !empty($leaderboard_click_url) ){ ?>
            <a href="<?php echo $leaderboard_click_url; ?>" target="_blank">
        <?php }else{ ?>
            <a href="javascript:void(0)">
        <?php } ?>
            <?php if(!empty($leaderboard)){ ?>
                <img src="<?php echo $leaderboard; ?>" id="d_leaderboard_creative"/>
            <?php } ?>
                
            <?php if(!empty($mobile_leaderboard_ad)){ ?>
                <img src="<?php echo $mobile_leaderboard_ad; ?>" id="m_leaderboard_creative"/>
            <?php } ?>
        </a>
    </div>
<?php
}
?>