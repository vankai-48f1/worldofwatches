<?php 
$mrec_2 = get_field('mrec_2');
$mrec_2_click_url = get_field('mrec_2_click_url');
if(!empty($mrec_2)){
?>
    <div id="ad-space-sidebar-container" class='zone-mpu'>
		<?php if( !empty($mrec_2_click_url) ){ ?>
            <a href="<?php echo $mrec_2_click_url; ?>" target="_blank">
        <?php }else{ ?>
            <a href="javascript:void(0)">
        <?php } ?>
			<img src="<?php echo $mrec_2; ?>" />
		</a>
    </div>
<?php
}
?>