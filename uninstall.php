<?php
//we even need to clear the data from the plugin
if (!defined('WP_UNINSTALL_PLUGIN')) {
    $settingOptions = array('category', 'payment', 'companyMail'); 
    // Clear up our settings
    foreach ($settingOptions as $settingName) {
        delete_option($settingName);
    }
    die;
}