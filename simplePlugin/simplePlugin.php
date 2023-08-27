<?php
/*
Plugin Name: Simple Plugin 
Plugin URI: https://mywebsite.com/
Description: a simple plugin
Author: ERFAN
Author URI: https://Mypersonalwensite.com/
Text Domain: myfirstplugin
Domain Path: /languages/
Version: 1.0.0
*/


//path and url define
define('PLUGIN_DIR',plugin_dir_path(__FILE__));

define('PLUGIN_URL',plugin_dir_url(__FILE__));


//active hook
function simple_plugin_activation(){


}

function simple_plugin_deactivation(){


}

register_activation_hook(__FILE__,'simple_plugin_activation');

register_deactivation_hook(__FILE__,'simple_plugin_deactivation');