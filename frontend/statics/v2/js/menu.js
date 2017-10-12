var Menu = (function($){
	
	menuToggle 	= $(document.getElementById('js-toggle'));
	aside		= $(document.getElementById('js-aside'));
	main		= $(document.getElementById('main'));
	overlay		= $(document.getElementById('js-overlay'));
	body		= $('body');
	offcanvas   = $('.offcanvas');

	menuToggle.on('click', function () {
		$(this).toggleClass('is-clicked');
		$(this).parent().toggleClass('active');
		aside.toggleClass('active');
		main.toggleClass('slideIn');
		overlay.toggleClass('active');
		body.toggleClass('menu-active');

	});

	overlay.click(function() {
		aside.removeClass('active');
		offcanvas.removeClass('active');
		main.removeClass('slideIn');
		overlay.removeClass('active');
		menuToggle.removeClass('is-clicked');
		body.removeClass('menu-active');
	});

})(jQuery);