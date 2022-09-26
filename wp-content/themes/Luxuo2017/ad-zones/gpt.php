<?php
//Generate random string based on date
$sl_random = date("Y-m-d-H-i-s");

//"zone-billboard"
$billboard_1 = "sl1-".$sl_random;
$billboard_2 = "sl2-".$sl_random;

//"zone-leaderboard"
$leaderboard1 = "lb1-".$sl_random;

//"zone-mpu"
$mpu1 = "mpu1-".$sl_random;
$mpu2 = "mpu2-".$sl_random;

//Set Query Variable
set_query_var("billboard_1", $billboard_1);
set_query_var("billboard_2", $billboard_2);
set_query_var("leaderboard1", $leaderboard1);
set_query_var("mpu1", $mpu1);
set_query_var("mpu2", $mpu2);
?>
<script type='text/javascript' id="gpt_zones">
    var gptAdSlots = [];
    googletag.cmd.push(function() {

        // Declare any slots initially present on the page
        gptAdSlots[0] = googletag.defineSlot('32360441/luxuo-billboard-1', [[1440, 180], [1440, 128], [768, 90], [468, 50]], '<?php echo $billboard_1; ?>')
            .defineSizeMapping(
                googletag.sizeMapping()
                    .addSize([992, 0], [1440, 180]) //Desktop
                    .addSize([768, 0], [1440, 128]) //Tablet
                    .addSize([568, 0], [[768, 90], [300, 100]]) //smartphone
                    .addSize([0, 0], [[468, 50], [300, 100]]) //smartphone
                    .build())
            .addService(googletag.pubads());

        gptAdSlots[1] = googletag.defineSlot('/32360441/luxuo-billboard-2', [[1440, 180], [1440, 128], [768, 90], [468, 50]], '<?php echo $billboard_2; ?>')
            .defineSizeMapping(
                googletag.sizeMapping()
                    .addSize([992, 0], [1440, 180]) //Desktop
                    .addSize([768, 0], [1440, 128]) //Tablet
                    .addSize([568, 0], [[768, 90], [300, 100]]) //smartphone
                    .addSize([0, 0], [[468, 50], [300, 100]]) //smartphone
                    .build())
            .addService(googletag.pubads());

        gptAdSlots[2] = googletag.defineSlot('/32360441/luxuo-leaderboard', [980, 120], '<?php echo $leaderboard1; ?>')
            .defineSizeMapping(
                googletag.sizeMapping()
                    .addSize([980, 200], [[980, 120], [980, 200]])
                    .addSize([730, 200], [[728, 90], [300, 250]])
                    .addSize([0, 0], [[300, 100], [300, 250]])
                    .build())
            .addService(googletag.pubads());

        gptAdSlots[3] = googletag.defineSlot('/32360441/luxuo-mpu1', [[300, 600], [300, 525], [300, 250]], '<?php echo $mpu1; ?>')
            .defineSizeMapping(
                googletag.sizeMapping()
                    .addSize([768, 200], [[300, 600], [300, 525], [300, 250]])
                    .addSize([0, 0], [[300, 100], [300, 250]])
                    .build())
            .addService(googletag.pubads());

        gptAdSlots[4] = googletag.defineSlot('/32360441/luxuo-mpu2', [300, 250], '<?php echo $mpu2; ?>')
            .addService(googletag.pubads());

        // inskin
        googletag.defineSlot('/32360441/luxuo-inskinmedia', [1, 1], 'zone-inskin-pageskin').addService(googletag.pubads());
        window.inskinPageskin = screen.width >= 992 ? "true" : "false";
        googletag.pubads().setTargeting('inskin-pageskin', window.inskinPageskin);

        // inspired-mobile
        googletag.defineSlot('/32360441/luxuo-inspiredmobile', [1, 1], 'zone-inspired-mobile').addService(googletag.pubads());

        // mobkoi
        googletag.defineSlot('/32360441/Luxuo-sg-mobkoi-uni', [1, 1], 'zone-mobkoi-uniscroller').addService(googletag.pubads());
        googletag.defineSlot('/32360441/Luxuo-sg-mobkoi-interscroller', [300, 250], 'zone-mobkoi-interscroller').addService(googletag.pubads());
        googletag.defineSlot('/32360441/Luxuo-sg-mobkoi-interstitial', [1, 1], 'zone-mobkoi-interstitial').addService(googletag.pubads());

        //googletag.defineOutOfPageSlot('/32360441/luxuo-oop', 'zone-oop').addService(googletag.pubads());

        <?php
        if (is_home()){
        /*
        googletag.defineSlot('/32360441/luxuo-pageskin', [1, 1], 'zone-homepage-pageskin').addService(googletag.pubads());
        */
        ?>
        googletag.pubads().setTargeting("luxuo_section", "homepage");
        <?php } ?>

        <?php if (is_category()){ ?>
        googletag.pubads().setTargeting("luxuo_section", "<?php $cat = get_category(get_query_var('cat')); echo $cat->slug; ?>");
        <?php } ?>

        <?php
        if (is_single()){
        /*
        // teads
        googletag.defineSlot('/32360441/luxuo-teads', [1, 1], 'zone-teads').addService(googletag.pubads());

        // inskin
        googletag.defineSlot('/32360441/luxuo-inskinmedia', [1, 1], 'zone-inskin-pageskin').addService(googletag.pubads());
        window.inskinPageskin = screen.width >= 1428 ? 'true' : 'false';
        googletag.pubads().setTargeting('inskin-pageskin', window.inskinPageskin);
        */
        ?>

        <?php
        // map post's category slugs to js array
        global $post;
        $section_targeting = '"post"';
        $cats = wp_get_post_categories($post->ID, array('fields' => 'all'));
        foreach ($cats as $i => $cat) {
            $section_targeting .= sprintf(',"%s"', $cat->slug);
        }
        ?>

        googletag.pubads().setTargeting("luxuo_section", [<?= $section_targeting; ?>]);
        googletag.pubads().setTargeting("luxuo_post", "<?= $post->post_name; ?>");

        <?php } ?>

        /***********************************************************************
         END of Slot Initialization
         ***********************************************************************/

        //Hide zone are are if div is empty
        googletag.pubads().collapseEmptyDivs(true);

        // Infinite scroll requires SRA
        googletag.pubads().enableSingleRequest();

        // Enable services
        googletag.enableServices();
    });
</script>