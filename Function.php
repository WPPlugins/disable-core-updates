<?php

/**

 * @package Disable WordPress Core Updates
 * @author Websiteguy

 * @version 0.8
*/

/*

Plugin Name: Disable WordPress Core Updates
Plugin URI: http://www.wordpress.org/plugins/disable-wordpress-updates/
Version: 0.8
Description: A Simple WordPress Plugin That Disables Wordpress Core Updating.

Author: <a href="http://profiles.wordpress.org/kidsguide">Websiteguy</a>
Author URL: http://profiles.wordpress.org/kidsguide
Compatible with WordPress 2.3+.


*/


/*

Copyright 2013 Websiteguy (email : mpsparrow@cogeco.ca)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



// Hides all upgrade notices in dashboard

		add_action('admin_menu','hide_admin_notices');
		function hide_admin_notices() {
	                  remove_action( 'admin_notices', 'update_nag', 3 );
		}


// Disables the core updates for your website

		remove_action( 'load-update-core.php', 'wp_update_core' );
		add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );


// Removes Update E-mails (Only works with some plugins)

		// Core Updates E-mails
		apply_filters( 'auto_core_update_send_email', false, $type, $core_update, $result );