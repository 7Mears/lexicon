/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function($){

	var $menu_trigger = $('#menu-trigger'),
	$content_wrapper = $('.nav-wrap'),
	$navigation = $('header');

	//open-close lateral menu clicking on the menu icon
	$menu_trigger.on('click', function(event){
		event.preventDefault();

		$menu_trigger.toggleClass('is-clicked');
		$navigation.toggleClass('menu-is-open');
		$content_wrapper.toggleClass('menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
			$('body').toggleClass('overflow-hidden');
		});
		$('#site-navigation').toggleClass('menu-is-open');

		//check if transitions are not supported - i.e. in IE9
		if($('html').hasClass('no-csstransitions')) {
			$('body').toggleClass('overflow-hidden');
		}
	});

	//close lateral menu clicking outside the menu itself
	$content_wrapper.on('click', function(event){
		if( !$(event.target).is('#menu-trigger, #menu-trigger span') ) {
			$menu_trigger.removeClass('is-clicked');
			$navigation.removeClass('menu-is-open');
			$content_wrapper.removeClass('menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$('#site-navigation').removeClass('menu-is-open');
			//check if transitions are not supported
			if($('html').hasClass('no-csstransitions')) {
				$('body').removeClass('overflow-hidden');
			}

		}
	});

	//open (or close) submenu items in the lateral menu. Close all the other open submenu items.
	$('.menu-item-has-children').children('a').on('click', function(event){
		event.preventDefault();
		$(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.menu-item-has-children').siblings('.menu-item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);
	});
});
