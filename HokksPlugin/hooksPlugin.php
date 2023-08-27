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


/*actions hooks*/
function print_order_id(){
    print "Order_Purchased!";
}

function send_order_email(){
    print "Order Email Sent!";
}

add_action('order_Purchased','send_order_email');
add_action('order_Purchased','print_order_id');

do_action('order_Purchased');


/*filters hooks*/

function update_order_price1($order_price){
    return $order_price * 2 ;
}

function update_order_price2($order_price){
    return $order_price / 5 ;
}

add_filter('get_order_price','update_order_price1');
add_filter('get_order_price','update_order_price2');

$result = apply_filters('get_order_price',25000);

print "$result";