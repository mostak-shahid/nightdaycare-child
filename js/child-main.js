jQuery(document).ready(function($) {
	$('.menu-tab').prepend('<span class="menu-activator"></span>');
	$('.menu-tab > ul.mos-menu').hide();
	$('.menu-tab > .menu-activator').click(function(){
		$(this).siblings('ul.mos-menu').slideToggle();
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('#hidden-header').fadeIn().css('top', '0px');
		} else {
			$('#hidden-header').fadeOut().css('top', '-100%');
		}
	});
});