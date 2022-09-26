<?php
$featured_slider = get_field("wow_slider", "option");

set_query_var("featured_slider", $featured_slider);

if(!empty($featured_slider)){
    get_template_part('templates/watchwow-2/featured-slider-custom');
}else{
    get_template_part('templates/watchwow-2/featured-slider-default');
}
?>