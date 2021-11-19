<?php
//the function for the plugin introduction
function bookography_admin_interface(){
    //include the css
    wp_register_style('bookography-admin.css', plugin_dir_url(__FILE__) . '../admin/css/bookography-admin.css');
    wp_enqueue_style('bookography-admin.css');
    //include the js
    wp_register_script('bookography-admin.js', plugin_dir_url(__FILE__) . '../admin/js/bookography-admin.js');
    wp_enqueue_script('bookography-admin.js');
    //loads the php for the interface
    require_once 'interface-admin.php';
}
//the function for the booking amdministration
function bookography_admin_booking_interface(){
    //include the css
    wp_register_style('bookography-admin.css', plugin_dir_url(__FILE__) . '../admin/css/bookography-admin.css');
    wp_enqueue_style('bookography-admin.css');
    //include the js
    wp_register_script('bookography-admin.js', plugin_dir_url(__FILE__) . '../admin/js/bookography-admin.js');
    wp_enqueue_script('bookography-admin.js');
    //loads the php for the interface
    require_once 'bookography-booking-interface.php';
}

//the function for the booking overview
// function bookography_admin_booking_overview(){
//     //include the css
//     wp_register_style('bookography-admin.css', plugin_dir_url(__FILE__) . '../admin/css/bookography-admin.css');
//     wp_enqueue_style('bookography-admin.css');
//     //include the js
//     wp_register_script('bookography-admin.js', plugin_dir_url(__FILE__) . '../admin/js/bookography-admin.js');
//     wp_enqueue_script('bookography-admin.js');
//     //loads the php for the interface
//     require_once 'bookography-booking-overview.php';
// }
//creates a menu to the left
function bookography_create_admin_menu(){
    //adds the main menu
    add_menu_page(
        'Bookography', //the page's name
        'Bookography Plugin', //the menu's name
        'manage_options', //capability
        'bookography-options', //URL-slug
        'bookography_admin_interface', //the name of the function
        'dashicons-camera-alt', //path to icon
        100 //placement of the menu
    );
    //adds submenu
    //the submenu for an overview over bookings
    // add_submenu_page(
    //     'bookography-options',
    //     'Bookography Overview', //page title
    //     'Bookography Booking Overview', //menu title
    //     'manage_options', //capability
    //     'overview-bookings', //the slug of the page
    //     'bookography_admin_booking_overview'
    // );
    //the submenu for changing booking settings
    add_submenu_page(
        'bookography-options',
        'Bookography Booking Options', //page title
        'Bookography Settings', //menu title
        'manage_options', //capability
        'booking-settings', //the slug of the page
        'bookography_admin_booking_interface'
    );
}