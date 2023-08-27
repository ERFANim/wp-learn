<?php
/*
Plugin Name: Hooks Plugin
Plugin URI: https://mywebsite.com/
Description: this is hooks plugin
Author: My Name
Author URI: https://Mypersonalwensite.com/
Text Domain: myfirstplugin
Domain Path: /languages/
Version: 1.0.0
*/

function print_order_id(){
    print "Order_Purchased!";
}

function send_order_email(){
    print "Order Email Sent!";
}

add_action('order_Purchased','send_order_email');
add_action('order_Purchased','print_order_id');



do_action('order_Purchased');


