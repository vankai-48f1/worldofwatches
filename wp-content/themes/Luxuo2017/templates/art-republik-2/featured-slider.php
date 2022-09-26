<?php
$featured_slider = get_field("art_slider", "option");

set_query_var("featured_slider", $featured_slider);

if(!empty($featured_slider)){
    get_template_part('templates/art-republik-2/featured-slider-custom');
}else{
    get_template_part('templates/art-republik-2/featured-slider-default');
}
?>