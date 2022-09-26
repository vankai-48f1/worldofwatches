<?php 
$leaderboard = get_field('leaderboard');
if(!empty($leaderboard)){
?>
    <div id="ads-space-leaderboard-custom">
        <img src="<?php echo get_acf_image($leaderboard, 'large'); ?>" />
    </div>
<?php
}
?>