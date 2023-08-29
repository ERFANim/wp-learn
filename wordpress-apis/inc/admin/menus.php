<?php
//actions
add_action('admin_menu','wp_apis_register_menus');

//functions
function wp_apis_register_menus()
{
    add_menu_page(
        'تنظیمات پلاگین',
        'تنظیمات پلاگین',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler'
    );

    add_submenu_page(
        'wp_apis_admin',
        'عمومی',
        'عمومی',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page',
    );
}

function wp_apis_main_menu_handler(){
    if(isset($_POST['saveSettings']))
    {
        var_dump($_POST);
    }
    include WP_APIS_TPL.'admin/menus/main.php';
}

function wp_apis_general_page(){

    include WP_APIS_TPL.'admin/menus/general.php';
}
