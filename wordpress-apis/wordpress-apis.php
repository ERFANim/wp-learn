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

    add_role(
        'shop_manager',
        'Shop_Manager',
        [
            'read' => true,
            'edit_posts' => true
        ]
    );

    $role = get_role('administrator');
    $role -> add_cap('remove_products');

}
function wp_apis_plugin_deactivation()
{

}

if(is_admin())
{
    include WP_APIS_INC.'admin/menus.php';
    include WP_APIS_INC.'admin/metaboxes.php';
}


include WP_APIS_INC.'ajax.php';

function wpapis_register_styles()
{
    wp_register_style('wpapis_main_style' , WP_APIS_URL . 'assets/css/main.css');
    wp_enqueue_style('wpapis_main_style');

    if(is_admin())
    {
    wp_register_script('wpapis-admin-script',WP_APIS_URL.'assets/js/wpapis-admin.js',['jquery'],false,true);
    wp_enqueue_script('wpapis-admin-script');
    }else
    {
    wp_register_script('wpapis-front-script',WP_APIS_URL.'assets/js/wpapis.js',['jquery'],false,true);
    wp_enqueue_script('wpapis-front-script');
    }
}

add_action('wp_enqueue_scripts','wpapis_register_styles');
add_action('admin_enqueue_scripts','wpapis_register_styles');

