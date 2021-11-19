<?php
/**
 * Plugin Name: Bookography
 * Description:       This plugin creates a contact form and booking interface to handle incoming bookings from your customers.
 * Version:           1.0.0
 * Author:            Melanie Deuretzbacher
 * Author URI:        https://github.com/MeliDeu
*/
 

//------------------------ACTIVATION-------------------------//
//the code that is run when activating the plugin
function bookography_activate(){

}
// aktivera plugin
register_activation_hook(__FILE__, 'bookography_activate');

//------------------------DEACTIVATION-------------------------//
//the code that is run when deactivating the plugin
function bookography_deactivate(){
    //------------------------Saved options-------------------------//
    $settingOptions = array('category', 'payment', 'companyMail'); 
    // Clear up our settings
    foreach ($settingOptions as $settingName) {
        delete_option($settingName);
    }
}
//deactivate plugin
register_deactivation_hook(__FILE__, 'bookography_deactivate');

//------------------------INITIATE-------------------------//
//the code that is run when initalizing the plugin
function bookography_initialized(){

}
//initializing the plugin
add_action('init', 'bookography_initialized');

//-----------------------ADMIN-------------------------------//
//menues are outsourced to own php-file
require_once 'includes/bookography-menues.php';
//adds the menu
add_action('admin_menu', 'bookography_create_admin_menu');

//hanterar inställningar
function bookagraphy_register_options() {
    register_setting('bookography-options', 'category'); //gets the information from the from on the admin-page (bookography-booking-interface.php)
    register_setting('bookography-options', 'payment');
    register_setting('bookography-options', 'companyMail');
}

//när admin/backdoor-sektionen startas, så ska det köras en funktion
add_action('admin_init', 'bookagraphy_register_options');

//----------------------SHORTCODE-----------------------------//
require_once 'public/bookography-shortcode.php';
add_shortcode('bookography-shortcode', 'bookography_create_shortcode');

//----------------------AJAX-----------------------------//
require_once 'public/bookography-ajax.php';
add_action('wp_ajax_bookography_send_booking', 'bookography_send_booking');