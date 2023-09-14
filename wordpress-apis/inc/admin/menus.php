<?php
//actions
add_action('admin_menu','wp_apis_register_menus');

//functions
function wp_apis_register_menus()
{
    add_menu_page(
        'پلاگین سفارشی',
        'پلاگین سفارشی',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler'
    );

    add_submenu_page(
        'wp_apis_admin',
        'کاربران',
        'کاربران',
        'manage_options',
        'wp_apis_users',
        'wp_apis_users_page',
    );

    add_submenu_page(
        'wp_apis_admin',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page',
    );

}

function wp_apis_main_menu_handler(){

    global $wpdb;

if(isset($_GET['action']))
{

    $action = $_GET['action'];

    if($action == "delete")
    {
        $item = intval($_GET['item']);

        if($item>0)
        {
            $wpdb -> delete($wpdb->prefix.'sample',['ID' => $item]);  

            $samples = $wpdb -> get_results("SELECT * FROM {$wpdb->prefix}sample");

            include WP_APIS_TPL.'admin/menus/main.php';
        }


    }

    elseif($action == "add")
    {
        if(isset($_POST['SaveData']))
        {
            
            $wpdb -> insert($wpdb->prefix.'sample',[
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'Mobile' => $_POST['Mobile']
            ]);
        }

        include WP_APIS_TPL.'admin/menus/add.php';
    }

    elseif($action == "update")
    {
        $item = intval($_GET['item']);

        if(isset($_POST['updatedata']) & $item>0)
        {

            $wpdb -> update($wpdb->prefix.'sample',[
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'Mobile' => $_POST['Mobile']],
                ['ID' => $item]);
            
        }
        $itemsample = $wpdb -> get_results("SELECT * FROM {$wpdb->prefix}sample where ID=$item LIMIT 1");
        include WP_APIS_TPL.'admin/menus/update.php';
       
    }
}else
{    
    $samples = $wpdb -> get_results("SELECT * FROM {$wpdb->prefix}sample");

    include WP_APIS_TPL.'admin/menus/main.php';
}
}

function wp_apis_general_page(){

 
    
    if(isset($_POST['saveSettings']))
    {
        //$is_plugin_active = isset($_POST['is_plugin_active']) ? 1 : 0 ;
        
        //add_option('wp_apis_is_active',$is_plugin_active);
        
        if(isset($_POST['is_plugin_active'])){
            update_option('wp_apis_is_active',1);
        }else{
            delete_option('wp_apis_is_active');
        }
    }
    
    $current_plugin_status = get_option('wp_apis_is_active',0);

    include WP_APIS_TPL.'admin/menus/general.php';
}

function wp_apis_users_page()
{

    global $wpdb;
    $users = $wpdb->get_results("SELECT ID,user_email,display_name FROM {$wpdb->users}");

    if(isset($_GET['action']) && $_GET['action'] == 'edit')
    {
        $userID = intval($_GET['id']);
        
        if(isset($_POST['SaveUserDataInfo'])){

            $mobile = $_POST['mobile'];
            $wallet = $_POST['wallet'];

            if(!empty($mobile))
            {
                update_user_meta($userID,'mobile',$mobile);
            }

            if(!empty($wallet))
            {
                update_user_meta($userID,'wallet',$wallet);
            }

        }

        
        $mobile = get_user_meta($userID,'mobile',true);
        $wallet = get_user_meta($userID,'wallet',true);


        include WP_APIS_TPL.'admin/menus/users/edit.php';
        return;
    }

    if(isset($_GET['action']) && $_GET['action'] == 'RemoveMobile')
    {
        $userID = intval($_GET['id']);
        delete_user_meta($userID,'mobile');
    }

    if(isset($_GET['action']) && $_GET['action'] == 'RemoveWallet')
    {
        $userID = intval($_GET['id']);
        delete_user_meta($userID,'wallet');
    }

    include WP_APIS_TPL.'admin/menus/users/users.php';
}