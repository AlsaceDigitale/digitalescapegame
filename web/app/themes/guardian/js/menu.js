
	jQuery(document).ready(function() {
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('.nav li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 768) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});
/* for menu in responsive */
jQuery(document).ready(function() {
		jQuery(window).scroll(function () {
		if( jQuery(window).width() > 768) {
			if (jQuery(this).scrollTop() > 220) {
			jQuery('#header').addClass('sticky-head');
			}
			else {
		jQuery('#header').removeClass('sticky-head');
		}
		}
			else {
			if (jQuery(this).scrollTop() > 250) {
				jQuery('#header').addClass('sticky-head');
			}else {
		jQuery('#header').removeClass('sticky-head');
		}
			}				
		});
});	 
	
jQuery(document).ready(function() {	
	
	/*For focus skip content*/
	var menuLink = jQuery('.menu-item').children('a');
	menuLink.on('focus', function(){
        jQuery(this).parents('ul').addClass('focused');
    });
    menuLink.on( 'focusout', function(){
        jQuery(this).parents('ul').removeClass('focused');
    });
	/*For focus skip content*/
});	 

/* fix for skip-to-content link bug in Chrome & IE9 */
window.addEventListener("hashchange", function(event) {

    var element = document.getElementById(location.hash.substring(1));

    if (element) {

        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }

        element.focus();
    }

}, false);