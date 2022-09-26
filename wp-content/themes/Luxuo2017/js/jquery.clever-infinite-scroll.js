/**
 * jquery.clever-infinite-scroll.js
 * Working with jQuery 2.1.4
*/
/* global define, require, history, window, document, location  */
(function(root, factory){
	"use strict";
	if (typeof define === "function" && define.amd) {
		define(["jquery"], factory);
	} else if (typeof exports === "object") {
		factory(require("jquery"));
	} else {
		factory(root.jQuery);
	}
})(this, function($) {
	"use strict";
	/**
	 * Elements it reffers. Each page must has those selectors.
	 * The structure must be same as article1.html
	 * #contentsWrapper, .content, #next
	*/
	$.fn.cleverInfiniteScroll = function(options) {
		/**
		 * Settings
		*/

		var getTreshold = function () {
            var $offset = $("#billboard-treshold").offset();
            return $offset.top;
        }

		var windowHeight = (typeof window.outerHeight !== "undefined") ? Math.max(window.outerHeight, $(window).height()) : $(window).height(),
		defaults = {
			contentsWrapperSelector: "#contentsWrapper",
			contentSelector: ".content",
			nextSelector: "#next",
			loadImage: "",
			offset: getTreshold(), //windowHeight,
		}, settings = $.extend(defaults, options);

		/**
		 * Private methods
		*/
		var generateHiddenSpans = function(_title, _path) {
			return "<span class='hidden-title' style='display:none'>" + _title + "</span><span class='hidden-url' style='display:none'>" + _path + "</span>";
		},
		setTitleAndHistory = function(_title, _path) {
			// Set history
			history.pushState(null, _title, _path);
			// Set title
			$("title").html(_title);
		},
		changeTitleAndURL = function(_value) {
			// value is an element of a content user is seeing
			// Get title and path of the article page from hidden span elements
			var title = $(_value).children(".hidden-title:first").text(),
				path = $(_value).children(".hidden-url:first").text();
			if($("title").text() !== title) {
				// If it has changed
                
                //Newsletter Mailchimp
                var $last_active_content = $(settings.contentSelector + ".active");
                $last_active_content.addClass("fake-class-2");
                var $mc_signup = $last_active_content.find(".sidebar-newsletter-container");
                console.log($mc_signup)
                var $ms_signup_clone = $mc_signup.clone(true);
                //End Newsletter Mailchimp
                
				$(settings.contentSelector).removeClass("active");
				$(_value).addClass("active");
                setTitleAndHistory(title, path);
                
                //Newsletter Mailchimp
                var $last_s_ads_container = $(settings.contentSelector + ".active #ad_slot_separator");
                
                $(settings.contentSelector + ".active .sidebar-newsletter-container").remove();
                $( $ms_signup_clone ).insertAfter( $last_s_ads_container );
                $mc_signup.remove();
                
                //Owl Gallery
                handle_article_slider();
			}
		};

		/**
		 * Initialize
		*/
		// Get current page's title and URL.
		var title = $("title").text(),
			path = $(location).attr("href"),
			documentHeight = $(document).height(),
			threshold = settings.offset,
			$contents = $(settings.contentSelector),
        	isLoading = false;
		// Set hidden span elements and history
		$(settings.contentSelector + ":last").append(generateHiddenSpans(title, path));
		$(settings.contentSelector).addClass("active");
		setTitleAndHistory(title, path);

		/**
		 * scroll
		*/
		var lastScroll = 0, currentScroll;
		$(window).scroll(function() {
			// Detect where you are
			window.clearTimeout($.data("this", "scrollTimer"));
			$.data(this, "scrollTimer", window.setTimeout(function() {
				// Get current scroll position
				currentScroll = $(window).scrollTop();

				// Detect whether it's scrolling up or down by comparing current scroll location and last scroll location
				if(currentScroll > lastScroll) {
					// If it's scrolling down
					$contents.each(function(key, value) {
						if($(value).offset().top + $(value).height() > currentScroll) {
							// Change title and URL
							changeTitleAndURL(value);
							// Quit each loop
							return false;
						}
					});
				} else if(currentScroll < lastScroll) {
					// If it's scrolling up
					$contents.each(function(key, value) {
						if($(value).offset().top + $(value).height() - windowHeight / 2 > currentScroll) {
							// Change title and URL
							changeTitleAndURL(value);
							// Quit each loop
							return false;
						}
					});
				} else {
					// When currentScroll == lastScroll, it does not do anything because it has not been scrolled.
				}
				// Renew last scroll position
				lastScroll = currentScroll;
			}, 200));

			//if($(window).scrollTop() + windowHeight + threshold >= documentHeight) {
            
            if(($(window).scrollTop() + 300) >= threshold) {
				if($("#cis-load-img").length > 0){
					return false;
				}

				// If scrolling close to the bottom

				// Getting URL from settings.nextSelector
				var $url = [$(settings.nextSelector).attr("href")];
				$(settings.nextSelector).remove();
				if($url[0] !== undefined) {
					// If the page has link, call ajax
					if(settings.loadImage !== "") {
						//$(settings.contentsWrapperSelector).append("<img src='" + settings.loadImage + "' id='cis-load-img'>");
					}

                    //Loading Indicator
                    $('#article_loading_indicator').append("<h3 id='cis-load-img'>Loading Next Article.</h3>");
                    isLoading = true;
                    
                    //Load our Article via AJAX
					$.ajax({
						url: $url[0],
						dataType: "html",
						success: function(res) {
                            //Lets  copy the 
                            var $ad_script = $(res).filter("#gpt_zones").text();
                            
                            $(settings.contentSelector + ":last").append('<script type="text/javascript">'+ $ad_script +'</script>');
                            // Get title and URL
							title = $(res).filter("title").text();
							path = $url[0];
							// Set hidden span elements and history
							$(settings.contentsWrapperSelector).append($(res).find(settings.contentSelector).append(generateHiddenSpans(title, path)));
                            
							if($(res).find(settings.contentSelector).find(settings.nextSelector).length === 0){
								//If there is no nextSelector in the contentSelector, get next Slecter from response and append it.
								$(settings.contentsWrapperSelector).append($(res).find(settings.nextSelector));
							}
							documentHeight = $(document).height();
							$contents = $(settings.contentSelector);
							$("#cis-load-img").remove();

							//Renew Treshold
                            threshold = getTreshold();
                            isLoading = false;

                            //Scroll top
                            var $last_section = $('.content-wrapper.active').last();
                            var $next_section = $last_section.next();
                            var $offsetsr = $next_section.offset();

                            make_editors_pick_fixed();
                            $("html, body").animate({ scrollTop: $offsetsr.top }, "fast");
						}
					});
				}
			}
		}); //scroll

		return (this);
	}; //$.fn.cleverInfiniteScroll
});
