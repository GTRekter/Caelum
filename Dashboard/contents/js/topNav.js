(function(window) { 'use strict';

	/* ==== START: GLOBAL ==== */

	var $NAVBAR_TOP = $('[data-element-id="top-navbar"]'),
		$MENU_TOGGLE = $('[data-element-id="toggle"]'),
		$SIDEBAR = $('[data-element-id="side-navbar"]');

	/* ==== END: GLOBAL ==== */

	/* ==== START: EVENTS ==== */

	$MENU_TOGGLE.on('click', function() {
		
		$SIDEBAR.toggleClass('collapsed');
		$NAVBAR_TOP.toggleClass('open');

	});
	
	/* ==== END: EVENTS ==== */

})();

