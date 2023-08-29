<?php

/*
Plugin Name: Wordpress Apis
Plugin URI: https://mywebsite.com/
Description: learning apis admin
Author: ERFAN
Author URI: https://Mypersonalwensite.com/
Text Domain: wordpress-apis
Domain Path: /languages/
Version: 1.0.0
*/

define('WP_APIS_DIR',plugin_dir_path(__FILE__));
define('WP_APIS_URL',plugin_dir_url(__FILE__));
define('WP_APIS_INC',WP_APIS_DIR.'/inc/');
define('WP_APIS_TPL',WP_APIS_DIR.'/tpl/');

register_activation_hook(__FILE__,'wp_apis_plugin_activation');
register_deactivation_hook(__FILE__,'wp_apis_plugin_deactivation');

function wp_apis_plugin_activation()
{

}
function wp_apis_plugin_deactivation()
{

}

if(is_admin())
{
    include WP_APIS_INC.'admin/menus.php';
}