( function( global, factory ) {

	"use strict";
	var $BODY = $('body'),
		// $MENU_TOGGLE = $('[data-element-id="toggle"]'),
		$MENU_TOGGLE = $('#menu_toggle'),
		$SIDEBAR_MENU = $('[data-element-id="side-bar"]');
			
		// toggle small or large menu 
		$MENU_TOGGLE.on('click', function() {

				console.log('clicked - menu toggle');
				
				if ($BODY.hasClass('nav-md')) {
					$SIDEBAR_MENU.find('li.active ul').hide();
					$SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
				} else {
					$SIDEBAR_MENU.find('li.active-sm ul').show();
					$SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
				}

			$BODY.toggleClass('nav-md nav-sm');

			setContentHeight();
		});

	
})();

