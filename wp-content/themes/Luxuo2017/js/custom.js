jQuery(document).ready(function () {
    function handle_hide_ad() {
        jQuery('#ad-close-btn').on('click', function () {
            jQuery('.ads-container').hide();
        });
    }

    function handle_menu() {
        jQuery('ul.menu-bar > li.cat-menu-list > a').on('click', function (event) {
            event.stopPropagation();
            if(jQuery('#search-container').css('display') == "block"){
                jQuery('#search-container').hide();
            }
            jQuery(this).parents('li').toggleClass('show-sub');
            jQuery('ul.menu-bar > li.cat-menu-list > a').not(jQuery(this)).parents('li').removeClass('show-sub');
        });
    }

    function handle_home_slider(){
        var items = jQuery('#hompage-owl .item');
        if(items.length > 1) {
            jQuery('#hompage-owl').owlCarousel({
                nav:true,
                autoplay: 500,
                pagination: true,
                items : 1,
                navSpeed:1000,
                fluidSpeed:1000,
                smartSpeed:1000,
                loop:true,
                dots:true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ]
            });
        } else {
            jQuery('#hompage-owl').owlCarousel({
                nav:false,
                autoPlay: false,
                pagination: false,
                items : 1,
                loop:false,
                dots:false
            });
        }
    }

    function handle_category_slider(){
        var items = jQuery('#category-owl .item');
        if(items.length > 1) {
            jQuery('#category-owl').owlCarousel({
                nav:true,
                autoplay: true,
                pagination: false,
                items : 1,
                navSpeed:1000,
                fluidSpeed:1000,
                smartSpeed:1000,
                loop:true,
                dots:false,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ]
            });
        } else {
            jQuery('#category-owl').owlCarousel({
                nav:false,
                autoPlay: false,
                pagination: false,
                items : 1,
                loop:false,
                dots:false
            });
        }
    }

    

    function handle_related_slider(){
        jQuery('.related_post').owlCarousel({
            nav:true,
            // autoplay: 500,
            pagination: false,
            items : 3,
            navSpeed:1000,
            fluidSpeed:1000,
            smartSpeed:1000,
            loop:true,
            dots:true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ]
        });
    }

    jQuery('.gallery').on('initialized.owl.carousel changed.owl.carousel resized.owl.carousel', function(e) {
        owl_carousel_page_numbers(e);
    });

    function owl_carousel_page_numbers(e){
        var items_per_page = e.page.size;

        if (items_per_page > 1){
            var min_item_index  = e.item.index,
                max_item_index  = min_item_index + items_per_page,
                display_text    = (min_item_index+1) + '-' + max_item_index;
        } else {
            var display_text = (e.item.index+1);
        }

        jQuery('#info').text( display_text + '/' + e.item.count);
    }

    var $loader = jQuery('.view-more-articles');
    $loader.on( 'click', load_ajax_posts );

    function load_ajax_posts() {
        var cat = jQuery(this).data('category');
        var author = jQuery(this).data('author');
        var layout = jQuery(this).data('layout');
        var container = jQuery(this).data('container');
        var exclude = jQuery(this).data('exclude-category');
        $container = jQuery('.'+container);
        var offset = $container.find('.each-article').length;
        var $loader_btn = jQuery('#'+jQuery(this).attr('id'));

        console.log(offset);
        if (!($loader_btn.hasClass('post_loading_loader') || $loader_btn.hasClass('post_no_more_posts'))) {
            jQuery.ajax({
                type: 'POST',
                dataType: 'html',
                url: window._wp_rp_wp_ajax_url, //'/wp-admin/admin-ajax.php',
                data: {
                    'cat': cat,
                    'author': author,
                    'layout': layout,
                    'offset': offset,
                    'exclude': exclude,
                    'action': 'luxuo_more_post_ajax'
                },
                beforeSend : function () {
                    $loader_btn.addClass('post_loading_loader').html('Loading...');
                },
                success: function (data) {
                    var $data = jQuery(data);
                    if ($data.length) {
                        var $newElements = $data.css({ opacity: 0 });
                        $container.append($newElements);
                        $newElements.animate({ opacity: 1 });
                        $loader_btn.removeClass('post_loading_loader').html('View More Articles');
                    } else {
                        $loader_btn.removeClass('post_loading_loader').addClass('post_no_more_posts').html('No More Articles');
                    }
                    
                    make_edi_pick_fixed();
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    $loader_btn.html(jQuery.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
                },
            });
        }
        return false;
    }

    function handle_search(){
        jQuery('.search-btn,#close-search').on('click',function(event){
            event.preventDefault();
            jQuery('#search-container').toggle('display');

            if(jQuery('#search-container').css('display') == "block"){
                jQuery('#search-box').focus();
            }

            jQuery('.clear-icon').on('click',function(){
                jQuery("#search-box").val("");
            })


        });
    }

    function handle_close_menu(){
        jQuery(window).click(function(event) {
            jQuery('ul.menu-bar > li.cat-menu-list').each(function(){
                if(jQuery(this).hasClass('show-sub')){
                    jQuery(this).removeClass('show-sub');
                }
            });
            if(!jQuery(event.target).is('#Layer_1')){
                if(jQuery('#search-container').css('display') == "block"){
                    jQuery('#search-container').hide();
                }
            }
        });

        jQuery('.sub-menu-wrapper').click(function(event){
            event.stopPropagation();
        });
    }

    function handle_menu_close_btn(){
        jQuery('#mobile-menu-btn').click(function(){
            jQuery(this).toggleClass('open');
        });
    }

    function handle_404_search(){
        jQuery('.search-btn-icon').on('click',function(){
            jQuery('.search-form-404').submit();
        });
    }

    handle_hide_ad();
    handle_menu();
    handle_home_slider();
    handle_category_slider();
    handle_related_slider();
    handle_search();
    handle_close_menu();
    handle_menu_close_btn();
    handle_404_search();
});

