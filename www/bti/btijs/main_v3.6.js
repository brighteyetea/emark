jQuery(document).ready(function() {
	jQuery('header:first').css({position: 'fixed', 'z-index': 999, width: '100%', top: 0});
	jQuery('header:first .navbar').css({background: '#FFF', 'padding-bottom': '10px', 'margin-bottom': 0});
	jQuery('header:first').nextAll('div:first').css({marginTop: jQuery('header:first').outerHeight()});

    jQuery('.menu li').mouseenter(function() {
        jQuery(this).find('ul').show();

    });

    jQuery('.menu li ul').mouseenter(function() {
        jQuery(this).show();

    });

    jQuery('.menu li ul li a').mouseenter(function() {
        jQuery(this).find('ul').show();

    });

    jQuery('.menu li').mouseleave(function() {
        jQuery(this).find('ul').hide();
    });


    $(window).scroll(function() {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            parallaxScroll();
        }

        scrolling = jQuery(window).scrollTop();


        if (scrolling > 500) {
            jQuery('.subPoints .container .row').animate({
                left: "0"
            }, 800);
        }

        jQuery('.recentNews h2:first').one('inview', function(event, isInView, visiblePartX, visiblePartY){
			if ( isInView ){
				jQuery('.newsflash_feed').animate({
	                left: "0"
	            }, 800);
			}
		});

        /*if (scrolling > 1254) {
            jQuery('.newsflash_feed').animate({
                left: "0"
            }, 800);
        }*/

        if (scrolling > 1400) {
            jQuery('.logoCustomers .container ul').animate({
                left: "0"
            }, 800);
        }

    });

    if ( jQuery('.bannerBig').length > 0 ){
	    fixVdoHeight();
	    jQuery(window).resize(function(event) {
	    	/* Act on the event */
	    	fixVdoHeight();
	    });
    }

    $('#fullname').focus(function() {
        if (jQuery(this).val() == 'Full Name') {
            jQuery(this).val('');
        }
    });

 $('#company_name').focus(function() {
        if (jQuery(this).val() == 'Company Name') {
            jQuery(this).val('');
        }
    });
	
 $('#pick_up_location').focus(function() {
        if (jQuery(this).val() == 'Pick Up Location') {
            jQuery(this).val('');
        }
    });
	
 $('#how_did_you_find_us').focus(function() {
        if (jQuery(this).val() == 'How did you find us') {
            jQuery(this).val('');
        }
    });
	
 $('#drop_off_location').focus(function() {
        if (jQuery(this).val() == 'Drop Off Location') {
            jQuery(this).val('');
        }
    });


    $('#email').focus(function() {
        if (jQuery(this).val() == 'Email Address') {
            jQuery(this).val('');
        }
    });

    $('#phone_number').focus(function() {
        if (jQuery(this).val() == 'Phone Number') {
            jQuery(this).val('');
        }
    });


    $('#message').focus(function() {
        if (jQuery(this).val() == 'Message') {
            jQuery(this).val('');
        }
    });

    $('#enquiry').focus(function() {
        if (jQuery(this).val() == 'Enquiry') {
            jQuery(this).val('');
        }
    });

    $('#fullname').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Full Name');
        }
    })
	
 $('#company_name').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Company Name');
        }
    })
	
$('#pick_up_location').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Pick Up Location');
        }
    })
	
$('#drop_off_location').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Drop Off Location');
        }
    })
	
$('#how_did_you_find_us').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('How did you find us');
        }
    })

    $('#email').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Email Address');
        }
    })

    $('#phone_number').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Phone Number');
        }
    })

    $('#message').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Message');
        }
    })

    $('#enquiry').blur(function() {
        if (jQuery(this).val() == '') {
            jQuery(this).val('Enquiry');
        }
    })


});

var topChkd = false;

function parallaxScroll() {
    if (!topChkd) {
        psTop = parseInt(jQuery('.videoBG video').css('top'));
        psTop2 = parseInt(jQuery('.bannerSmall .backstretch img').css('top'));
        psTop3 = parseInt(jQuery('.bannerSmall  h1').css('top'));
        psTop4 = parseInt(jQuery('.customerQuote .backstretch img').css('top'));
        psTop5 = parseInt(jQuery('.banner1 .backstretch img').css('top'));
        topChkd = true;
    }

    var scrolled = jQuery(window).scrollTop();

    jQuery('.videoBG video').css('top', ((psTop + (scrolled * .5))) + 'px');
    jQuery('.bannerSmall .backstretch img').css('top', ((psTop2 + (scrolled * .5))) + 'px');
    jQuery('.bannerSmall  h1').css('top', ((psTop3 - (scrolled * .2))) + 'px');
    jQuery('.customerQuote .backstretch img').css('top', ((psTop4 + (scrolled * .3))) + 'px');
    jQuery('.banner1 .backstretch img').css('top', ((psTop5 + (scrolled * .5))) + 'px');
}

function fixVdoHeight(){
	var $banner = jQuery('.bannerBig');
	var winH = window.innerHeight;
	$banner.height( (winH-300) );
	$banner.find('.container').height( (winH-300)+130 );
}