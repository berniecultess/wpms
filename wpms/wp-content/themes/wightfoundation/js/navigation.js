/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var nav = document.getElementById( 'site-navigation' ), button, menu;
	if ( ! nav )
		return;
	button = nav.getElementsByTagName( 'h3' )[0];
	menu   = nav.getElementsByTagName( 'ul' )[0];
	if ( ! button )
		return;

	// Hide button if menu is missing or empty.
	if ( ! menu || ! menu.childNodes.length ) {
		//button.style.display = 'none';
		return;
	}

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'nav-menu' ) )
			menu.className = 'nav-menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
		}
	};
} )();
//Lower Navigation
( function() {
	var nav_ln = document.getElementById( 'lower-navigation' );
	
	if (!nav_ln)
		return;
	
    var button = nav_ln.getElementsByTagName( 'h3' )[0],
        menu   = nav_ln.getElementsByTagName( 'ul' )[0];

    if ( undefined === button )
        return false;

    // Hide button if menu is missing or empty.
    if ( undefined === menu || ! menu.childNodes.length ) {
        button.style.display = 'none';
        return false;
    }

    button.onclick = function() {
        if ( -1 == menu.className.indexOf( 'nav-menu' ) )
            menu.className = 'nav-menu';

        if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
            button.className = button.className.replace( ' toggled-on', '' );
            menu.className = menu.className.replace( ' toggled-on', '' );
        } else {
            button.className += ' toggled-on';
            menu.className += ' toggled-on';
        }
    };
} )();