function handle_article_slider(){
    var gallery = jQuery('.gallery');
    jQuery('.gallery br').remove();
    jQuery('<div id="info"></div>').appendTo('.owl-controls');
    // jQuery('.gallery-item').addClass('item');
    jQuery('.gallery').owlCarousel({
        nav:true,
        autoplay: true,
        autoplayTimeout:3000,
        pagination: false,
        items : 1,
        navSpeed:1000,
        fluidSpeed:1000,
        smartSpeed:1000,
        loop:true,
        dots:true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ]
    });
}

function clever_infinite_scroll(){
    // When you use default selectors
    // $('#contentsWrapper').cleverInfiteScroll();

    // When you use custom selectors
    jQuery('#article-post-content').cleverInfiniteScroll({
        contentsWrapperSelector: '#article-post-content',
        contentSelector: '.content-wrapper',
        nextSelector: '#next-article',
        loadImage: 'ajax-loader.gif',
        offset: jQuery(window).height()
    });
}

function make_edi_pick_fixed_non_infinite(){
    var $el = jQuery(".sidebar-newsletter-container");

    if( $el.length > 0 ) {
        var $bottom = $el.offset().top + $el.outerHeight(true);
        var document_height = jQuery(document).height();
        var window_height = (typeof window.outerHeight !== "undefined") ? jQuery(window).outerHeight(true) : jQuery(window).height();
        var $scroll_top = jQuery(window).scrollTop();
        var $newsletter_bottom = $bottom;
        var $editors_pick = jQuery(".sidebar-editors-picks");
        var $editors_pick_width = $editors_pick.outerWidth(true);
        var $el_width = $el.outerWidth(true);

        $editors_pick.css({
            width: $el_width + "px"
        });

        var $editors_pick_height = $editors_pick.outerHeight(true);
        var $recommended_height = jQuery(".recommened-wrapper").outerHeight(true);
        var $footer_height = jQuery("footer").outerHeight(true);
        var $article_post_content_height = jQuery("#article-post-content ").outerHeight(true);
        var $sidebar_container_height = jQuery(".sidebar-container").outerHeight(true);

        if ($editors_pick_height <= window_height) {
            var $diff = (window_height - $editors_pick_height) + 10;

            $editors_pick.css({
                top: ($diff / 2) + "px",
            });
        } else {
            $editors_pick.css({
                top: "",
            });
        }

        if ($scroll_top >= $newsletter_bottom && ($article_post_content_height >= $sidebar_container_height)) {
            if ((window_height + $scroll_top + 100) >= (document_height - $footer_height - $recommended_height)) {
                $editors_pick.removeClass("make-editors-pick-fixed");
            } else {
                $editors_pick.removeClass("make-editors-pick-fixed");
                $editors_pick.addClass("make-editors-pick-fixed");
            }
        } else {
            $editors_pick.removeClass("make-editors-pick-fixed");
        }
    }
}

