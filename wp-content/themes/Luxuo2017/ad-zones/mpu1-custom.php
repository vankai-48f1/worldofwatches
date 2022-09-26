<?php 
$leaderboard = get_field('medium_rectangle_sidebar_1');
if(!empty($leaderboard)){
?>
    <div id="ad-space-sidebar-container">
        <img src="<?php echo get_acf_image($leaderboard, 'large'); ?>" />
    </div>
<?php
}
?>