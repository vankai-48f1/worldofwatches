<?php 
$mrec_1 = get_field('mrec_1');
$mrec_1_click_url = get_field('mrec_1_click_url');
if(!empty($mrec_1)){
?>
    <div id="ad-space-sidebar-container" class='zone-mpu'>
		<a href="<?php echo !empty($mrec_1_click_url) ? $mrec_1_click_url : 'javascript:void(0)'?>" target="_blank">
		<?php if(!empty($mrec_1_click_url)){ ?>
            <a href="<?php echo $mrec_1_click_url; ?>" target="_blank">
        <?php }else{ ?>
            <a href="javascript:void(0)">
        <?php } ?>
			<img src="<?php echo $mrec_1; ?>" />
		</a>
    </div>
<?php
}
?>