function make_edi_pick_fixed(){
    if(jQuery(".lx_fixed_sidebar .sidebar-newsletter-container").length > 0){
        var $content_active = ".lx_fixed_sidebar .left-side";
        var $el = jQuery(".sidebar-newsletter-container");
        
        var $bottom = $el.offset().top + $el.outerHeight(true);
        var document_height = jQuery(document).height();
        var window_height = (typeof window.outerHeight !== "undefined") ? jQuery(window).outerHeight(true) : jQuery(window).height();
        var $scroll_top = jQuery(window).scrollTop();
        var $newsletter_bottom = $bottom;
        var $editors_pick = jQuery(".sidebar-editors-picks");
        var $editors_pick_width = $editors_pick.outerWidth(true);
        var $el_width = $el.outerWidth(true);

        $editors_pick.css({
            width: $el_width + "px"
        });

        var $editors_pick_height = $editors_pick.outerHeight(true);
        var $recommended_height = jQuery(".recommened-wrapper").outerHeight(true);
        var $footer_height = jQuery("footer").outerHeight(true);
        var $article_post_content_height = jQuery("#article-post-content " + $content_active).outerHeight(true);
        var $sidebar_container_height = jQuery( $content_active + ".sidebar-container").outerHeight(true);
        
        if($editors_pick_height <= window_height){
            var $diff = window_height - $editors_pick_height;

            $editors_pick.css({
                top: ($diff / 2) + "px",
            });
        }else{
            $editors_pick.css({
                top: "",
            });
        }
        
        if($scroll_top >= $newsletter_bottom && ($article_post_content_height >= $sidebar_container_height)){
            if((window_height + $scroll_top + 100) >= (document_height - $footer_height - $recommended_height)) {
                $editors_pick.removeClass("make-editors-pick-fixed");
            }else{
                $editors_pick.removeClass("make-editors-pick-fixed");
                $editors_pick.addClass("make-editors-pick-fixed");
            }
        }else{
            $editors_pick.removeClass("make-editors-pick-fixed");
        }
    }
}

function make_editors_pick_fixed(){
    if(jQuery(".sidebar-newsletter-container").length > 0){
        var $content_active = ".content-wrapper.active";
        var $el = jQuery( $content_active + " .sidebar-newsletter-container");
        var $bottom = $el.offset().top + $el.outerHeight(true);
        var document_height = jQuery(document).height();
        var window_height = (typeof window.outerHeight !== "undefined") ? jQuery(window).outerHeight(true) : jQuery(window).height();
        var $scroll_top = jQuery(window).scrollTop();
        var $newsletter_bottom = $bottom;
        var $editors_pick = jQuery( $content_active + " .sidebar-editors-picks");
        var $editors_pick_width = $editors_pick.outerWidth(true);
        var $el_width = $el.outerWidth(true);

        $editors_pick.css({
            width: $el_width + "px"
        });

        var $editors_pick_height = $editors_pick.outerHeight(true);
        var $recommended_height = jQuery(".recommened-wrapper").outerHeight(true);
        var $footer_height = jQuery("footer").outerHeight(true);
        var $article_post_content_height = jQuery("#article-post-content " + $content_active).outerHeight(true);
        var $sidebar_container_height = jQuery( $content_active + ".sidebar-container").outerHeight(true);
        
        $editors_pick.removeClass("make-editors-pick-fixed");

        return $bottom;
    }
    
    return 0;
}

function back_to_top(){
    jQuery('body').on('click', '#back_to_top', function(){
        jQuery('body,html').animate({
            scrollTop: 0
        }, 700);
    });
}

function show_back_to_top(){
    var $back_to_top = jQuery('#back_to_top');
    if (jQuery(this).scrollTop() > 200) {
        $back_to_top.fadeIn();
    } else {
        $back_to_top.fadeOut();
    }
}

function make_menu_sticky(){
    var $menu_outer_el = jQuery('#menu_outer_wrapper');
    var $menu_height = $menu_outer_el.height();
    var $top = 0;
    var $threshold = $top + $menu_height;
    
    if (jQuery(this).scrollTop() > $threshold) {
        $menu_outer_el.addClass('make_menu_sticky');
    } else {
        $menu_outer_el.removeClass('make_menu_sticky');
    }
}

jQuery(window).load(function () {
    back_to_top();
    handle_article_slider();

    //Un-comment below to enable infinite scroll
    //clever_infinite_scroll();
    
    var $menu_outer_el = jQuery('#menu_outer_wrapper');
    var $menu_offset = $menu_outer_el.offset();
    var $offset_top = $menu_offset.top;
    
    $menu_outer_el.data('offset-top', $offset_top);
});

jQuery(window).scroll(function () {
    show_back_to_top();

    //Uncomment below if using infinite
    //make_edi_pick_fixed();

    //Comment below if using infinite
    make_edi_pick_fixed_non_infinite();
    
    make_menu_sticky();
});